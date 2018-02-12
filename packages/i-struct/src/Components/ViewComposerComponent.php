<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/19/18
 * Time: 5:29 PM
 */

namespace Istruct\Components;

use Istruct\Helpers\CRUDPath;

class ViewComposerComponent
{
    public function __construct()
    {
        $this->source = file_get_contents(CRUDPath::inUpdateForm());
    }
}