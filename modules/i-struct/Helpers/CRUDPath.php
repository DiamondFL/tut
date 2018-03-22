<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 4/13/17
 * Time: 5:21 PM
 */

namespace Istruct\Helpers;

class CRUDPath
{
    static function inConstant()
    {
        return base_path(VIEW_PATH . '/const/DBConst.txt');
    }

    static function outConstant($table)
    {
        return base_path('Constants/' . $table . 'db.php');
    }

    static function inCreateForm()
    {
        return base_path(VIEW_PATH . '/form/horizontal.html');
    }

    static function outCreateForm($table)
    {
        $path = resource_path('views/' . $table);
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        return resource_path('views/' . $table . '/create.blade.php');
    }

    static function inIndexForm()
    {
        return base_path(VIEW_PATH . '/form/index.html');
    }

    static function outIndexForm($table)
    {
        return resource_path('views/' . $table . '/index.blade.php');
    }

    static function inTableForm()
    {
        return base_path(VIEW_PATH . '/form/table.html');
    }

    static function outTableForm($table)
    {
        return resource_path('views/' . $table . '/table.blade.php');
    }

    static function inUpdateForm()
    {
        return base_path(VIEW_PATH . '/form/update.html');
    }

    static function outUpdateForm($table)
    {
        return resource_path('views/' . $table . '/update.blade.php');
    }

    static function inShowForm()
    {
        return base_path(VIEW_PATH . '/form/show.html');
    }

    static function outShowForm($table)
    {
        return resource_path('views/' . $table . '/show.blade.php');
    }
    /**
     * Design patent
     */
    static function inObserver()
    {
        return base_path(VIEW_PATH . '/design_patent/observer.txt');
    }
    static function outObServer($table)
    {
        return app_path('Observers/' . ucfirst(str_singular($table)) . 'Observer.php');
    }
    /**
     *Ng
     */
    static function inNgFormBuilder()
    {
        return base_path(VIEW_PATH . '/ng/form/builder.txt');
    }

    static function outNgFormBuilder($table)
    {
        return base_path('tsc/form/' . $table . '.ts');
    }
}