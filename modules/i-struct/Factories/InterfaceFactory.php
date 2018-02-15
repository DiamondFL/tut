<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 5/26/17
 * Time: 3:33 PM
 */

namespace Istruct\Factories;


use Istruct\Components\InterfaceComponent;
use Istruct\Helpers\BuildPath;

class InterfaceFactory implements _Interface
{
    protected $component;

    public function __construct(InterfaceComponent $component)
    {
        $this->component = $component;
    }
    public function produce($table, $material, $path = 'app')
    {
        $fileForm = fopen(BuildPath::outInterface($table, $path), "w");
        fwrite($fileForm, $material);
    }

    public function building($table, $nameSpace = 'App', $path = 'app')
    {
        $material = $this->component->building($table, $nameSpace);
        $this->produce($table, $material, $path);
    }
}