<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 5/23/17
 * Time: 4:59 PM
 */

namespace Istruct\Components;

use Istruct\Facades\DBFa;
use Istruct\Helpers\DecoHelper;
use Istruct\Helpers\CRUDPath;

class TableFormComponent extends BaseComponent
{
    protected $hidden = ['id'];
    protected $password = ['password'];
    protected $file = ['avatar', 'image'];
    protected $dateTimePicker = ['birthday', 'publish_time'];
    protected $radio = ['sex', 'gender'];

    public function __construct()
    {
        $this->source = file_get_contents(CRUDPath::inTableForm());
    }

    public function buildTile($column)
    {
        return "<th>{{trans('label." . $column . "')}}</th>\n";
    }

    public function buildData($column)
    {
        return '<td>{{$row->' . $column . "}}</td>\n";
    }

    public function buildContent($table)
    {
        $title = '<th><input type="checkbox" class="check_all"></th>';
        $data = '<td><input type="checkbox" class="check_item" data="{{$row->id}}"></td>';
        foreach (DBFa::getFillable($table) as $column) {
            $title .= $this->buildTile($column);
            $data .= $this->buildData($column);
        }
        $this->working(DecoHelper::TH, $title);
        $this->working(DecoHelper::TD, $data);
    }


    public function building($input)
    {
        $this->buildTable($input['table']);
        $this->buildRoute($input['route']);
        $this->buildVariables($input['table']);
        $this->buildContent($input['table']);
        return $this->source;
    }
}