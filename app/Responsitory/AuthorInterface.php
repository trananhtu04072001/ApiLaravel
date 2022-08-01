<?php

namespace App\Responsitory;

interface AuthorInterface extends ResponsitoryInterface
{
    public function getAuthor();

    public function getFile($atribute);
}
