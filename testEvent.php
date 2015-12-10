<?php
require "./vendor/autoload.php";

$myEventManager = new \Zend\EventManager\EventManager();
//c'est le framework qui gere:
$listener = function ($e) {
    $p = $e->getParams();
	echo "bonjour $p[0]\n";
};
$autre = function($e) {
	echo "bye\n";
};
$myEventManager->attach('lundi',$listener,1); // c'est nous qui gerons ces variables
$myEventManager->attach('lundi',$autre,2); //c'est nous qui gerons ces variables

$myEventManager->trigger('lundi', null, array('nous sommes Lundi')); //c'est le framework qui gere