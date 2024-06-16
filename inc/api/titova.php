<?php
add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/titova_mail', array(
        'methods' => 'POST',
        'callback' => 'titovaMail',
        'permission_callback' => '__return_true',
    ) );
} );

function titovaMail( WP_REST_Request $request ) {
    try {
  
        $params = $request->get_params();
        if (empty($params['Email'])) {
            return false;
        }

        $subject   = 'Спасибо за регистрацию на курсе "Переговорщик"';
        $mail_from = 'info@mediatortitova.ru';
        $mail_to   = $params['Email'];
        $headers   = array(
            'Content-Type: text/html; charset=UTF-8',
            'From: Медиатор Титова <info@mediatortitova.ru>',
        );

        $body = 'Привет! На связи Анастасия Титова, автор и преподаватель курса<br>
        «Переговорщик. Научись решать словом».<br>
        <br>
        Благодарю Вас за доверие к моему образовательному продукту! <br>
        <br>
        Организационная информация о курсе, чтобы вы понимали, как<br>
        будет происходить наше взаимодействие дальше:<br>
        <br>
         -   Старт курса 5 мая <br>
         -   Ссылка с доступом к платформе и в чаты придет 1 мая<br>
         -   Длительность курса 8 недель<br>
         -   Курс будет проходить на платформе GetCourse. На данной<br>
         платформе согласно расписанию уроки будут выходить 2 раза в<br>
         неделю <br>
         -   После завершения курса доступ к программе<br>
         предоставляется на 3 месяца<br>
         <br>
        <b>Проверяйте почту, Вам уже должен прийти доступ к личному<br>
        кабинету GetCourse.</b><br> 
        <br>
        Студенты всех тарифов будут распределены по группам, и к<br>
        началу потока Вас добавят отдельные Telegram-чаты по<br>
        тарифам.<br>
        <br>
        Ссылка на мой Telegram-канал: <br>
        https://t.me/mediator_titova<br>
        <br>
        Если у Вас возникла сложность или организационный вопрос, то<br>
        пишите напрямую в поддержку.<br>
        <br>
        Просим Вас не писать в личные сообщения преподавателя<br>
        вопросы по курсу, поскольку это не является продуктивным<br>
        способом получить ответ (есть вероятность, что сообщение<br>
        затеряется). Пишите всегда по назначению в поддержку!<br>
        <br>
        Ссылка на отдел заботы в Telegram:<br>
        https://t.me/mediator_titova_help<br>
        <br>
        Почта отдела заботы:<br>
        mediator-titova@mail.ru<br>
        <br>
        Специально для вашего удобства мы сделали 2 варианта<br>
        поддержки на выбор в зависимости от удобного для вас способа<br>
        связи!<br>
        <br>
        5 мая у Вас откроется доступ к образовательной платформе.<br>
        До этого дня доступ будет закрыт.<br>
        <br>
        Благодарю за доверие! На связи.';
        
        $result = wp_mail( $mail_to, $subject, $body, $headers );

        return $result;
    } catch (\Throwable $th) {
        echo $th;
    }
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'methods', '/mail_exports', array(
        'methods' => 'POST',
        'callback' => 'mailExports',
        'permission_callback' => '__return_true',
    ) );
} );

function mailExports( WP_REST_Request $request ) {
    try {
  
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://mediatortitova.getcourse.ru/pl/api/account/users?status=active',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('action' => 'users','key' => 'PuUTSNLyw0s1L4zxNPtmNutaCP6jtbIFkxpv1jG48fk0tp6cgZSsttMpFrmBFfAgLv5YHJe7awLLWHj6KjHiflLo85CMZL5lrp5tIjTZYCY3Vi2CURPbdykUgFIYUAtA','status' => 'active'),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $export_id = json_decode($response)->info->export_id;

        sleep(5);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://mediatortitova.getcourse.ru/pl/api/account/exports/' . $export_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('action' => 'users','key' => 'PuUTSNLyw0s1L4zxNPtmNutaCP6jtbIFkxpv1jG48fk0tp6cgZSsttMpFrmBFfAgLv5YHJe7awLLWHj6KjHiflLo85CMZL5lrp5tIjTZYCY3Vi2CURPbdykUgFIYUAtA','status' => 'active'),
        ));

        $users_response = curl_exec($curl);

        curl_close($curl);
        
        $users = json_decode($users_response)->info->items;

        foreach ($users as $fields) {
            $email = $fields[1];
            if ($email != 'mediator-titova@mail.ru') {
                //mail_code
            }
        } 

        return;
    } catch (\Throwable $th) {
        echo $th;
    }
}