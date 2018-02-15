<?php
namespace Istruct\Facades;
/**
 * Created by PhpStorm.
 * User: cuong
 * Date: 10/13/16
 * Time: 9:47 PM
 */
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DBFun
{
    protected $db, $tables;

    protected $exceptFillable = ['id', 'created_at', 'updated_at', 'deleted_at'];
    protected $exceptField = ['password', 'remember_token', 'creator', 'updater', 'code', 'user_id'];

    public function getColumn($table)
    {
        return Schema::getColumnListing($table);
    }

    public function table($dbName = NULL)
    {
        if ($dbName == NULL) {
            $dbName = env('DB_DATABASE');
        }
        $dbTables = DB::select('SHOW TABLES');
        $database = 'Tables_in_' . $dbName;
        foreach ($dbTables as $table) {
            $this->tables[] = $table->$database;
        }
        return $this->tables;
    }

    public function getFillable($table)
    {
        return array_diff($this->getColumn($table), $this->exceptFillable);
    }

    public function getField($table)
    {
        return array_diff($this->getFillable($table), $this->exceptField);
    }

    public function getDataTypes($table)
    {
        $dataTypes = [];
        foreach ($this->getField($table) as $column) {
            $dataTypes[$column] = Schema::getColumnType($table, $column);
        }
        return ($dataTypes);
    }

    public function produceFillable($table)
    {
        return "['" . implode("', '", $this->getFillable($table)) . "']";
    }

    public function buildFillable($fillable)
    {
        return "['" . implode("', '", $fillable) . "']";
    }
}
