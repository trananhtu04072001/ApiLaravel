<?php

namespace App\Responsitory;

use App\Models\Book;
use function is;
use function is_null;

     class BookResponsitory implements BookInterface {
         public function Insert(array $data)
         {
             $book = new Book();
             $book->title = $data['title'];
             $book->content = $data['content'];
             $book->price = $data['price'];
             return $book->save();
         }

         public function getAll()
         {
             $book = Book::all();
             return $book;
         }

         public function Update($id = null)
         {
         }

         public function Delete($id = null)
         {
             // TODO: Implement Delete() method.
         }

         public function View($id)
         {
             // TODO: Implement View() method.
         }
     }
