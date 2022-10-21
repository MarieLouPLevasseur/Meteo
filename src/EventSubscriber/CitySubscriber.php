<?php

namespace App\EventSubscriber;

use Twig\Environment;
use App\Model\WeatherModel;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class CartSubscriber
 * @package App\EventSubscriber
 *
 *  Représente le Listener écoutant l'événement 'kernel.controller'.
 *
 */
class CitySubscriber implements EventSubscriberInterface {
 
 
    private Environment $environment;
      
     
    public function __construct(Environment $environment) {
        $this->environment = $environment;
    }
 
    /**
     * Injection de la variable globale choosenCity à Twig
     * Il s'agit de la variable aléatoire d'une ville si session vide
     *
     * @param ControllerEvent $event
     * @param Request $request
     */
    public function onKernelController(ControllerEvent $event) {

         //récupération de la liste des villes et des données associées
         $allcities = WeatherModel::getWeatherData();

       
             // on en tire une au hasard
             $randomIndexCity = array_rand($allcities, 1);
             $randomCity[]    = $allcities[$randomIndexCity];            
 
         // comme les données sont en tableau, mais que nous avons besoin d'un objet:
 
         foreach ($randomCity as $currentCity){
 
         }
  
        // Injection de la variable currentCity dans Twig
        $this->environment->addGlobal('randomCity', $currentCity);
    }
 
    /**
     *
     * @return array
     */
    public static function getSubscribedEvents(): array {
        return [
            'kernel.controller' => 'onKernelController',
        ];
    }
}