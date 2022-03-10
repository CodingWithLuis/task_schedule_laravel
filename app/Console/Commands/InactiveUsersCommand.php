<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class InactiveUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:inactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'if the last login from user was more than 30 days change the user to inactive';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = now()->subDays(30);

        User::whereDate('last_login_at', '<=', $date)
            ->update(['is_active' => 0]);
    }
}
