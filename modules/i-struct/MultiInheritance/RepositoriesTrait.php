<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 1/7/17
 * Time: 1:40 PM
 */

namespace Istruct\MultiInheritance;

use App\Events\ImportLogEvent;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

trait RepositoriesTrait
{
    public function getByIdentify($identify)
    {
        return $this->makeModel()
            ->where('identify', $identify)
            ->limit(1)
            ->get();
    }

    public function destroy($id, $skip = 0)
    {
        $result = $this->delete($id);
        if ($result) {
            if ($skip !== 0) {
                $data = $this->makeModel()
                    ->skip($skip)
                    ->take(1)
                    ->orderBy('id', 'DESC')
                    ->get();
                if (count($data) === 1) {
                    return $data[0];
                }
            }
            return $result;
        }
        return false;
    }

    public function getList($input = [])
    {
        return $this->makeModel()
            ->filter($input)
            ->pluck('name', 'id');
    }

    public function lists($value = 'name', $key = 'id')
    {
        return $this->makeModel()->pluck($value, $key);
    }

    public function importing($path)
    {
        Excel::load($path, function ($reader) use ($path) {
            $results = $reader->toArray();
            foreach ($results as $value) {
                try {
                    $this->create($value);
                } catch (\Exception $e) {
                    event(new ImportLogEvent($path, $e));
                }
            }
        });
        unlink($path);
    }

    public function data($input = [])
    {
        return $this->makeModel()->filter($input)->get();
    }

    public function filterCount($input = [])
    {
        return $this->makeModel()->filter($input)->count();
    }

    public function filterFirst($input = [])
    {
        return $this->makeModel()->filter($input)->first();
    }

    public function filterList($input = [], $field = 'name')
    {
        return $this->makeModel()->filter($input)
            ->orderBy($field)
            ->pluck($field, 'id');
    }

    public function filterOneList($input = [], $field = 'id')
    {
        return $this->makeModel()->filter($input)->orderBy($field)->pluck($field);
    }

    public function onlyOne($input = [], $column = '*')
    {
        $data = $this->makeModel()->filter($input)->first();
        if (empty($data)) {
            return $data;
        }
        if ($column !== '*') {
            return $data->$column;
        }
        return $data;
    }

    public function statistic($input = [], $column)
    {
        return $this->makeModel()->select($column, DB::raw('COUNT(*) as count'))
            ->filter($input)
            ->groupBy($column)
            ->select($column, 'count')
            ->get();
    }

    public function statisticList($input = [], $column)
    {
        return $this->makeModel()->select($column, DB::raw('COUNT(*) as count'))
            ->filter($input)
            ->groupBy($column)
            ->pluck('count', $column);
    }

    public function statisticListArray($input = [], $column)
    {
        return $this->statisticList($input, $column)->toArray();
    }

    public function tags($tagNames, $data)
    {
        $tagIds = [];
        foreach($tagNames as $tagName) {
            $tag = app(Tag::class)->firstOrCreate(['name' => $tagName]);
            array_push($tagIds, $tag->id);
        }
        $i = $data->tags()->sync($tagIds);
    }
}