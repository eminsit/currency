<?php

namespace AppBundle\Command;

use AppBundle\Adapter\FirstProviderAdapter;
use AppBundle\Adapter\SecondProviderAdapter;
use AppBundle\Entity\Currency;
use AppBundle\Entity\Provider;
use AppBundle\Model\FirstProvider;
use AppBundle\Model\SecondProvider;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class FetchCurrencyCommand extends ContainerAwareCommand
{
    CONST FIRST_PROVIDER = 'p1';
    CONST SECOND_PROVIDER = 'p2';

    private $em;

    protected function configure()
    {
        $this
            ->setName('fetch-currency')
            ->setDescription('Fetch Currencies from selected providers.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->em = $this->getContainer()->get('doctrine')->getManager();
        $repo2 = $this->em->getRepository('AppBundle:Provider');
        $providers = $repo2->findAll();


        $usdList = [];
        $eurList = [];
        $gbpList = [];

        foreach ($providers as $provider) {
            /** @var Provider $provider */
            switch ($provider->getName()) {
                case FetchCurrencyCommand::FIRST_PROVIDER:
                    $firstProvider = new FirstProvider($provider->getUrl());
                    $firstProvider->getResponse();
                    $firstProvider->setCurrencyValues();

                    $firstProviderAdapter = new FirstProviderAdapter($firstProvider);
                    $usdList[] = $firstProviderAdapter->getUsd();
                    $eurList[] = $firstProviderAdapter->getEur();
                    $gbpList[] = $firstProviderAdapter->getGbp();
                    break;

                case FetchCurrencyCommand::SECOND_PROVIDER:
                    $secondProvider = new SecondProvider($provider->getUrl());
                    $secondProvider->getResponse();
                    $secondProvider->setCurrencyValues();

                    $secondProviderAdapter = new SecondProviderAdapter($secondProvider);
                    $usdList[] = $secondProviderAdapter->getUsd();
                    $eurList[] = $secondProviderAdapter->getEur();
                    $gbpList[] = $secondProviderAdapter->getGbp();
                    break;

            }
        }

        sort($usdList);
        sort($eurList);
        sort($gbpList);
        $result = [
            'usd' => ['value' => $usdList[0]],
            'eur' => ['value' => $eurList[0]],
            'gbp' => ['value' => $gbpList[0]]
        ];

        $this->addCurrency($result);
        $output->writeln('Command result.');
    }

    public function addCurrency(array $result)
    {
        $currenyEntity = new Currency();
        $currenyEntity->setData(json_encode($result));
        $repo2 = $this->em->getRepository('AppBundle:Currency');
        $currency = $repo2->addOne($currenyEntity);
    }

}
