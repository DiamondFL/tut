<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 5/25/17
 * Time: 4:02 PM
 */

namespace Istruct\Components;
use Istruct\Helpers\DecoHelper;
use Istruct\Helpers\BuildPath;

class CtrlComponent extends  BaseComponent
{
    public function __construct()
    {
        $this->source = file_get_contents(BuildPath::inController());
    }

    public function building($input)
    {
        $this->buildNameSpace($input['name_space']);
        $this->buildClassName($input['table']);
        $this->buildTable($input['table']);
        $this->buildVariable($input['table']);
        $this->buildView($input['table'], $input['prefix']);
        $this->buildVariables($input['table']);
        $this->buildRoute($input['route']);
        return $this->source;
    }
}