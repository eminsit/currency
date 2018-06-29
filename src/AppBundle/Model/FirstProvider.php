<?php

namespace AppBundle\Model;


class FirstProvider extends Provider
{
    private $url;
    private $response;
    private $dolar;
    private $avro;
    private $sterlin;

    CONST STERLIN = 'İNGİLİZ STERLİNİ';
    CONST DOLAR = 'DOLAR';
    CONST AVRO = 'AVRO';

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * @param string $url
     */
    protected function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    protected function getUrl() : string
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        $this->response = $this->getApiResponse($this->url);

        return $this->response;
    }

    /**
     * @return mixed
     */
    public function getDolar()
    {
        return $this->dolar;
    }

    /**
     * @return mixed
     */
    public function getAvro()
    {
        return $this->avro;
    }

    /**
     * @return mixed
     */
    public function getSterlin()
    {
        return $this->sterlin;
    }


    public function setCurrencyValues()
    {
        $result = $this->response;
        foreach ($result as $currency) {
            switch ($currency['kod']) {
                case FirstProvider::DOLAR:
                    $this->dolar = (float)$currency['oran'];
                    break;
                case FirstProvider::AVRO:
                    $this->avro = (float)$currency['oran'];
                    break;
                case FirstProvider::STERLIN:
                    $this->sterlin = (float)$currency['oran'];
                    break;
            }
        }
    }
}