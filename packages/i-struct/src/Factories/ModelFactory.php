<?php
/**
 * Created by PhpStorm.
 * User: cuongpm00
 * Date: 11/2/2016
 * Time: 9:25 AM
 */

namespace Istruct\Factories;

use Istruct\Components\ModelComponent;
use Istruct\Helpers\CRUDPath;
use Istruct\Helpers\BuildPath;

class ModelFactory
{
    protected $component;

    public function __construct(ModelComponent $component)
    {
        $this->component = $component;
    }

    public function produce($table, $material, $path)
    {
        $fileForm = fopen(BuildPath::outModel(camel_case($table), $path), "w");
        fwrite($fileForm, $material);
    }

    public function building($table, $nameSpace = 'App', $path = 'app')
    {
        $material = $this->component->building($table, $nameSpace);
        $this->produce($table, $material, $path);
    }
}