<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 4/18/17
 * Time: 3:52 PM
 */

namespace Istruct\Factories;

use Istruct\Components\FormBuilderComponent;
use Istruct\Helpers\CRUDPath;
use Istruct\Interfaces\FactoryInterface;

class FormBuilderFactory implements FactoryInterface
{
    private $component;

    public function __construct(FormBuilderComponent $component)
    {
        $this->component = $component;
    }

    public function produce($table, $material) {
        $fileForm = fopen(CRUDPath::outNgFormBuilder($table), "w");
        fwrite($fileForm, $material);
    }
    public function building($table) {
        $material = $this->component->building($table);
        $this->produce($table, $material);
    }
}