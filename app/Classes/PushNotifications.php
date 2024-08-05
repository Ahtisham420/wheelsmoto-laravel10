<?php

namespace App\Classes;

//use GuzzleHttp\Client;


class PushNotifications
{
    public static function sendJobPushNotification($title, $api, $msg, $to)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n  \"data\": {\n    \"title\": \"$title\",\n    \"body\": \"$api\",\n    \"msg\": \"$msg\",\n    \"api\": \"$api\"\n  },\n  \"notification\": {\n    \"content_available\": true,\n   \"title\": \"$title\",\n    \"body\": \"$title\",\n    \"type\" : \"$title\"\n  },\n  \"to\":\"$to\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Authorization: key=AAAAP_ObM7c:APA91bF_frPjmN19WaQ6r4z43_eX31mwW98Q-w_LoaAknKbbvd4H-vqQ3lhs-nMIFToMYauJFlTLMri3UAxFzQSeuGHl1UGYa1The82SE1HcYVX0x6GsvOSmWioj6lT0lLffx4B7DUTH",
                "Content-Type: application/json",
                "Postman-Token: f5332fdd-307e-43c2-b078-9eb129e381d8",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }
    }

    public static function sendPushNotification($type = "", $title = "", $api = "", $body = "", $msg = "", $to = "")
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n  \"data\": {\n    \"title\": \"$title\",\n    \"body\": \"$body\",\n    \"msg\": \"$msg\",\n    \"api\": \"$api\"\n  },\n  \"notification\": {\n    \"content_available\": true,\n    \"title\": \"$title\",\n    \"body\": \"$body\",\n    \"type\" : \"$type\"\n  },\n  \"to\":\"$to\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Authorization: key=AAAAP_ObM7c:APA91bF_frPjmN19WaQ6r4z43_eX31mwW98Q-w_LoaAknKbbvd4H-vqQ3lhs-nMIFToMYauJFlTLMri3UAxFzQSeuGHl1UGYa1The82SE1HcYVX0x6GsvOSmWioj6lT0lLffx4B7DUTH",
                "Content-Type: application/json",
                "Postman-Token: c29a11a7-1ca0-435f-9ba1-5f0f9de76e18",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }
    }

    public static function sendSilentNotification($api, $msg, $to)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n    \"notification\": {\n        \"content_available\": true,\n        \"type\" : \"$api\"\n    },\n      \"data\": {\n    \t\"body\": \"$api\",\n    \t\"msg\": \"$msg\",\n    \t\"api\": \"$api\"\n  },\n    \"to\": \"$to\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Authorization: key=AAAAP_ObM7c:APA91bF_frPjmN19WaQ6r4z43_eX31mwW98Q-w_LoaAknKbbvd4H-vqQ3lhs-nMIFToMYauJFlTLMri3UAxFzQSeuGHl1UGYa1The82SE1HcYVX0x6GsvOSmWioj6lT0lLffx4B7DUTH",
                "Content-Type: application/json",
                "Postman-Token: 3c74cd43-9707-4af1-9e11-6074865846a2",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }
    }

    public static function dispatchDismissJobSilentNotification($job_id,$fcm_token)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n    \"notification\": {\n        \"content_available\": true,\n        \"type\" : \"jobDismiss\"\n    },\n      \"data\": {\n    \t\"body\": \"jobDismiss\",\n    \t\"msg\": \"job Accepted by other provider\",\n    \t\"job_id\": \"0\"\n  },\n    \"to\": \"$fcm_token\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Accept: */*",
                "Authorization: key=AAAAP_ObM7c:APA91bF_frPjmN19WaQ6r4z43_eX31mwW98Q-w_LoaAknKbbvd4H-vqQ3lhs-nMIFToMYauJFlTLMri3UAxFzQSeuGHl1UGYa1The82SE1HcYVX0x6GsvOSmWioj6lT0lLffx4B7DUTH",
                "Cache-Control: no-cache",
                "Connection: keep-alive",
                "Content-Type: application/json",
                "Host: fcm.googleapis.com",
                "Postman-Token: e24b2487-eb90-47c6-8504-003ed4d61734,1d81b221-2226-4a72-bf76-80c67e969a47",
                "User-Agent: PostmanRuntime/7.13.0",
                "accept-encoding: gzip, deflate",
                "cache-control: no-cache",
                "content-length: 375"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        }
//        dd($job_id,$fcm_token);
        return true;
    }

    public static function dispatchNewJobPushNotification($title, $body, $api, $msg, $to)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n  \"data\": {\n    \"title\": \"$title\",\n    \"body\": \"$body\",\n    \"msg\": \"$msg\",\n    \"api\": \"$api\"\n  },\n  \"notification\": {\n    \"content_available\": true,\n   \"title\": \"$title\",\n    \"body\": \"$body\",\n    \"type\" : \"$title\"\n  },\n  \"to\":\"$to\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Authorization: key=AAAAP_ObM7c:APA91bF_frPjmN19WaQ6r4z43_eX31mwW98Q-w_LoaAknKbbvd4H-vqQ3lhs-nMIFToMYauJFlTLMri3UAxFzQSeuGHl1UGYa1The82SE1HcYVX0x6GsvOSmWioj6lT0lLffx4B7DUTH",
                "Content-Type: application/json",
                "Postman-Token: f5332fdd-307e-43c2-b078-9eb129e381d8",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }
    }

    public static function sendStatusPushNotification($to){

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n  \"data\": {\n    \"title\": \"approved\",\n    \"body\": \"approved\",\n    \"msg\": \"approved\",\n    \"status\": 1\n  },\n  \"notification\": {\n    \"content_available\": true,\n    \"title\": \"approved\",\n    \"body\": \"approved\"\n  },\n  \"to\":\"$to\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Accept: */*",
                "Authorization: key=AAAAP_ObM7c:APA91bF_frPjmN19WaQ6r4z43_eX31mwW98Q-w_LoaAknKbbvd4H-vqQ3lhs-nMIFToMYauJFlTLMri3UAxFzQSeuGHl1UGYa1The82SE1HcYVX0x6GsvOSmWioj6lT0lLffx4B7DUTH",
                "Cache-Control: no-cache",
                "Connection: keep-alive",
                "Content-Type: application/json",
                "Host: fcm.googleapis.com",
                "Postman-Token: 50ac9df8-21d6-449a-985d-d7a71435639f,20e1e8ed-7ad4-49ba-822a-26644cd135e8",
                "User-Agent: PostmanRuntime/7.15.0",
                "accept-encoding: gzip, deflate",
                "cache-control: no-cache",
                "content-length: 374"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }
    }

    public static function sendStatusPushNotificationNo($to){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n  \"data\": {\n    \"title\": \"unapproved\",\n    \"body\": \"unapproved\",\n    \"msg\": \"unapproved\",\n    \"status\": 0\n  },\n  \"notification\": {\n    \"content_available\": true,\n    \"title\": \"unapproved\",\n    \"body\": \"unapproved\"\n  },\n  \"to\":\"$to\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Accept: */*",
                "Authorization: key=AAAAP_ObM7c:APA91bF_frPjmN19WaQ6r4z43_eX31mwW98Q-w_LoaAknKbbvd4H-vqQ3lhs-nMIFToMYauJFlTLMri3UAxFzQSeuGHl1UGYa1The82SE1HcYVX0x6GsvOSmWioj6lT0lLffx4B7DUTH",
                "Cache-Control: no-cache",
                "Connection: keep-alive",
                "Content-Type: application/json",
                "Host: fcm.googleapis.com",
                "Postman-Token: 2640cd7b-69ce-45e8-912a-67fcab9301cf,e5bbb786-44f1-4c24-ad01-d41c8fa59a3d",
                "User-Agent: PostmanRuntime/7.15.0",
                "accept-encoding: gzip, deflate",
                "cache-control: no-cache",
                "content-length: 384"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
//        var_dump($response);
//        var_dump($err);
//        exit();
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }
    }

    public static function sendChatPushNotification($to,$title,$message){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n  \"data\": {\n    \"title\": \"$title\",\n    \"body\": \"You have new messages\",\n    \"msg\": \"You have new messages\",\n    \"status\": 0\n  ,\"api\": \"message\"\n},\n  \"notification\": {\n    \"content_available\": true,\n    \"title\": \"You have new messages\",\n    \"body\": \"You have new messages\"\n  },\n  \"to\":\"$to\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Accept: /",
                "Authorization: key=AAAAP_ObM7c:APA91bF_frPjmN19WaQ6r4z43_eX31mwW98Q-w_LoaAknKbbvd4H-vqQ3lhs-nMIFToMYauJFlTLMri3UAxFzQSeuGHl1UGYa1The82SE1HcYVX0x6GsvOSmWioj6lT0lLffx4B7DUTH",
                "Cache-Control: no-cache",
                "Connection: keep-alive",
                "Content-Type: application/json",
                "Host: fcm.googleapis.com",
                "Postman-Token: 2640cd7b-69ce-45e8-912a-67fcab9301cf,e5bbb786-44f1-4c24-ad01-d41c8fa59a3d",
                "User-Agent: PostmanRuntime/7.15.0",
                "accept-encoding: gzip, deflate",
                "cache-control: no-cache",
                // "content-length: 384"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
//        var_dump($response);
//        var_dump($err);
//        exit();
        curl_close($curl);
        if ($err) {
            return "cURL Error #:" . $err;
        }
    }
    public static function sendChatSilentNotification($api, $msg, $to)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n    \"notification\": {\n        \"content-available\": 1,\n        \"type\" : \"$api\"\n    },\n      \"data\": {\n    \t\"body\": \"$api\",\n    \t\"msg\": \"$msg\",\n    \t\"api\": \"$api\"\n  },\n    \"to\": \"$to\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Authorization: key=AAAAP_ObM7c:APA91bF_frPjmN19WaQ6r4z43_eX31mwW98Q-w_LoaAknKbbvd4H-vqQ3lhs-nMIFToMYauJFlTLMri3UAxFzQSeuGHl1UGYa1The82SE1HcYVX0x6GsvOSmWioj6lT0lLffx4B7DUTH",
                "Content-Type: application/json",
                "Postman-Token: 3c74cd43-9707-4af1-9e11-6074865846a2",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        }
    }

}