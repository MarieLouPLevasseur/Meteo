<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BeachController extends AbstractController
{

    /**
     *  Show beachpage
     *
     * @Route("/beach", name="beachpage", methods="GET")
     * @return Response
     */
    public function beachpage() :Response
    {
       
        return $this->render('beaches/beachpage.html.twig',[
            'title' =>'La météo des montagnes',

        ]);

    }


}