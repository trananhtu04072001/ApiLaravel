<?php

namespace App\Responsitory;


interface BookInterface {
    public function Insert(array $data);
    public function getAll();
    public function Update($id = null);
    public function Delete($id = null);
    public function View($id);
}
