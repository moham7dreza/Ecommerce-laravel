<?php
require 'config.php';
require 'TelegramBot.php';
//require 'helper.php';

$update = json_decode(file_get_contents('php://input'), true);
$channel = "https://t.me/joinchat/AAAAAEYOrs_gEVn2u-g8og";
$text_linkmenu = "با زدن بر روی نام رشته خود ، میتوانید در سوپر گروه تخصصی دانشجویان رشته خود عضو شوید. اگر گروه شما در لیست زیر وجود ندارد در بخش ارسال نظر ربات لینک عضویت در گروه را بفرستید.";
$IK_Groups =
    [
        [
            ['text' => "برق", "url" => "https://t.me/bargh_uut"],
            ['text' => "مکانیک و هوافضا", "url" => "https://t.me/mechanicuut"],
        ],
        [
            ['text' => "مواد", "url" => "https://t.me/materialuut"],
            ['text' => "معدن", "url" => "https://t.me/joinchat/AAAAAEO48irB-4bagGp5XA"],
        ],
        [
            ['text' => "نرم افزار و IT", "url" => "https://telegram.me/joinchat/BdVYpz-d-Zyo9Xilwezs3A"],
            ['text' => "شیمی", "url" => "https://t.me/chemicaluut"],
        ],
        [
            ['text' => "صنایع", "url" => "https://t.me/joinchat/AAAAAERCxFC6q_g3flNf0Q"],
            ['text' => "عمران", "url" => "https://t.me/"],
            //  ['text'=>"هوا فضا","url"=>$channel_link],
        ],
        [
            ['text' => "اپتیک و لیزر", "url" => "https://t.me/opso_uut"],
            ['text' => "نساجی", "url" => $channel],
            ['text' => "ساخت و تولید", "url" => $channel],

        ],
        [
            ['text' => "کانال رسمی دانشگاه", "url" => "https://t.me/uutnews1"],
        ],
        [
            ['text' => "سلام بر دانشجو", "url" => "https://t.me/salambar_daneshjoo"],
            ['text' => "بسیج دانشجویی", "url" => "https://t.me/basij_uut"],

        ],

        [
            ['text' => "بازگشت", "callback_data" => "5"],

        ]
    ];
$IK =
    [
        [
            ['text' => "تایید", "callback_data" => "2"],
            ['text' => "رد", "callback_data" => "1"],

        ],
        [
            ['text' => "لایک و دیس", "callback_data" => "likedar"],
            ['text' => "لایک دار", "callback_data" => "galbdar"],

        ],
        [
            ['text' => "محبوب", "callback_data" => "3"],
        ]
    ];
$IK_Tabligh =
    [
        [
            ['text' => "عضویت در کانال توییتر😃", "url" => $channel],

        ],
        [
            ['text' => "خرید و فروش کتب دست دوم 📚", "url" => $channel],
            ['text' => "یادآوری هفتگی رزرو غذا🍳", "url" => $channel],
        ],
        [
            ['text' => "ارسال به دوستان", "switch_inline_query" => ""]
        ],
        [
            ['text' => "لینک سایر گروه ها", "callback_data" => "4"],
        ]
    ];
$IK_TablighRF =
    [
        [
            ['text' => "یادآوری هفتگی رزرو غذا🍳", "url" => $channel],
        ],
        [
            ['text' => "ارسال به دوستان", "switch_inline_query" => "food"]
        ]
    ];
$link_booksell = "https://t.me/callofuutbot?start=bookselling";
$IK_TablighBook =
    [
        [
            ['text' => "خرید و فروش کتب دست دوم 📚", "url" => $link_booksell],
        ],
        [
            ['text' => "ارسال به دوستان", "switch_inline_query" => ""]
        ]
    ];

if (isset($update['message'])) {
    $username = $update['message']['from']['username'];
    $chat_id = $update['message']['chat']['id'];
    $id = $update['message']['from']['id'];
    $fname = $update['message']['from']['first_name'];
    //$lname  = $update['message']['from']['last_name'];
    $message = $update['message'];
    $text = $message['text'];
    switch ($text) { //commands
        case "/s":
            {
                $bot = new TwitterBot();
                $c = json_decode($bot->getc(), true);
                $bot->VardumpToString(DEVELOPER_ID, $c['data']['0']['title']);
                $bot->SendMessage(DEVELOPER_ID, sizeof($c['data']));
                $bot->VardumpToString(DEVELOPER_ID, $c['data'][0]['data']['thumbnail']);
            }
            break;
        default :
            break;
    }
} elseif (isset($update['callback_query'])) //answer to queez
{
    $msg_flag = false;
    $i_msg_flag = false;
    $cb = $update['callback_query'];
    unset($update);
    $id = $cb['from']['id'];
    if (isset($cb['message'])) {
        $chat_id = $cb['message']['chat']['id'];
        $message = $cb['message'];
        $message_id = $message['message_id'];
        $msg_flag = true;
    }
    if (isset($cb['inline_message_id'])) {
        $inline_msg_id = $cb['inline_message_id'];
        $i_msg_flag = true;
    }
    $data = $cb['data'];
    $c_id = $cb['id'];
    $bot = new TwitterBot();
    $bot->VardumpToString(DEVELOPER_ID, $cb);
    if ($data == "2") //tayid
    {
        $bot->EditIK($id, $bot->ChangeIKMark($IK, $data), $message['message_id']);

        if (isset($message['text'])) //text
        {

            $bot->SendMessage($channel, $message['text']);
        } elseif (isset($message['photo'])) //photo
        {


            $file_id = $bot->GetPhotoFileId($message);

            $caption = $message['caption'];


            if (isset($caption)) {
                $bot->SendPhotofid($channel, $file_id, $caption);

            } else {
                $bot->SendPhotofid($channel, $file_id, $channel); //without caption

            }
        } elseif (isset($message['document'])) //gif and doc
        {

            $file_id = $message['document']['file_id'];


            $caption = "";
            if (isset($message['caption'])) {
                $caption = $message['caption'];
            }

            $bot->SendDocument($channel, $file_id, $caption);


        } elseif (isset($message['video'])) //video
        {

            $file_id = $message['video']['file_id'];


            $caption = "";
            if (isset($message['caption'])) {
                $caption = $message['caption'];
            }

            $bot->SendVideo($channel, $file_id, $caption);


        } elseif (isset($message['audio'])) //audio
        {

            $file_id = $message['audio']['file_id'];


            $caption = "";
            if (isset($message['caption'])) {
                $caption = $message['caption'];
            }

            $bot->SendAudio($channel, $file_id, $caption);


        }

        $bot->AnswerCBquery($cb['id'], "");
    }
    if ($data == "4") //linke gp ha
    {

        if (isset($inline_msg_id))
            $bot->edit_caption(null, null, $inline_msg_id, $text_linkmenu, json_encode(['inline_keyboard' => $IK_Groups]));
        else {
            $bot->edit_caption($chat_id, $message_id, null, $text_linkmenu, json_encode(['inline_keyboard' => $IK_Groups]));
            //bedone aks
            //$bot->EditMIK($chat_id,$IK_Groups,$message_id,$text_linkmenu);
        }
    }
    if ($data == "5") //bazgasht az linke gp ha be menu tablighat
    {
        if (isset($inline_msg_id))
            $bot->edit_caption(null, null, $inline_msg_id, "سلام", json_encode(['inline_keyboard' => $IK_Tabligh]));
        else {
            $bot->edit_caption($chat_id, $message_id, null, $text_linkmenu, json_encode(['inline_keyboard' => $IK_Tabligh]));

            $bot->EditMIK($chat_id, $IK_Tabligh, $message_id, $text_linkmenu);
        }
    }

    $bot->AnswerCBquery($cb['id'], "");

} elseif (isset($update['inline_query'])) {
    $id = $update['inline_query']['from']['id'];
    $name = $update['inline_query']['from']['first_name'];
    $user_name = $update['inline_query']['from']['username'];
    $q_id = $update['inline_query']['id'];
    $query = $update['inline_query']['query'];
    $bot = new TwitterBot();
    $bot->VardumpToString(DEVELOPER_ID, "\nquery: " . $query . "\nname: " . $name . "\nusername: " . $user_name);
    if (strlen($query) >= 4) {
        $greet = $bot->Greeting();
        $courses = json_decode($bot->get_courses($query), true);
//        $schools = json_decode($bot->get_schools(), TRUE);
        $q_result = [];
        $qid = 1;
        $site = "https://ostadi.online";
        for ($i = 0; $i < count($courses['data']); $i++) {
            $school_slug = $courses['data'][$i]['school']['slug'];
            $course_id = $courses['data'][$i]['id'];
            $course_link = $site . "/" . $school_slug . "/courses/" . $course_id;
            $IK_Course =
                [
                    [
                        ['text' => "لینک دوره", "url" => $course_link], ['text' => "اطلاعات بیشتر", "url" => "https://ostadi.online/"],
                    ],
                    [
                        ['text' => "عضویت در کانال تلگرامی", "url" => "https://t.me/ostadionline"], ['text' => "ارسال به دوستان", "switch_inline_query" => ""],
                    ],
                    [
                        ['text' => "صفحه اینستاگرام ما", 'url' => "https://www.instagram.com/ostadionline/"],
                    ],
                    [
                        ['text' => "اپلیکیشن اندرویدی استادی آنلاین", "url" => "https://t.me/ostadionline"]
                    ],
                    [
                        ['text' => "Designed And Developed with 💙 by CGR.IR", "url" => "https://t.me/ostadionline"]
                    ]
                ];
            $title = $courses['data'][$i]['title'];
            $subtitle = $courses['data'][$i]['subtitle'];
            $thumb = $courses['data'][$i]['data']['thumbnail'];
            $thumb_url = $site . "/" . $thumb;
            $result = [
                'type' => 'article',
                'id' => $qid,
                'input_message_content' => [
                    'parse_mode' => 'Markdown',
                    'message_text' =>
                        "*" . $title . "*

_" . $subtitle . "_

☎ 044-33388175
مشاوره
[@Support](tg://user?id=" . $bot->developer . ")" . " [🖥️](" . $thumb_url . ")",
                ],
                'title' => $title,
                'description' => $subtitle,
                'thumb_url' => $thumb_url,
                'reply_markup' => ['inline_keyboard' => $IK_Course],
                'url' => $course_link,
                'hide_url' => false,
            ];
            array_push($q_result, $result);
            $qid++;
            continue;
        }
        /*
        for ($i = 0; $i < count($courses['data']); $i++) {
            for ($j = 0; $j < count($schools['data']); $j++) {
                if ($courses['data'][$i]['school_id'] == $schools['data'][$j]['id']) {
                    $course_link = "https://ostadi.online/" . $schools['data'][$j]['slug'] . "/courses/" . $courses['data'][$i]['id'];
                    $IK_Course =
                        [
                            [
                                ['text' => "لینک دوره", "url" => $course_link],
                            ],
                            [
                                ['text' => "اطلاعات بیشتر", "url" => "https://ostadi.online/"],
                            ],
                            [
                                ['text' => "مشاهده در کانال", "url" => $course_link],
                            ],
                            [
                                ['text' => "ارسال به دوستان", "switch_inline_query" => ""]
                            ]
                        ];
                    $title = $courses['data'][$i]['title'];
                    $subtitle = $courses['data'][$i]['subtitle'];
                    $thumb_url = "https://ostadi.online" . $courses['data'][$i]['data']['thumbnail'];

                    $result = [
                        'type' => 'article',
                        'id' => $qid,
                        'input_message_content' => [
                            'parse_mode' => 'Markdown',
                            'message_text' => "[📚](" . $thumb_url . ")",
                        ],
                        'title' => $title,
                        'description' => $subtitle,
                        'thumb_url' => $thumb_url,
                        'reply_markup' => ['inline_keyboard' => $IK_Course],
                        'url' => $course_link,
                    ];
                    $result = [
                        'type' => 'photo',
                        'id' => $qid,
                        'photo_url' => $thumb_url,
                        'thumb_url' => $thumb_url,
                        'title' => "شسییسشیشی",
                        'description' => "یسشیشسیسسش",
                        'caption' => $subtitle,
                        'reply_markup' => [
                            'inline_keyboard' => $IK_Course,

                        ],
                    ];
                    array_push($q_result, $result);
                    $qid++;
                    continue;
                }
            }
        }
        */
        $r = $bot->AnswerInlineQuery($q_id, $q_result);
        $bot->VardumpToString(DEVELOPER_ID, $r);
    }
    /*
    if ($query == "1") {
        $bot = new TwitterBot();
        $greet = $bot->Greeting();
        $q_result =
            [
                [
                    'type' => 'article',
                    'id' => "1",
                    'input_message_content' => [
                        'parse_mode' => 'Markdown',
                        'message_text' => "[📚](http://lifedev.ir/images/uut/books.jpg)"],
                    'title' => 'خرید و فروش کتب دست دوم',
                    'thumb_url' => "http://lifedev.ir/images/uut/books_t.jpg",
                    'reply_markup' => ['inline_keyboard' => $IK_TablighBook],
                ],
                [
                    'type' => 'article',
                    'id' => "2",
                    'input_message_content' => [
                        'parse_mode' => 'Markdown',
                        'message_text' => $greet . "[👌](http://lifedev.ir/images/uut/callofuut.jpg)"],
                    'title' => 'معرفی توییتر ندای uut به دوستان',
                    'thumb_url' => "http://lifedev.ir/images/uut/callofuut.jpg",
                    'reply_markup' => ['inline_keyboard' => $IK_Tabligh],
                ],
                [
                    'type' => 'article',
                    'id' => "3",
                    'input_message_content' => [
                        'parse_mode' => 'Markdown',
                        'message_text' => $greet . "[🍳👇](http://lifedev.ir/images/uut/rf.jpg)"],
                    'title' => 'یادآوری رزرو غذا🍳',
                    'description' => 'ارسال به دوستان',
                    'thumb_url' => "http://lifedev.ir/images/uut/rf.jpg",
                    'reply_markup' => ['inline_keyboard' => $IK_TablighRF],

                ],
            ];
        $r = $bot->AnswerInlineQuery($q_id, $q_result);
        $bot->VardumpToString(DEVELOPER_ID, $r);
    }
    */
}