<?php
/**
 * Created by PhpStorm.
 * User: np
 * Date: 10/25/17
 * Time: 3:27 PM
 */

namespace IoAccess\Facades;

use Illuminate\Support\Facades\Facade;

class FoAccess extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'FoAccess';
    }
}