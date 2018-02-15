<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 4/26/17
 * Time: 3:16 PM
 */

namespace Istruct\Factories;

use Istruct\Components\ConstantComponent;
use Istruct\Helpers\CRUDPath;

class ConstantFactory implements _Interface
{
    private $component;

    public function __construct(ConstantComponent $component)
    {
        $this->component = $component;
    }

    public function produce($database, $material, $path = '')
    {
        $source = fopen(CRUDPath::outConstant($database), "w");
        fwrite($source, $material);
    }

    public function building($database)
    {
        $material = $this->component->building($database);
        $this->produce($database, $material);
    }
}