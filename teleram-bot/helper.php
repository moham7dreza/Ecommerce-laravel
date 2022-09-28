<?php

const DEVELOPERID = 248824780;
function sendmessage($post_data)
{
    $curl = curl_init("https://api.telegram.org/bot1467186828:AAFmpPbeHLStxaO_fvlzQ3gMMphI4KZEhx8/sendMessage");
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
        CURLOPT_URL => "https://api.telegram.org/bot1467186828:AAFmpPbeHLStxaO_fvlzQ3gMMphI4KZEhx8/sendMessage",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER=>["Content-Type : application/json"],
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>['text' => $text , 'chat_id' => DEVELOPERID]
    ));

    $response = curl_exec($curl);
    curl_close($curl);

}


?>