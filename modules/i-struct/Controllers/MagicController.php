<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 5/25/17
 * Time: 6:18 PM
 */

namespace Istruct\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Factories\CtrlFactory;
use Istruct\Factories\FormFactory;
use Istruct\Factories\InterfaceFactory;
use Istruct\Factories\ModelFactory;
use Istruct\Factories\PolicyFactory;
use Istruct\Factories\RepositoryFactory;
use Istruct\Factories\RequestFactory;
use Illuminate\Http\Request;

class MagicController extends Controller
{
    protected $formFactory, $ctrlFactory, $interfaceFactory, $repositoryFactory, $modelFactory,
        $requestFactory, $policyFactory;

    public function __construct(
        FormFactory $formFactory,
        CtrlFactory $ctrlFactory,
        InterfaceFactory $interfaceFactory,
        RepositoryFactory $repositoryFactory,
        ModelFactory $modelFactory,
        RequestFactory $requestFactory,
        PolicyFactory $policyFactory
    )
    {
        $this->formFactory = $formFactory;
        $this->ctrlFactory = $ctrlFactory;
        $this->interfaceFactory = $interfaceFactory;
        $this->repositoryFactory = $repositoryFactory;
        $this->modelFactory = $modelFactory;
        $this->requestFactory = $requestFactory;
        $this->policyFactory = $policyFactory;
    }

    public function produce($table = 'users')
    {
        $this->formFactory->building($table);
        $this->ctrlFactory->building($table);
        $this->interfaceFactory->building($table);
        $this->repositoryFactory->building($table);
        $this->modelFactory->building($table);
        $this->requestFactory->building(str_singular($table));
        $this->policyFactory->building($table);
    }

    public function create()
    {
        return view('magic::render.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input = $this->fix($input);
        $table = $input['table'];
        $nameSpace = $input['name_space'];
        $path = $input['path'];

        $this->formFactory->building($input);
        $this->ctrlFactory->building($input);
        $this->interfaceFactory->building($table, $nameSpace, $path);
        $this->repositoryFactory->building($table, $nameSpace, $path);
        $this->modelFactory->building($table, $nameSpace, $path);
        $this->requestFactory->building(str_singular($table), $nameSpace, $path);
        $this->policyFactory->building($table, $nameSpace, $path);

        $mgs = $this->buildMessage($table);

        session()->flash('success', $mgs);
        return redirect()->back();
    }

    private function buildMessage($table)
    {
        $name = ucfirst(camel_case(str_singular($table)));
        $route = kebab_case(camel_case(str_singular($table)));
        $mgs = '';
        $mgs .= "Route::resource('{$route}' , '{$name}Controller'); \n";
        $mgs .= '$this->app->bind(' . $name . 'Repository::class, ' . $name . 'RepositoryEloquent::class);' . " \n";
        return $mgs;
    }

    private function fix($input) {
        $input['table'] = isset($input['table']) ? $input['table'] : USERS_TB;
        $input['path'] = isset($input['path']) ? $input['path'] : 'app';
        $input['name_space'] = isset($input['name_space']) ? $input['name_space'] : 'App';
        $input['prefix'] = isset($input['prefix']) ? $input['prefix'] . '::' : '';
        $input['route'] = kebab_case(camel_case(str_singular($input['table'])));
        return $input;
    }
}