<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
        '\App\Console\Commands\AutoKycReminder',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
		/*$schedule->command('AutoKycReminder:AutoKycReminder')
                 ->everyMinute();
		*/
		$schedule->command('AutoKycReminder:AutoKycReminder')
                 ->daily();
		
		$schedule->command('AutoKycReminder:AutoKycReminder')
                 ->tuesdays();
		$schedule->command('AutoKycReminder:AutoKycReminder')
                 ->fridays();
		
    }
	
}
