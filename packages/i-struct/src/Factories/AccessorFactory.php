<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 4/12/17
 * Time: 3:00 PM
 */

namespace Istruct\Factories;

use Istruct\Components\AccessorComponent;
use Istruct\Helpers\DecoHelper;
use Istruct\Helpers\CRUDPath;
use Istruct\Helpers\BuildPath;

class AccessorFactory
{
    protected $component;

    public function __construct(AccessorComponent $component)
    {
        $this->component = $component;
    }
    public function produce($table, $material)
    {
        $fileForm = fopen(BuildPath::outAccessor($table), "w");
        fwrite($fileForm, $material);
    }

    public function building($table)
    {

        $material = $this->component->building($table);
        $this->produce($table, $material);
    }
}