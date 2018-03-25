<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 5/25/17
 * Time: 3:59 PM
 */

namespace Istruct\Factories;

use Istruct\Components\RequestComponent;
use Istruct\Helpers\BuildPath;

class RequestFactory implements _Interface
{
    protected $component;

    public function __construct(RequestComponent $component)
    {
        $this->component = $component;
    }
    public function produce($table, $material, $path = 'app')
    {
        if(!is_dir(base_path($path . '/Http/Requests')))
        {
            mkdir(base_path($path . '\Http\Requests'));
        }
        $fileForm = fopen(BuildPath::outRequest($table, $path), "w");
        fwrite($fileForm, $material);
    }

    public function building($table, $nameSpace = 'App', $path = 'app')
    {
        $material = $this->component->building($table, 'Create', $nameSpace);
        $this->produce($table . 'Create', $material, $path);
        $material = $this->component->building($table, 'Update', $nameSpace);
        $this->produce($table . 'Update', $material, $path);
    }
}