<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provider
 *
 * @ORM\Table(name="provider")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProviderRepository")
 */
class Provider
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="root_parameter", type="string", length=100, nullable=true)
     */
    private $rootParameter;

    /**
     * @var array
     *
     * @ORM\Column(name="currency_reference", type="json")
     */
    private $currencyReference;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Provider
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set url.
     *
     * @param string $url
     *
     * @return Provider
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set rootParameter.
     *
     * @param string|null $rootParameter
     *
     * @return Provider
     */
    public function setRootParameter($rootParameter = null)
    {
        $this->rootParameter = $rootParameter;

        return $this;
    }

    /**
     * Get rootParameter.
     *
     * @return string|null
     */
    public function getRootParameter()
    {
        return $this->rootParameter;
    }

    /**
     * Set currencyReference.
     *
     * @param array $currencyReference
     *
     * @return Provider
     */
    public function setCurrencyReference($currencyReference)
    {
        $this->currencyReference = $currencyReference;

        return $this;
    }

    /**
     * Get currencyReference.
     *
     * @return array
     */
    public function getCurrencyReference()
    {
        return $this->currencyReference;
    }
}
