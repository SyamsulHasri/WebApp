<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Activity;
use App\Jobs\SendNotificationMail;
use Carbon\Carbon;

class NotificationsJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:jobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert jobs for notification every day based on reminder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $activity = Activity::where('reminder', 1)->where('date', Carbon::now()->format('Y-m-d'))->get();
        foreach($activity as $act){
            // $this->dispatch(new SendNotificationMail($act->user->email));
            SendNotificationMail::dispatch($act->user->email)
                    ->delay(now()->addSeconds(1));
        }
    }
}
