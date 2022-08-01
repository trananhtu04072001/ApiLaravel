<?php

namespace App\Responsitory;


abstract class EloquentResponsitory implements ResponsitoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }
abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id) {
        return $this->model->find($id);
    }

    public function create(array $atribute) {
        return $this->model->create($atribute);
    }

    public function update($id , array $atribute)
    {
        $result = $this->find($id);
        if($result) {
            $result->update($atribute);
            return $result;
        }
        else {
            return false;
        }
    }

    public function delete($id) {
        $result = $this->find($id);
        if($result) {
            $result->delete();
            return true;
        }
        return false;
    }
}
