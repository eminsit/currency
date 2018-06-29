<?php
namespace AppBundle\Adapter;

use AppBundle\Model\FirstProvider;
use AppBundle\Model\ProviderInterface;
use AppBundle\Model\SecondProvider;

class SecondProviderAdapter implements ProviderInterface
{
    private $secondProvider;

    /**
     * FirstProviderAdapter constructor.
     * @param SecondProvider $secondProvider
     */
    public function __construct(SecondProvider $secondProvider)
    {
        $this->secondProvider = $secondProvider;
    }

    function getUsd()
    {
        return $this->secondProvider->getUsd();
    }

    function getEur()
    {
        return $this->secondProvider->getEur();
    }

    function getGbp()
    {
        return $this->secondProvider->getGbp();
    }
}