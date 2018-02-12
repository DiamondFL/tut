<?php
/**
 * Created by PhpStorm.
 * User: cuongpm00
 * Date: 11/2/2016
 * Time: 9:24 AM
 */

namespace Istruct\Factories;
use Istruct\Components\CreateFormComponent;
use Istruct\Components\IndexFormComponent;
use Istruct\Components\ShowFormComponent;
use Istruct\Components\TableFormComponent;
use Istruct\Components\UpdateFormComponent;
use Istruct\Helpers\CRUDPath;

/**
 * Class FormFactory
 * Đối tượng form được sản xuất tại đây
 * Nơi sản xuất các thành phần component
 * Các
 * @package Istruct\Factories
 */
class FormFactory
{
    protected $component, $packet;

    private $creating, $updating, $showing, $indexing;
    public function __construct(
        CreateFormComponent $creating,
        UpdateFormComponent $updating,
        ShowFormComponent $showing,
        TableFormComponent $tabling,
        IndexFormComponent $indexing
    )
    {
        $this->creating = $creating;
        $this->updating = $updating;
        $this->showing = $showing;
        $this->tabling = $tabling;
        $this->indexing = $indexing;
    }

    private function buildCreate($input)
    {
        $material = $this->creating->building($input);
        $fileForm = fopen(CRUDPath::outCreateForm($input['route']), "w");
        fwrite($fileForm, $material);
    }

    private function buildTable($input)
    {
        $material = $this->tabling->building($input);
        $fileForm = fopen(CRUDPath::outTableForm($input['route']), "w");
        fwrite($fileForm, $material);
    }

    private function buildIndex($input)
    {
        $material = $this->indexing->building($input);
        $fileForm = fopen(CRUDPath::outIndexForm($input['route']), "w");
        fwrite($fileForm, $material);
    }

    private function buildUpdate($input)
    {
        $material = $this->updating->building($input);
        $fileForm = fopen(CRUDPath::outUpdateForm($input['route']), "w");
        fwrite($fileForm, $material);
    }

    private function buildShow($input)
    {
        $material = $this->showing->building($input);
        $fileForm = fopen(CRUDPath::outShowForm($input['route']), "w");
        fwrite($fileForm, $material);
    }

    public function building($input)
    {
        $this->buildCreate($input);
        $this->buildShow($input);
        $this->buildUpdate($input);
        $this->buildTable($input);
        $this->buildIndex($input);
    }
}