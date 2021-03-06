<?php
/**
 * Created by PhpStorm.
 * User: cuongpm00
 * Date: 11/2/2016
 * Time: 9:32 AM
 */

namespace Istruct\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Factories\MutatorFactory;
use Istruct\Helpers\BuildPath;
use Illuminate\Support\Facades\View;

class MutatorController extends Controller
{
    protected $factory;

    public function __construct(MutatorFactory $factory)
    {
        $this->factory = $factory;
    }

    public function produce($table = 'users')
    {
        $this->factory->building($table);
        $this->show($table);
    }

    public function show($table = 'users')
    {
        echo BuildPath::outMutator($table);
        echo '<pre>';
        echo file_get_contents(BuildPath::outMutator($table));
    }

    public function view($table)
    {
        if (View::exists($table)) {
            return view('models.mutator-' . $table);
        }
        return abort(404, 'Views not found');
    }
}