<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MountainController extends AbstractController
{



    /**
     *  Show mountainpage
     *
     * @Route("/mountain", name="mountainpage", methods="GET")
     * @return Response
     */
    public function mountainpage() :Response
    {
       
        return $this->render('mountains/mountainpage.html.twig',[
            'title' =>'A la montagne',

        ]);

    }


}