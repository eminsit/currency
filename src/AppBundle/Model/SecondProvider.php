<?php

namespace AppBundle\Model;


class SecondProvider extends Provider
{
    private $url;
    private $response;
    private $usd;
    private $eur;
    private $gbp;

    CONST GBP = 'GBPTRY';
    CONST USD = 'USDTRY';
    CONST EUR = 'EURTRY';

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
    public function getUsd()
    {
        return $this->usd;
    }

    /**
     * @return mixed
     */
    public function getEur()
    {
        return $this->eur;
    }

    /**
     * @return mixed
     */
    public function getGbp()
    {
        return $this->gbp;
    }


    public function setCurrencyValues()
    {
        $result = $this->response['result'];
        foreach ($result as $currency) {
            switch ($currency['symbol']) {
                case SecondProvider::USD:
                    $this->usd = (float)$currency['amount'];
                    break;
                case SecondProvider::EUR:
                    $this->eur = (float)$currency['amount'];
                    break;
                case SecondProvider::GBP:
                    $this->gbp = (float)$currency['amount'];
                    break;
            }
        }
    }
}