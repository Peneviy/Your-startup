<?php
    add_action( 'rest_api_init', function () {
        register_rest_route( 'methods', '/createOrder', array(
            'methods' => 'POST',
            'callback' => 'createOrder',
            'permission_callback' => '__return_true',
        ) );
    } );

    function createOrder(WP_REST_Request $request) {
        try {
                
            $params = $request->get_params();
            if (empty($params['phoneEmail']) || empty($params['name'])) {
                echo json_encode( [
                    'success' => false,
                    'message' => 'Не заполнены обязательные данные.',
                    'request' => $params
                ]);
                die();
            }
                
            $data = [
                'success' => true
            ];

            $title = 'Заявка от ' . date('d.m.Y H:i:s');
            
            $result = [
                'success'  => true,
            ];
            
            $txt = '<b>' . $title . '</b>' . "\n";
            $txt .= '<b> Имя: </b>' . $params['name'] . "\n";
            $txt .= '<b> Телефон / почта: </b>' . $params['phoneEmail'] . "\n";
            if (!empty($params['price'])) {
                $txt .= '<b> Цена: </b>' . $params['price'] . "\n";
            }
            if (!empty($params['answer'])) {
                $txt .= '<b> Ответы: </b>' . $params['answer'] . "\n";
            }
            if (!empty($params['service'])) {
                $txt .= '<b> Услуга: </b>' . $params['service'] . "\n";
            }
        
            $botToken = '1574980727:AAFB2W29uFAQ5RNHjsanCzbFlg7V0dxNriU';
            $idGroup = -352468529;
        
            $url = "https://api.telegram.org/bot" . $botToken . "/sendMessage?chat_id=" . $idGroup . "&parse_mode=HTML";
            $url = $url . "&text=" . urlencode($txt);
            $ch = curl_init();
            $optArray = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true
            );

            curl_setopt_array($ch, $optArray);
            $message_result = curl_exec($ch);
            curl_close($ch);
            if ($_FILES) {
                for ($i=1; $i <= count($_FILES); $i++) { 
                    $arrayQuery = array(
                        'chat_id' => $idGroup,
                        'caption' => 'Приложение №' . $i . ' к заявке от ' . $params['phoneEmail'],
                        'document' => new CURLFile(realpath($_FILES['file'.$i]['tmp_name']), $_FILES['file'.$i]['type'], $_FILES['file'.$i]['name'])
                    );	
                    $ch = curl_init('https://api.telegram.org/bot'. $botToken .'/sendDocument');
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayQuery);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HEADER, false);
                    $res = curl_exec($ch);
                    curl_close($ch);
                } 
            }
        } 
        catch (Exception $e) {
            $result = [
                'success'  => false,
                'message' => $e->getMessage(),
            ];
        }

        return $result;

    }

?>