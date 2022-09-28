<?php
const BOT_TOKEN = "5014250360:AAGewcYYR1j-YETuhMv5f3j6V1rP8UsjOCo";
const API_URL = "https://api.telegram.org/bot" . BOT_TOKEN . "/";
const DEVELOPER_ID = 248824780;

function sendmessage2($post_data)
{
    $curl = curl_init("https://api.telegram.org/bot5014250360:AAGewcYYR1j-YETuhMv5f3j6V1rP8UsjOCo/sendMessage");
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER=>["Content-Type : application/json"],
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $post_data,
    ));

    $response = curl_exec($curl);

    sendme(vstr($response) );

    curl_close($curl);

}
function vstr($var)
{
    ob_start();
    var_dump($var);
    return ob_get_clean();
}
function sendme($text)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.telegram.org/bot5014250360:AAGewcYYR1j-YETuhMv5f3j6V1rP8UsjOCo/sendMessage",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER=>["Content-Type : application/json"],
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>['text' => $text , 'chat_id' => DEVELOPER_ID]
    ));

    $response = curl_exec($curl);
    curl_close($curl);

}
function apiRequest($method, $parameters)
{
    $url = API_URL . $method;
    $handle = curl_init($url);
    curl_setopt($handle, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($parameters));
    //return exec_curl_request($handle);
    curl_exec($handle);
    curl_close($handle);
}
    
function SendMessage($id, $text)
{
    apiRequest("sendMessage", array(
        'chat_id' => $id,
        'text' => $text
        )
    );
}
function DeleteMessage($chat_id, $message_id)
{
    apiRequest("DeleteMessage", array(
        'chat_id' => $chat_id,
        'message_id' => $message_id
         )
    );
}
function VardumpToString($id, $input)
{
    ob_start();
    var_dump($input);
    $p = ob_get_clean();
    SendMessage($id, $p);
}
VardumpToString(DEVELOPER_ID, "yep");
$update = json_decode(file_get_contents('php://input'), true);
if (isset($update['message'])) {
    $username = $update['message']['from']['username'];
    $chat_id = $update['message']['chat']['id'];
    $id = $update['message']['from']['id'];
    $fname = $update['message']['from']['first_name'];
    //$lname  = $update['message']['from']['last_name'];
    $message = $update['message'];
    $text = $message['text'];
    SendMessage(DEVELOPER_ID, $text);
}