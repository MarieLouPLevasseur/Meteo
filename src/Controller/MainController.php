<?php

namespace App\Controller;

use App\Model\WeatherModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{



    /**
     *  Show homepage
     *
     * @Route("/", name="homepage", methods="GET")
     * @return Response
     */
    public function homepage() :Response
    {
       

        //récupération de la liste des villes et des données associés
        $data = WeatherModel::getWeatherData();

        dump($data);

        //transmission des données à la page
        return $this->render('main/homepage.html.twig',[
            'title' =>'Bienvenue sur la météo des villes !',
            'cities' => $data,

        ]);

    }


}