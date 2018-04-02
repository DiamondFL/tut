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

class TranslationComponent
{


    public function __construct()
    {
        $this->source = file_get_contents(CRUDPath::inConstant());
    }

    public function build($material)
    {
        $str = "<?php\n";
        foreach ($material as $key => $value) {
            $str .= '  ' . $value . ' => \'' . title_case(str_replace('_', ' ', str_before($value, '_id'))) . '\'' . ";\n";
        }
        $this->working(DecoHelper::COLUMN, $str);
    }


    public function building($database)
    {
        $tables = DBFa::table($database);
        $this->build($tables);
        $columns = DBFa::getAllColumn($tables);
        $this->build($columns);
        return $this->source;
    }
}