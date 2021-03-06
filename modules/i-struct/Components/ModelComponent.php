<?php
/**
 * Created by PhpStorm.
 * User: cuongpm00
 * Date: 11/2/2016
 * Time: 9:25 AM
 */

namespace Istruct\Components;

use Istruct\Facades\DBFa;
use Istruct\Helpers\DecoHelper;
use Istruct\Helpers\CRUDPath;
use Istruct\Helpers\BuildPath;

class ModelComponent extends BaseComponent
{
    public function __construct()
    {
        $this->source = file_get_contents(BuildPath::inModel());

    }

    private function buildFillAble($table)
    {
        $fillable = DBFa::produceFillable($table);
        $this->working(DecoHelper::FILL_ABLE, $fillable);
    }

    private function buildTableName($table)
    {
        $this->working(DecoHelper::TABLE, $table);
    }

    private function buildFilter($table)
    {
        $fields = DBFa::getFillable($table);
        $filter = '';
        foreach ($fields as $field)
        {
            $filter .= "if(isset(\$input['{$field}'])) {
                \$query->where('{$field}', \$input['{$field}']); 
                }\n";
        }
        $this->working(DecoHelper::FILTER, $filter);
    }

    public function building($table, $nameSpace)
    {
        $this->buildNameSpace($nameSpace);
        $this->buildFillAble($table);
        $this->buildClassName($table);
        $this->buildTableName($table);
        $this->buildFilter($table);
        return $this->source;
    }
}