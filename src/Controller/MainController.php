<?php

namespace App\Controller;

use App\Model\WeatherModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{



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

        //récupération de la ville choisie pour la session
        // $session     = $request->getSession();
        // $choosenCity = $session->get('choosenCity', [] );
        // dump($choosenCity == []);
        // dump($choosenCity);

        // si session vide (pas de ville choisie) :
        // if ($choosenCity==[]) {
            // on en tire une au hasard
            $randomIndexCity = array_rand($allcities, 1);
            $choosenCity     = $allcities[$randomIndexCity];
            
        // }
        // dump($choosenCity);
        // si la session contient une donnée
            // on la transmet


        //transmission des données à la page
        return $this->render('main/homepage.html.twig',[
            'title'       => 'Bienvenue sur la météo des villes !',
            'cities'      => $allcities,
            'choosenCity' => $choosenCity,

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

        // on l'intégre dans la session
        $choosenCity = $session->get('choosenCity', [$theCity] );
        // $choosenCity[$id]=$theCity;

        $session->set('choosenCity', $choosenCity);

        
dump($theCity);
dump($choosenCity);
dd($session);
// ! lors de l'affectation met l'index à 0 alors qu'il devrait prendre l'id de la ville
// TODO il faut trouver le moyen d'affecter l'index du tableau d'origine comme index de la nouvelle entrée et non le 0 par défaut
// die;
        // dump($id);
        // dd($session);

        //Retour à la homepage
        return $this->redirectToRoute('homepage');
    }
}