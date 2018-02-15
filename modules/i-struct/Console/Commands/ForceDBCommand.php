<?php
/**
 * Created by PhpStorm.
 * User: thinking
 * Date: 8/20/17
 * Time: 11:25 AM
 */

namespace Istruct\Console\Commands;

use Istruct\Factories\CtrlFactory;
use Istruct\Factories\FormFactory;
use Istruct\Factories\InterfaceFactory;
use Istruct\Factories\ModelFactory;
use Istruct\Factories\PolicyFactory;
use Istruct\Factories\RepositoryFactory;
use Istruct\Factories\RequestFactory;
use Istruct\Seeder\PermissionSeed;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;

class ForceDBCommand extends Command
{

    protected $signature = 'render:template {table="users"}';
    protected $formFactory, $ctrlFactory, $interfaceFactory, $repositoryFactory, $modelFactory,
        $requestFactory, $requestUFactory, $policyFactory;

    public function __construct(FormFactory $formFactory,
                                CtrlFactory $ctrlFactory,
                                InterfaceFactory $interfaceFactory,
                                RepositoryFactory $repositoryFactory,
                                ModelFactory $modelFactory,
                                RequestFactory $requestFactory,
                                RequestFactory $requestUFactory,
                                PolicyFactory $policyFactory)
    {
        parent::__construct();
        $this->formFactory = $formFactory;
        $this->ctrlFactory = $ctrlFactory;
        $this->interfaceFactory = $interfaceFactory;
        $this->repositoryFactory = $repositoryFactory;
        $this->modelFactory = $modelFactory;
        $this->requestFactory = $requestFactory;
        $this->requestUFactory = $requestUFactory;
        $this->policyFactory = $policyFactory;
    }

    public function handle()
    {
        $table = $this->argument('table');
        $this->buildPermission($table);
        $this->buildAll($table);

    }

    private function buildAll($table)
    {
        $this->formFactory->building($table);
        $this->ctrlFactory->building($table);
        $this->interfaceFactory->building($table);
        $this->repositoryFactory->building($table);
        $this->modelFactory->building($table);
        $this->requestFactory->building(str_singular($table) . 'Create');
        $this->requestUFactory->building(str_singular($table) . 'Update');
        $this->policyFactory->building($table);
    }

    private function buildPermission($table)
    {
        $dbPermission = new PermissionSeed();
        $dbPermission->run(str_singular($table));
    }

    public function addExtra()
    {
        \Schema::table('scores', function (Blueprint $table) {
            $table->tinyInteger('no_answer');
            $table->tinyInteger('no_question');
        });
    }
}