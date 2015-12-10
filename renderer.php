<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 07/12/15
 * Time: 17:01
 */
require './vendor/autoload.php';

$vm = new \Zend\View\Model\ViewModel(array('nom' => 'tintin') );

$vm->setVariables( array(

'title' => 'tintin',

'description' => 'bande dessinée',

'link' => 'http://manews.fr')

);

$vm->setTemplate( 'liste' );

$resol = new Zend\View\Resolver\TemplateMapResolver(array(

'liste' => __DIR__ . '/liste.phtml',

)

);

$rendu = new \Zend\View\Renderer\PhpRenderer();

$rendu->setResolver($resol);

echo $rendu->render( $vm );

$rendujson = new \Zend\View\Renderer\JsonRenderer();

$rendujson->setResolver($resol);

echo $rendujson->render( $vm );

$rendufeed = new \Zend\View\Renderer\FeedRenderer();

echo $rendufeed->render( $vm );