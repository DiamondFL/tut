<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 4/2/18
 * Time: 11:40 AM
 */

namespace Istruct\Components;

use Istruct\Facades\DBFa;
use Istruct\Helpers\CRUDPath;
use Istruct\Helpers\DecoHelper;

class TranslationComponent extends BaseComponent
{


    public function __construct()
    {
        $this->source = file_get_contents(CRUDPath::inTransTable());
    }

    public function build($data, $decorator)
    {
        $str = "";
        foreach ($data as $key => $value) {
            $str .= '  \'' . $value . '\' => \'' . title_case(str_replace('_', ' ', str_before($value, '_id'))) . '\'' . ",\n";
        }
        $this->working($decorator, trim($str));
    }


    public function building($database)
    {
        $tables = DBFa::table($database);
        $this->build($tables, DecoHelper::TABLE);
        $columns = DBFa::getColumnSort($tables);
        $this->build($columns, DecoHelper::COLUMN);
        return $this->source;
    }
}