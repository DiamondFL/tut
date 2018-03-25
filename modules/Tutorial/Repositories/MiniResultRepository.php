<?php

namespace Tutorial\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface NewsRepository
 * @package namespace App\Repositories;
 */
interface MiniResultRepository extends RepositoryInterface
{
    public function myPaginate($input);
    public function store($input);
    public function change($input, $data);
    public function delete($data);
    public function import($file);
}