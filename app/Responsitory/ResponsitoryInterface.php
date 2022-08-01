<?php
namespace App\Responsitory;

interface ResponsitoryInterface
{
    public function getAll();
    public function find($id);
    public function create(array $atribute);
    public function update($id ,array $atribute);
    public function delete($id);
}
