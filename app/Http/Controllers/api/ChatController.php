<?php

namespace App\Http\Controllers\api;

use App\Chat;
use App\Classes\PushNotifications;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'to' => 'required',
                'from' => 'required',
                'message' => 'required',
            ]);

            if ($validator->fails()) {
                $response = [
                    'code' => 400,
                    'data' => new \stdClass(),
                    'error_msg' => $validator->errors()
                ];
            } else {
                $response = $this->insertMessage($request);
                $user = User::find($request->to);
                $errorpush = PushNotifications::sendChatPushNotification($user->fcm_token, "New Message", $request->message);
                $errorsilent = PushNotifications::sendChatSilentNotification("message", $request->message, $user->fcm_token);
                if (!empty($errorpush)) {
                    $response['error_msg'] .= " But " . $errorpush;
                }
                if (!empty($errorsilent)) {
                    $response['error_msg'] .= " But " . $errorsilent;
                }
            }
        } else {
            $response = [
                'code' => 401,
                'data' => new \stdClass(),
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public function getMessages(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'user1' => 'required',
                'user2' => 'required'
            ]);

            if ($validator->fails()) {
                $response = [
                    'code' => 400,
                    'data' => new \stdClass(),
                    'error_msg' => $validator->errors()
                ];
            } else {
                $response = $this->fetchMessages($request);
            }
        } else {
            $response = [
                'code' => 401,
                'data' => new \stdClass(),
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    protected function insertMessage($request)
    {
        $chat = Chat::create(array_merge($request->all(), ['msg_time' => Carbon::now("UTC")->getTimestamp()]));
        if (!empty($chat)) {
            // if data inserted
            $response = [
                'code' => 200,
                'data' => new \stdClass(),
                'error_msg' => trans('alert.message_sent')
            ];
        } else {
            // if data insertion failed
            $response = [
                'code' => 300,
                'data' => new \stdClass(),
                'error_msg' => trans('alert.message_failed')
            ];
        }
        return $response;
    }

    protected function fetchMessages($request)
    {
        $response = [];
        $messages = Chat::where([['from', '=', $request->user1], ['to', '=', $request->user2]])
            ->orWhere([['from', '=', $request->user2], ['to', '=', $request->user1]])
            ->latest()
            ->with(array('to_user' => function ($query) {
                $query->select('id', 'first_name', 'last_name');
            }, 'from_user' => function ($query) {
                $query->select('id', 'first_name', 'last_name');
            }))
            ->paginate();

        if (!empty($messages)) {
            $response = [
                'code' => 200,
                'data' => $messages,
                'error_msg' => trans('alert.no_error')
            ];
        } else {
            $response = [
                'code' => 500,
                'data' => [],
                'error_msg' => trans('alert.record_not_found')
            ];
        }
        return $response;
    }
}
