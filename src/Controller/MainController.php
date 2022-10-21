<?php

namespace App\Controller;

use App\Model\WeatherModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{




    
/*********************************
 ****** affichage des vues********
 *********************************/
    /**
     *  Show homepage
     *
     * @Route("/", name="homepage", methods="GET")
     * @return Response
     */
    public function homepage(Request $request) :Response
    {
       
       
        //récupération de la liste des villes et des données associés
        $allcities = WeatherModel::getWeatherData();
           
        //transmission des données à la page
        return $this->render('main/homepage.html.twig',[
            'title'       => 'Bienvenue sur la météo des villes !',
            'cities'      => $allcities,
        ]);

    }
    

    /**
     *  Add city to widget
     *
     * @Route("/city/add/{id}", name="cityAdd", methods="GET", requirements={"id"="\d+"})
     * @return Response
     */
    public function cityAdd(int $id, Request $request) :Response
    {     

        //récupération de la ville choisie et des données associés
        $theCity = WeatherModel::getWeatherByCityIndex($id);

        //récupération de la session
        $session = $request->getSession();

        // ? mise en place de la valeur en session
        // on crée la variable de session en créant un tableau vide 
            // cela permettra de remettre à 0 le tableau à chaque click
            // car on ne veut qu'une sélection à la fois pour l'affichage
        $choosenCity = $session->set('choosenCity', $theCity );
        // on place la valeur et son identifiant
        // $choosenCity['key']=$theCity;
        // on incorpore la valeur en session
        // $session->set('choosenCity', $choosenCity);       


        //Retour à la homepage
        return $this->redirectToRoute('homepage');
    }



    /**
     *  Remove city choice to widget
     *
     * @Route("/city/remove", name="cityRemove", methods="GET")
     * @return Response
     */
    public function cityRemove(Request $request) :Response
    {     

        //récupération de la session
        $session = $request->getSession();

        // ? effacement valeur mise en place en session
        $session->clear('choosenCity', [] );

        //Retour à la homepage
        return $this->redirectToRoute('homepage');
    }
}