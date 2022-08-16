<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Notifications\AccountExpire;
use App\Models\Subscribe;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

class ExpiryNotify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifyExpiry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify expiration';

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
        $subscribes = Subscribe::whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('invite_codes')
                    ->whereColumn('invite_codes.subscriber_id', 'subscribes.id')
                    ->whereNotNull('invite_codes.end_date')
                    ->whereRaw('DATEDIFF(invite_codes.end_date, "'.date('Y-m-d').'") in (7,3,1)');
                })->get();
        // dd($subscribes);
        foreach ($subscribes as $key => $sub) {

            $admins = User::where('subscriber_id',$sub->id)
                        ->where('status',User::STATUS_ACTIVATED)
                        ->where('role','!=',User::ROLE_DOCTOR)
                        ->get();

            $users = User::whereExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('invite_codes')
                        ->whereColumn('invite_codes.user_id', 'users.id')
                        ->whereRaw('DATEDIFF(invite_codes.end_date, "'.date('Y-m-d').'") in (7,3,1)');
                    })
                    ->where('subscriber_id',$sub->id)
                    ->where('status',User::STATUS_ACTIVATED)->get();
            foreach ($users as $key => $client) {
                Notification::send($admins, new AccountExpire($client));
            }
        }

        return 0;
    }
}