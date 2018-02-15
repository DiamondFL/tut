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

class RepositoryComponent extends BaseComponent
{
    public function __construct()
    {
        $this->source = file_get_contents(BuildPath::inRepository());
    }

    public function building($table, $nameSpace)
    {
        $this->buildNameSpace($nameSpace);
        $this->buildClassName($table);
        return $this->source;
    }
}