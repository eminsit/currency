<?php
namespace AppBundle\Model;

interface ProviderInterface {
    function getUsd();
    function getEur();
    function getGbp();
}