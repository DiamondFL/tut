<?php

namespace ECommerce\Http\Controllers;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected $style;

    public function __construct()
    {
        $this->style = \ECommerce\Models\Styles::pluck('name', 'id');
    }

    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = \Illuminate\Support\Facades\View::make($this->layout);
        }
    }

}
