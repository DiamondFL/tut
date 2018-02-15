<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 5/25/17
 * Time: 4:08 PM
 */

namespace Istruct\Helpers;
use Istruct\Facades\FormatFa;

class BuildPath
{
    static function inRequest()
    {
        return base_path(VIEW_PATH . '/mvc/request.php');
    }

    static function outRequest($table, $path = 'app')
    {
        return base_path($path . '/Http/Requests/' . FormatFa::formatAppName($table) . 'Request.php');
    }

    static function inController()
    {
        return base_path(VIEW_PATH . '/mvc/controller.php');
    }

    static function outController($table, $path = 'app')
    {
        return base_path($path . '/Http/Controllers/' . FormatFa::formatAppName($table) . 'Controller.php');
    }
    static function inViewComposer()
    {
        return base_path(VIEW_PATH . '/mvc/viewComposer.php');
    }

    static function outViewComposer($table, $path = 'app')
    {
        return base_path($path . '/Http/ViewComposer/' . FormatFa::formatAppName($table) . 'Composer.php');
    }

    static function inInterface()
    {
        return base_path(VIEW_PATH . '/mvc/interfaceRepo.php');
    }

    static function outInterface($table, $path = 'app')
    {
        return base_path($path . '/Repositories/' . FormatFa::formatAppName($table) . 'Repository.php');
    }

    static function inRepository()
    {
        return base_path(VIEW_PATH . '/mvc/repository.php');
    }

    static function outRepository($table, $path = 'app')
    {
        return base_path($path . '/Repositories/' . FormatFa::formatAppName($table) . 'RepositoryEloquent.php');
    }

    static function inPolicy()
    {
        return base_path(VIEW_PATH . '/mvc/policy.php');
    }

    static function outPolicy($table, $path = 'app')
    {
        return base_path($path . '/Policies/' . FormatFa::formatAppName($table) . 'Policy.php');
    }

    static function inModel()
    {
        return base_path(VIEW_PATH . '/models/model.php');
    }

    static function outModel($table, $path = 'app')
    {
        return base_path($path . '/Models/' . FormatFa::formatAppName($table) . '.php');
    }

    static function inMutator()
    {
        return base_path(VIEW_PATH . '/models/mutator.php');
    }

    static function outMutator($table, $path = 'app')
    {
        return base_path($path . '/Models/' . FormatFa::formatAppName($table) . 'Mutator.php');
    }

    static function inAccessor()
    {
        return base_path(VIEW_PATH . '/models/accessor.php');
    }

    static function outAccessor($table, $path = 'app')
    {
        return base_path($path . '/Models/' . FormatFa::formatAppName($table) . 'Accessor.php');
    }
}