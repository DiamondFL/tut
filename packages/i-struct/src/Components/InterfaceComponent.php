<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 5/26/17
 * Time: 3:33 PM
 */

namespace Istruct\Components;


use Istruct\Helpers\DecoHelper;
use Istruct\Helpers\BuildPath;

class InterfaceComponent extends BaseComponent
{
    public function __construct()
    {
        $this->source = file_get_contents(BuildPath::inInterface());
    }

    public function building($table, $nameSpace)
    {
        $this->buildNameSpace($nameSpace);
        $this->buildClassName($table);
        return $this->source;
    }
}