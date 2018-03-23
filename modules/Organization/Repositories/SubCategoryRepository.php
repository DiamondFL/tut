<?php

namespace Organization\Repositories;

use Istruct\MultiInheritance\ExtraRepositoryInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface NewsRepository
 * @package namespace App\Repositories;
 */
interface SubCategoryRepository extends RepositoryInterface, ExtraRepositoryInterface
{
    public function myPaginate($input);
    public function store($input);
    public function change($input, $data);
    public function delete($data);
    public function import($file);
}