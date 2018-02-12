<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 5/25/17
 * Time: 3:34 PM
 */

namespace Istruct\Factories;


use Istruct\Components\CtrlComponent;
use Istruct\Helpers\DecoHelper;
use Istruct\Helpers\BuildPath;

class CtrlFactory implements _Interface
{
    protected $component;

    public function __construct(CtrlComponent $component)
    {
        $this->component = $component;
    }
    public function produce($table, $material, $path)
    {
        $fileForm = fopen(BuildPath::outController($table, $path), "w");
        fwrite($fileForm, $material);
    }

    public function building($input)
    {
        $material = $this->component->building($input);
        $this->produce($input['table'], $material, $input['path']);
    }
}