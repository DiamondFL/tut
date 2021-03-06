<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 5/23/17
 * Time: 3:32 PM
 */

namespace Istruct\Components;


use Istruct\Facades\DBFa;
use Istruct\Helpers\DecoHelper;
use Istruct\Helpers\CRUDPath;

class UpdateFormComponent extends BaseComponent
{
    protected $hidden = ['id'];
    protected $password = ['password'];
    protected $file = ['avatar', 'image'];
    protected $dateTimePicker = ['birthday', 'publish_time'];
    protected $radio = ['sex', 'gender'];

    public function __construct()
    {
        $this->source = file_get_contents(CRUDPath::inUpdateForm());
    }

    public function setField($column, $type)
    {
        return $this->$type($column, $type);
    }

    public function string($column)
    {
        if (in_array($column, $this->file)) {
            $content = file_get_contents($this->getSourceUpdate('file'));
        } else {
            $content = file_get_contents($this->getSourceUpdate('string'));
        }
        return str_replace(DecoHelper::COLUMN, $column, $content);
    }

    public function text($column)
    {
        $content = file_get_contents($this->getSourceUpdate('text'));
        return str_replace(DecoHelper::COLUMN, $column, $content);
    }

    public function integer($column)
    {
        $content = file_get_contents($this->getSourceUpdate('number'));
        return str_replace(DecoHelper::COLUMN, $column, $content);
    }

    public function datetime($column)
    {
        $content = file_get_contents($this->getSourceUpdate('datetime'));
        return str_replace(DecoHelper::COLUMN, $column, $content);
    }
    public function date($column)
    {
        $content = file_get_contents($this->getSourceUpdate('date'));
        return str_replace(DecoHelper::COLUMN, $column, $content);
    }

    public function boolean($column)
    {
        $content = file_get_contents($this->getSourceUpdate('boolean'));
        return str_replace(DecoHelper::COLUMN, $column, $content);
    }

    public function buildFields($table)
    {
        $packet = '';
        foreach (DBFa::getDataTypes($table) as $column => $type) {
            $packet .= $this->setField($column, $type);
        }
        $this->working(DecoHelper::FIELD, $packet);
    }

    public function building($input)
    {
        $this->buildFields($input['table']);
        $this->buildRoute($input['route']);
        $this->buildVariable($input['table']);
        $this->buildTable($input['table']);
        return $this->source;
    }
}