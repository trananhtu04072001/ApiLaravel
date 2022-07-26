<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Transformers\PostTransfomers;
use League\Fractal\Manager;
use Illuminate\Database\Eloquent\Collection;
//use Spatie\Fractal\Facades\Fractal;
use Spatie\Fractalistic\Fractal;


class PostController extends Controller
{

private $fractal;

private $postTransfomers;

    function __construct(Manager $fractal , PostTransfomers $postTransfomers)
    {
        $this->fractal = $fractal;
        $this->postTransfomers = $postTransfomers;
    }

     public function index() {
        $data = Post::all();
         $fractal = Fractal::create()->collection($data)->transformWith(new PostTransfomers())->toArray();
        return $this->successResponse($fractal , 'thành công' , 200);
     }

    public function insertform(PostRequest $req) {
        $req->validated();
        $post = new Post();
        $post->title = $req->title;
        $post->content = $req->conten;
        $post->user_id = $req->user_id;
        $post->save();
        return $this->successResponse($post,'Thêm bài viết thành công',201);
    }
}
