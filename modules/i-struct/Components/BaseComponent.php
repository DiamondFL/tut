<?php
/**
 * Created by PhpStorm.
 * User: cuongpm00
 * Date: 11/2/2016
 * Time: 9:14 AM
 */

namespace Istruct\Components;


use Istruct\Helpers\DecoHelper;

class BaseComponent
{
    protected $source;

    public function getSourceUpdate($input)
    {
        return base_path(VIEW_PATH . '/form/update/' . $input . '.html');
    }

    public function getSourceCreate($input)
    {
        return base_path(VIEW_PATH . '/form/create/' . $input . '.html');
    }

    public function getSourceIndex()
    {
        return base_path(VIEW_PATH . '/form/index.html');
    }

    public function getSourceTable()
    {
        return base_path(VIEW_PATH . '/form/table.html');
    }

    public function replace($string, $data, $source)
    {
        $content = file_get_contents($source);
        return str_replace($string, $data, $content);
    }

    protected function buildTable($table)
    {
        $this->working(DecoHelper::TABLE, $table);
    }
    protected function buildName($table)
    {
        $this->working(DecoHelper::NAME, ucfirst(str_singular($table)));
    }

    protected function buildClassName($table)
    {
        $this->working(DecoHelper::CLASSES, str_singular(ucfirst(camel_case($table))));
    }

    protected function buildNameSpace($name_space = 'App')
    {
        $this->working( DecoHelper::NAME_SPACE, $name_space);
    }
    protected function buildRoute($route)
    {
        $this->working( DecoHelper::ROUTE, $route);
    }

    protected function buildView($table, $prefix)
    {
        $view  = $prefix . str_singular(kebab_case(camel_case($table)));
//        dd($view);
        $this->working(DecoHelper::VIEW, $view);
    }

    protected function buildVariable($table)
    {
        $this->working(DecoHelper::VARIABLE, str_singular(camel_case($table)));
    }

    protected function buildVariables($table)
    {
        $this->working(DecoHelper::VARIABLES, camel_case($table));
    }

    protected function working($changed, $material)
    {
        $this->source = str_replace($changed, $material, $this->source);

    }
}