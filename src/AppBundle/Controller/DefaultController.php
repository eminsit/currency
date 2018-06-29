<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo2 = $em->getRepository('AppBundle:Currency');
        $currency = $repo2->findLastOne();

        return $this->render('default/index.html.twig', [
            'data' => json_decode($currency->getData(), true)
        ]);
    }
}
