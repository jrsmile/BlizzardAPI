<?php


class TestResponse
{
    public $url = null;
    public function getStatusCode(){
        return 200;
    }

    public function getBody(){
        return json_encode([
            'url' => $this->url,
        ]);
    }
}