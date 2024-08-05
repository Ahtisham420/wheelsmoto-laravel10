<?php
/**
 * Created by PhpStorm.
 * User: BlackWolf
 * Date: 24/08/2019
 * Time: 3:50 PM
 */

namespace App\Repository;


use App\ProviderWorkerLogger;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TimeLoggerRepository
{
    public function getTodayLoggedTime($provider_id)
    {
        $this->getTodayDuration($provider_id);
    }

    public function getTodayDate($timestamp)
    {
        return Carbon::createFromTimestamp($timestamp)->toDate();
    }

    public static function getStartOfDay()
    {
//        return Carbon::now('UTC')->addDays(-1)->getTimestamp();
        return Carbon::now('UTC')->startOfDay()->getTimestamp();
    }

    public static function getTodayDuration($provider_id)
    {

//        $today = Carbon::now('UTC')->getTimestamp();
        $TimeLoggerRepository = new TimeLoggerRepository();
        $yesterday = $TimeLoggerRepository->getStartOfDay();
        $loggedRows = ProviderWorkerLogger::where('provider_id', '=', $provider_id)
            ->where('login_time', '>=', $yesterday)
            ->where('logout_time', '!=', 0)
            ->get();
        $loggedSeconds = 0;
        foreach ($loggedRows as $row):
            $loggedSeconds += ($row->logout_time - $row->login_time);
        endforeach;
        return $loggedSeconds;
    }

    public function getEndOfDay()
    {
        return Carbon::now('UTC')->endOfDay()->getTimestamp();
    }

    public function getYesterdayEndOfDay()
    {
        return Carbon::now('UTC')->addDays(-1)->endOfDay()->getTimestamp();
    }

    public static function reInitLogin()
    {
        $repo = new TimeLoggerRepository();
        $adminTimeZone = User::where('type', '=', User::admin)->first();
        $currentTime = Carbon::now($adminTimeZone->time_zone)->getTimestamp();
        $todayEndOfDay = Carbon::now($adminTimeZone->time_zone)->endOfDay()->getTimestamp();
        $tommorowStartOfDay = Carbon::now($adminTimeZone->time_zone)->addDays(1)->startOfDay()->getTimestamp();
        if ($currentTime >= ($todayEndOfDay - 300) && $currentTime < $tommorowStartOfDay) {
            $loggedRows = ProviderWorkerLogger::where('logout_time', '=', 0)->get();
            foreach ($loggedRows as $row):
                ProviderWorkerLogger::where('id', '=', $row->id)->update([
                    'logout_time' => $repo->getEndOfDay(),
                    'reinit' => 1,
                ]);
                ProviderWorkerLogger::create([
                    'provider_id' => $row->provider_id,
                    'user_id' => $row->user_id,
                    'login_time' => ($repo->getEndOfDay()+1)
                ]);
            endforeach;
        }
    }
}