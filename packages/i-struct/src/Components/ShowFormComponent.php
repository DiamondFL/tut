<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 5/23/17
 * Time: 3:33 PM
 */

namespace Istruct\Components;


use Istruct\Facades\DBFa;
use Istruct\Helpers\CRUDPath;
use Istruct\Helpers\DecoHelper;

class ShowFormComponent extends BaseComponent
{
    protected $hidden = ['id'];
    protected $password = ['password'];
    protected $file = ['avatar', 'image'];
    protected $dateTimePicker = ['birthday', 'publish_time'];
    protected $radio = ['sex', 'gender'];

    public function __construct()
    {
        $this->source = file_get_contents(CRUDPath::inShowForm());
    }

    public function buildFields($table)
    {
        $packet = '';
        foreach (DBFa::getDataTypes($table) as $column => $type) {
            $packet .= "{!! $column !!}\n";
        }
        $this->working(DecoHelper::SHOW, $packet);
    }

    public function building($input)
    {
        $this->buildFields($input['table']);
        $this->buildRoute($input['route']);
        $this->buildFields($input['table']);
        $this->buildVariable($input['table']);
        $this->buildVariables($input['table']);
        $this->buildName($input['table']);
        $this->buildTable($input['table']);
        return $this->source;
    }
}