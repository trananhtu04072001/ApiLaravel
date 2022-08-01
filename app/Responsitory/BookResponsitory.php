<?php

namespace App\Responsitory;

use App\Models\Book;
use function is;
use function is_null;

     class BookResponsitory extends EloquentResponsitory implements BookInterface {
         public function getBook()
         {
             return $this->model->get();
         }

         public function getModel()
         {
             return Book::class;
         }
     }
