<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 5/25/17
 * Time: 3:35 PM
 */

namespace Istruct\Factories;
use Istruct\Components\PolicyComponent;
use Istruct\Helpers\BuildPath;

class PolicyFactory implements _Interface
{
    protected $component;

    public function __construct(PolicyComponent $component)
    {
        $this->component = $component;
    }
    public function produce($table, $material, $path = 'app')
    {
        $fileForm = fopen(BuildPath::outPolicy($table, $path), "w");
        fwrite($fileForm, $material);
    }

    public function building($table, $nameSpace = 'App', $path = 'app')
    {
        $material = $this->component->building($table, $nameSpace = 'App');
        $this->produce($table, $material, $path = 'app');
    }
}