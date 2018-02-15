<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 5/25/17
 * Time: 4:03 PM
 */

namespace Istruct\Components;

use Istruct\Facades\DBFa;
use Istruct\Helpers\DecoHelper;
use Istruct\Helpers\BuildPath;

class RequestComponent extends BaseComponent
{
    private $fields;
    public function __construct()
    {

        //dump($this->source);
    }

    public function buildRule($table)
    {
        $this->fields = DBFa::getFillable($table);
        $rules = '';
        foreach ($this->fields as $field)
        {
            $rules .= "'{$field}' => 'required'\n";
        }
        $this->working(DecoHelper::RULE, $rules);
    }

    public function buildMessage($table)
    {
        $this->working(DecoHelper::MESSAGE, '[]');
    }

    public function building($table, $action, $nameSpace = 'App')
    {
        $this->source = file_get_contents(BuildPath::inRequest());
        $this->buildNameSpace($nameSpace);
        $this->buildRule($table);
        $this->buildMessage($table);
        $this->buildClassName($table . $action);
        return $this->source;
    }
}