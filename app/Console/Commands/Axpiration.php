<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Admin\Subscription;

class Axpiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'subscription expire every 5 minute automaically';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $subscription = Subscription::where('expire' , 0)->get();

        foreach ($subscription as  $item) {
            $item ->update(['expire' => 1]);
        }
    }
}
