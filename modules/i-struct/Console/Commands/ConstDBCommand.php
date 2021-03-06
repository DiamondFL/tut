<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/31/18
 * Time: 9:17 AM
 */

namespace Istruct\Console\Commands;


use Illuminate\Console\Command;
use Istruct\Factories\ConstantFactory;

class ConstDBCommand extends Command
{
    protected $signature = 'render:const';
    private $factory;
    public function __construct(ConstantFactory $factory)
    {
        parent::__construct();
        $this->factory = $factory;
    }

    public function handle()
    {
        $this->factory->building(NULL);
    }
}