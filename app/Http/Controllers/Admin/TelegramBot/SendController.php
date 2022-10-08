<?php

namespace App\Http\Controllers\Admin\TelegramBot;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function Livewire\str;

class SendController extends Controller
{
    public function message()
    {
        return view('admin.telegram-bot.send.message');
    }

    public function sendMessage(Request $request)
    {
        $chat_id = 248824780;

        $responses = $this->allApis();

        foreach ($responses as $response)
        {

//            $this->sendMessageTo($chat_id, $response->json()['message']);
            if($response->status() == 200 && $response->json()['status'] == 'success')
            {
                $data = $response->json()['data'];
                foreach ($data as $record)
                {
                    $this->sendMessageTo($chat_id, '1');
                }
            }
            else
            {
                $this->sendMessageTo($chat_id, 'اطلاعاتی برای نمایش وجود ندارد.');
            }
        }
        return redirect()->back()->with('swal-success', 'پیام با موفقیت ارسال شد.');


//        $result = json_decode($this->sendMessageTo($chat_id, 'اطلاعاتی برای نمایش وجود ندارد.'));
//        if($result->ok){
//            return redirect()->back()->with('swal-success', 'پیام با موفقیت ارسال شد.');
//        }
//        return redirect()->back()->with('swal-alert', 'خطایی در ارسال پیام رخ داد.');
    }

    function sendTelegram($chatID, $msg)
    {
        $token = "bot5763941835:AAFo0FE8odI2985KuQC02k9Zq2I2lrxwCgc";
        $getUpdate = "http://api.telegram.org/" . $token . "/getUpdates";

        $url = "https://api.telegram.org/" . $token . "/sendMessage?chat_id=" . $chatID;
        $url = $url . "&text=" . urlencode($msg);

        $ch = curl_init();
        $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        if (curl_error($ch)) {
            echo('error:' . curl_error($ch));
        }
        $result = curl_exec($ch);

        curl_close($ch);
        return $result;
    }

    function sendMessageTo($chat_id, $text)
    {
        $botToken = "5763941835:AAFo0FE8odI2985KuQC02k9Zq2I2lrxwCgc";

        $website = "https://api.telegram.org/bot" . $botToken;
        $params = [
            'chat_id' => $chat_id,
            'text' => $text,
        ];
        $ch = curl_init($website . '/sendMessage');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    function allApis()
    {
        return Http::acceptJson()->pool(fn (Pool $pool) => [
            $pool->as('notifs')->get('127.0.0.1:8001/api/admin/notification/all'),
            $pool->as('products')->get('127.0.0.1:8001/api/admin/market/product/all'),
            $pool->as('orders')->get('127.0.0.1:8001/api/admin/market/orders/all'),
            $pool->as('comments')->get('127.0.0.1:8001/api/admin/market/comment/all'),
        ]);
    }
}


/*
 *
 * <?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.telegram.org/bot5763941835:AAFo0FE8odI2985KuQC02k9Zq2I2lrxwCgc/sendMessage',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('chat_id' => '248824780','text' => 'hi222222'),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

 */
