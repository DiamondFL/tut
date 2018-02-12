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

class CreateFormComponent extends BaseComponent
{
    protected $hidden = ['id'];
    protected $password = ['password'];
    protected $file = ['avatar', 'image'];
    protected $dateTimePicker = ['birthday', 'publish_time'];
    protected $radio = ['sex', 'gender'];

    public function __construct()
    {
        $this->source = file_get_contents(CRUDPath::inCreateForm());
    }

    public function setField($column, $type)
    {
        return $this->$type($column, $type);
    }

    public function string($column)
    {
        if (in_array($column, $this->file)) {
            $content = file_get_contents($this->getSourceCreate('file'));
        } else {
            $content = file_get_contents($this->getSourceCreate('string'));
        }
        return str_replace(DecoHelper::COLUMN, $column, $content);
    }

    public function text($column)
    {
        $content = file_get_contents($this->getSourceCreate('text'));
        return str_replace(DecoHelper::COLUMN, $column, $content);
    }

    public function integer($column)
    {
        $content = file_get_contents($this->getSourceCreate('number'));
        return str_replace(DecoHelper::COLUMN, $column, $content);
    }

    public function datetime($column)
    {
        $content = file_get_contents($this->getSourceCreate('datetime'));
        return str_replace(DecoHelper::COLUMN, $column, $content);
    }
    public function date($column)
    {
        $content = file_get_contents($this->getSourceCreate('date'));
        return str_replace(DecoHelper::COLUMN, $column, $content);
    }

    public function boolean($column)
    {
        $content = file_get_contents($this->getSourceCreate('boolean'));
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
        $this->buildRoute($input['route']);
        $this->buildFields($input['table']);
        $this->buildTable($input['table']);
        $this->buildView($input['table'], $input['prefix']);
        return $this->source;
    }
}