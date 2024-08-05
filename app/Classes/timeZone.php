<?php
/**
 * Created by PhpStorm.
 * User: BlackWolf
 * Date: 12/05/2019
 * Time: 5:42 PM
 */

namespace App\Classes;

use Carbon\Carbon;

class timeZone
{
    public static function getSchadualTimeToUtc($user,$timeStamp = 0)
    {
        return $timeStamp == 0 ? Carbon::now($user->time_zone)->tz("UTC")->getTimestamp() : Carbon::createFromTimestamp($timeStamp,$user->time_zone)->tz("UTC")->getTimestamp();
    }
}