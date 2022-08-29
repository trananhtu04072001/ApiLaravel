<?php

namespace App\Console\Commands;

use App\Models\Post as Postmodel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class InsertPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Thêm bài viết';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        return 0;
//        Postmodel::created([
//            'title' => 'bài 1'.time(),
//            'content' => 'nội dung'.time(),
//            'user_id' => null,
//        ]);
        $post = new Postmodel();
        $post->title = 'tiêu đề'.time();
        $post->content = 'Nội dung'.time();
//        if(Auth::guard('web') != null) {
//            $post->user_id = Auth::guard('web')-id;
//        }
        $post->user_id = 1;
        $post->save();
        echo "Đã thêm bài viết";
    }
}
