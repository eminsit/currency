<?php
namespace AppBundle\Adapter;

use AppBundle\Model\FirstProvider;
use AppBundle\Model\ProviderInterface;

class FirstProviderAdapter implements ProviderInterface
{
    private $firstProvider;

    /**
     * FirstProviderAdapter constructor.
     * @param FirstProvider $firstProvider
     */
    public function __construct(FirstProvider $firstProvider)
    {
        $this->firstProvider = $firstProvider;
    }

    function getUsd()
    {
        return $this->firstProvider->getDolar();
    }

    function getEur()
    {
        return $this->firstProvider->getAvro();
    }

    function getGbp()
    {
        return $this->firstProvider->getSterlin();
    }
}