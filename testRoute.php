<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 07/12/15
 * Time: 14:43
 */
require "./vendor/autoload.php";

$route = \Zend\Mvc\Router\Http\Segment::factory(
    array(
        'route'=>'/:chemin',
        'constraints'=>array(
            'chemin'=>'[a-zA-Z]+',
        ))

    );
$req = new \Zend\Http\Request();
$req->setUri('http://monsite/st9');

$match = $route->match($req);
if ($match !== null) {
    echo "ok\n";
} else {
    echo "ressource non connue \n";
}