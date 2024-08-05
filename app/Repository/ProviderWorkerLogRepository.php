<?php
/**
 * Created by PhpStorm.
 * User: BlackWolf
 * Date: 24/08/2019
 * Time: 5:31 PM
 */

namespace App\Repository;


use App\Job;
use App\Provider;
use App\ProviderWorkerLogger;
use Carbon\Carbon;

class ProviderWorkerLogRepository
{
    // don't use return statement in setters here
    protected $currentTimeStamp;

    public function __construct()
    {
        $this->currentTimeStamp = Carbon::now("UTC")->getTimestamp();
    }

    public static function updateProviderLogged($provider)
    {
        $providerLoggerCheck = ProviderWorkerLogger::where('provider_id', '=', $provider->id)
            ->where('logout_time', '=', 0)
            ->orderBy("logout_time", "desc")
            ->first();
        if (!empty($providerLoggerCheck)) {
            $providerLogger = new ProviderWorkerLogRepository();
            ProviderWorkerLogger::where('id', '=', $providerLoggerCheck->id)
                ->update([
                    'logout_time' => $providerLogger->currentTimeStamp
                ]);
        }
    }

    public static function createProviderLogged($provider)
    {
        $providerLoggerCheck = ProviderWorkerLogger::where('provider_id', '=', $provider->id)
            ->where('logout_time', '=', 0)
            ->get();
        $providerLogger = new ProviderWorkerLogRepository();
        if ($providerLoggerCheck->count() == 0) {
            ProviderWorkerLogger::create([
                'provider_id' => $provider->id,
                'login_time' => $providerLogger->currentTimeStamp
            ]);
        }
    }

    public static function getLastLoggedInTime($provider)
    {
        $providerLoggerCheck = ProviderWorkerLogger::where('provider_id', '=', $provider->id)
            ->where('logout_time', '=', 0)
            ->orderBy("logout_time", "desc")
            ->first();
        return !empty($providerLoggerCheck) ? $providerLoggerCheck->login_time : 0;
    }

    public static function getTodayTrips($provider)
    {
        $startOfDay = TimeLoggerRepository::getStartOfDay();
        $todaysJobs = Job::where('job_schedual_time', '>=', $startOfDay)
            ->where('provider_id', '=', $provider->user_id)
            ->get();
        return $todaysJobs->count();
    }

    public static function getTodayEarnings($provider)
    {
        $earnings = 0;
        $startOfDay = TimeLoggerRepository::getStartOfDay();
        $todaysJobs = Job::where('job_schedual_time', '>=', $startOfDay)
            ->where('provider_id', '=', $provider->user_id)
            ->get();
        foreach ($todaysJobs as $job):
            $earnings += $job->service_price;
        endforeach;
        return $earnings;
    }

    public static function updateUserLogged($user)
    {
        $providerLogger = new ProviderWorkerLogRepository();
        ProviderWorkerLogger::where('user_id', '=', $user->id)
            ->where('logout_time', '=', 0)->update([
                'logout_time' => $providerLogger->currentTimeStamp
            ]);
    }

    public static function createUserLogged($user)
    {
        $providerLogger = new ProviderWorkerLogRepository();
        ProviderWorkerLogger::create([
            'user_id' => $user->id,
            'login_time' => $providerLogger->currentTimeStamp
        ]);
    }
}