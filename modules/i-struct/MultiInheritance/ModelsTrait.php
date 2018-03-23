<?php

/**
 * Created by PhpStorm.
 * User: e
 * Date: 1/7/17
 * Time: 1:36 PM
 */
namespace Istruct\MultiInheritance;

use App\Models\User;
use App\Events\LogUploadEvent;
use Istruct\Facades\FormatFa;
use Istruct\Facades\UploadFa;

trait ModelsTrait
{
    //=====================RELATION============================>

    public function creator()
    {
        return $this->belongsTo(User::class, CREATED_BY_COL);
    }

    public function updater()
    {
        return $this->belongsTo(User::class, UPDATED_BY_COL);
    }

    public function creatorName($field = 'email')
    {
        if ($this->creator)
        {
            return $this->creator->$field;
        }
        return '--';
    }

    public function updaterName($field = 'email')
    {
        if ($this->updater)
        {
            return $this->updater->$field;
        }
        return '--';
    }

    //======================SCOPE===============================>

    public function scopeOrders($query, $input = [])
    {
        foreach ($input as $field => $value) {
            $query->orderBy($this->table . '.' . $field, $value);
        }
        return $query;
    }

    //========================ACTION============================>

    public function checkbox($input)
    {
        if(isset($this->checkbox))
        {
            foreach ($this->checkbox as $value) {
                (isset($input[$value]) && $input[$value] != '0') ? $input[$value] = 1 : $input[$value] = 0;
            }
        }
        return $input;
    }

    public function uploads($input)
    {
        $folder = '';
        if(isset($this->fileUpload))
        {
            foreach ($this->fileUpload as $name => $key) {
                if (isset($input[$name])) {
                    if (is_file($input[$name])) {
                        $input = $this->processUploads($input, $folder, $name, $key);
                        $this->removeFileExits($name);
                    } else {
                        unset($input[$name]);
                    }
                }
            }
        }
        return $input;
    }

    private function processUploads($input, $folder, $name, $key)
    {
        if (isset($this->pathUpload)) {
            $folder = $this->pathUpload[$name];
        }
        $link = $this->generatePath($folder, $key);
        if ($key === 0) {
            $input[$name] = UploadFa::file($input[$name], $link);
        } else {
            $input[$name] = UploadFa::images(
                $input[$name],
                $link,
                isset($this->thumbImage[$name]) ? $this->thumbImage[$name] : []
            );
        }
        return $input;
    }

    private function generatePath($folder, $key)
    {
        $basePath = config('filesystems.disks.public.root');

        if (!file_exists($basePath)) {
            mkdir($basePath, 0777, true);
        }
        $basePath = $basePath . $folder;
        if (!file_exists($basePath)) {
            mkdir($basePath, 0777, true);
        }
        $basePath = $basePath . '/' . date('Y');
        if (!file_exists($basePath)) {
            mkdir($basePath, 0777, true);
        }
        $basePath = $basePath . '/' . date('m');
        if (!file_exists($basePath)) {
            mkdir($basePath, 0777, true);
        }
        $basePath = $basePath . '/' . date('d');
        if (!file_exists($basePath)) {
            mkdir($basePath, 0777, true);
        }
        return $basePath;
    }

    private function removeFileExits($name)
    {
        $names = explode('/', $this->$name);
        if (isset($this->$name) && $this->$name != '') {
            $files = array_pop($names);
            $fileName = explode('.', $files)[0];
            try {
                unlink(config('filesystems.disks.public.root') . $this->$name);
            } catch (\Exception $e) {
                event(new LogUploadEvent($e, "FILE"));
            }
        }
        if (isset($this->thumbImage[$name]) && isset($fileName))
        {
            foreach (glob(config('filesystems.disks.public.root') . implode('/', $names) . '*') as $folder)
            {
                $this->scanFile($folder, $fileName);
            }
        }
    }

    private function scanFile($dir, $fileName)
    {
        if (is_dir($dir)) {
            foreach (glob($dir . '/*') as $file) {
                if (!is_dir($file)) {
                    if (strpos($file , $fileName) !== false) {
                        unlink($file );
                    }
                } else {
                    $this->scanFile($file, $fileName);
                }
            }
        } else {
            if (strpos($dir . '', $fileName) !== false) {
                unlink($dir . '');
            }
        }
    }

    public function uploadImport($file)
    {
        $newName = FormatFa::reFileName($file);
        $file->storeAs(
            $this->table, $newName
        );
        return storage_path('app/' . $this->table . '/' . $newName);
    }

    public function scopeRelation($query, $input)
    {
        if(isset($input['relations']))
        {
            foreach ($input['relations'] as $relation)
            {
                $query->with($relation);
            }
        }
        return $query;
    }

    private $where = [];
    private $whereIn = [];

    public function scopeFilter($query, $input)
    {
        foreach ($this->whereIn as $key => $value) {
            if (isset($input[$value])) {
                $query->whereIn($this->table . '.' . $key, $input[$value]);
            }
        }
        foreach ($this->where as $value) {
            if (isset($input[$value])) {
                $query->where($this->table . '.' . $value, $input[$value]);
            }
        }
        if (isset($input[NULL_FILTER])) {
            foreach ($input[NULL_FILTER] as $value) {
                $query->whereNull($this->table . '.' . $value);
            }
        }
        if (isset($input[NOT_NULL_FILTER])) {
            foreach ($input[NOT_NULL_FILTER] as $value) {
                $query->whereNotNull($this->table . '.' . $value);
            }
        }
        return $query;
    }
}