<?php
/**
 * Created by PhpStorm.
 * User: eminsit
 * Date: 29.06.2018
 * Time: 09:53
 */

namespace AppBundle\Model;


abstract class Provider
{
    abstract protected function setUrl(string $url);
    abstract protected function getUrl();
    abstract public function setCurrencyValues();

    public function getApiResponse($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json')); // Assuming you're requesting JSON
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        return json_decode($response, true);
    }
}