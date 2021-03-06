<?php
namespace Istruct\Controllers;
use App\Http\Controllers\Controller;
use Istruct\Factories\FormBuilderFactory;
use Istruct\Helpers\CRUDPath;
use Istruct\Interfaces\ControllerInterface;
use Illuminate\Support\Facades\View;

/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 4/18/17
 * Time: 3:45 PM
 */
class FormBuilderController extends Controller implements ControllerInterface
{
    private $factory;
    public function __construct(FormBuilderFactory $factory)
    {
        $this->factory = $factory;
    }
    public function produce($table = 'users')
    {
        // TODO: Implement produce() method.
        $this->factory->building($table);
        $this->show($table);
    }
    public function show($table = 'users'){
        echo resource_path(CRUDPath::outNgFormBuilder($table));
        echo '<pre>';
        echo file_get_contents(CRUDPath::outNgFormBuilder($table));
    }
    public function view($table)
    {
        if (View::exists($table)) {
            return view($table);
        }
        return abort(404, 'Views not found');
    }

}