<?php

namespace App\Responsitory;

use App\Models\Author;
use Illuminate\Support\Facades\Storage;

class AuthorResponsitory extends EloquentResponsitory implements AuthorInterface
{
    public function getFile($atribute)
    {
            $path = storage::makeDirectory('images');
            $imageName = time() . '.' . $atribute->extension();
            $image = $atribute->storeAs($path, $imageName);
            return $image;
    }

    public function create(array $atribute)
    {
        $author = new Author();
        $author->name = $atribute['name'];
        $author->email = $atribute['email'];
        if($atribute['image'] != null) {
            $author->image = $this->getFile($atribute['image']);
        }
        return $author->save();
    }

    public function getAuthor()
    {
      return $this->model->get();
    }

    public function getModel()
    {
       return Author::class;
    }

    public function update($id, array $atribute)
    {
        $author = $this->model->find($id);
        if(storage::exists($author->image)){
        $author->name = $atribute['name'];
        $author->email = $atribute['email'];
        $author->image = $this->getFile($atribute['image']);
            storage::delete($author->image);
            return $author->save();
        }
        else {
            echo 'File không tồn tại';
        }
    }

    public function delete($id)
    {
        $author = $this->model->find($id);
        if(storage::exists($author->image)) {
            storage::delete($author->image);
        }
        return $author->delete();
    }
}
