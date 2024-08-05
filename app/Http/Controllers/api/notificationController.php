<?php

namespace App\Http\Controllers\api;

use App\Repository\NotificationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class notificationController extends Controller
{
    //
    public function getNotifications()
    {
        return NotificationRepository::getNofications();
    }
    public function setNotificationMarked(Request $request){
        return NotificationRepository::markViewd($request->notification_id);
    }
}
