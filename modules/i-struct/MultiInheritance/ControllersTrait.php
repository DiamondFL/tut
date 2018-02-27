<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 1/7/17
 * Time: 1:40 PM
 */

namespace Istruct\MultiInheritance;

use Illuminate\Http\Request;

trait ControllersTrait
{
    public function lists(Request $request) {
        $input = $request->all();
        return $this->repository->filterList($input);
    }
}