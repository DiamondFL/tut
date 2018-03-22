<?php
/**
 * Created by PhpStorm.
 * User: thinking
 * Date: 8/20/17
 * Time: 5:35 PM
 */

namespace Istruct\Seeder;


use Illuminate\Support\Facades\DB;

class PermissionSeed
{
    private $permissions = [
        'create' , 'update', 'show', '*', 'delete'
    ];

    public function run($name)
    {
        $data = [];
        foreach ($this->permissions as $permission)
        {
            $row = ['name' => $permission . '_' . $name , 'display_name' => ucfirst($permission) . ' ' . $name, 'is_active' => 1];
            array_p($data, $row);
        }
        try {
            DB::table('permissions')->insert($data);
        } catch (\Exception $e) {

        }
    }
}