<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('siohelloworld_homepage', new Route('/', array(
    '_controller' => 'siohelloworldBundle:Default:index',
)));

$collection->add('siohelloworld_main', new Route('/accueil', array(
    '_controller' => 'siohelloworldBundle:Default:accueil',
)));

$collection->add('siohelloworld_inscription', new Route('/inscription', array(
    '_controller' => 'siohelloworldBundle:Default:inscription',
)));

$collection->add('siohelloworld_inscription_reussie', new Route('/inscription_reussie', array(
    '_controller' => 'siohelloworldBundle:Default:inscription_reussie',
)));

return $collection;
