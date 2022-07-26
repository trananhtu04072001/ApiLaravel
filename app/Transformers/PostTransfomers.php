<?php

namespace App\Transformers;

use App\Models\Post;
use League\Fractal\TransformerAbstract;

      class PostTransfomers extends TransformerAbstract {
          public function transform(Post $post) {
              return [
                  'title' => $post->title,
                  'content' => $post->content,
              ];
          }
   }
