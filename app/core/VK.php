<?php

namespace App\Core;

class VK
{
    protected $t;

    public function __construct()
    {
//        $client_id = '5794245'; // ID приложения
//        $client_secret = 'd5rxfCzfmRwFg8dSgQdO'; // Защищённый ключ
//        $redirect_uri = 'blank.html'; // Адрес сайта
//
//        $url = 'http://oauth.vk.com/authorize';
//
//        $params = array(
//            'client_id' => $client_id,
//            'redirect_uri' => $redirect_uri,
//            'response_type' => 'token',
//            'display' => 'popup',
//            'scope' => 'notify,friends,photos,offline,wall',
//            'v' => 5.60
//        );
        $this->t = file_get_contents(storage_path() . '/debugbar/1');
    }

    public function getUsers()
    {
        $method = 'users.search';
        $params = [
            'sex' => '1',
            'city' => '1',
            'count' => 200,
            'v' => 5.60,
            'access_token' => $this->t,
        ];
        $response = $this->quiery($method, $params);
        return $response;
    }

    public function getPerson($id)
    {
        $method = 'users.get';
        $params = [
            'user_ids' => $id,
            'fields' => ['photo_400_orig', 'education'],
            'v' => 5.60,
            'access_token' => $this->t,
        ];

        while (!isset($response['photo_400_orig'])) {
            $response = $this->quiery($method, $params);
            if (isset($response['response'])) {
                $response = $response['response'][0];
            }
            //sleep(0.3);
        }
        return $response;
    }

    private function quiery($method, $params = [])
    {
        return json_decode(file_get_contents("https://api.vk.com/method/" . $method . '?' . urldecode(http_build_query($params))), true);
    }
}