<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\NotifyInactiveUser;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class InactiveUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:inactiveUsers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gửi mail cho người dùng';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $limit = Carbon::now()->subDay(2);
        $inactive_user = User::where('last_login', '<' , $limit)->get();
        foreach ($inactive_user as $user) {
            $user->notify(new NotifyInactiveUser());
        }
    }
}
