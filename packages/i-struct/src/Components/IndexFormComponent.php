<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 5/23/17
 * Time: 3:33 PM
 */

namespace Istruct\Components;


use Istruct\Helpers\DecoHelper;

class IndexFormComponent extends BaseComponent
{
    public function __construct()
    {
        $this->source = file_get_contents($this->getSourceIndex());
    }

    protected function buildVar($table)
    {
        $this->working(DecoHelper::VARIABLE, str_singular(camel_case($table)));
    }

    protected function buildVars($table)
    {
        $this->working(DecoHelper::VARIABLES, (camel_case($table)));
    }

    public function building($input)
    {
        $this->buildTable($input['table']);
        $this->buildRoute($input['route']);
        $this->buildView($input['table'], $input['prefix']);
        $this->buildVar($input['table']);
        $this->buildVars($input['table']);
        return $this->source;
    }
}