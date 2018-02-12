<?php
/**
 * Created by PhpStorm.
 * User: cuongpm00
 * Date: 8/23/2016
 * Time: 4:08 PM
 */
namespace Istruct\Facades;

class InputFun
{
    public function identify($repository)
    {
        $countIdentify = true;
        $identify = null;
        while ($countIdentify) {
            $identify = str_random(8);
            if ($repository->where('identify', $identify)->count() === 0) {
                $countIdentify = false;
            }
        }
        return $identify;
    }

    public function getIdentify($link)
    {
        $arrayString = explode("/", $link);
        $string = end($arrayString);
        return str_replace('.html', '', $string);
    }

    public function setSort($field)
    {
        $result = 'fa-sort';
        if (request()->get('order_by') == $field) {
            return $result = (request()->get('order') === 'ASC') ? 'fa-sort-asc' : 'fa-sort-desc';
        }
        return $result;
    }

    public function normalization($request)
    {
        $input = [];
        foreach ($request->all() as $k => $v) {
            $input[$k] = trim($v);
            if($input[$k] === '') unset($input[$k]);
        }
        return $input;
    }
}