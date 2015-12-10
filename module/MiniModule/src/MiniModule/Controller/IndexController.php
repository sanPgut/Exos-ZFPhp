<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/12/15
 * Time: 12:23
 */
namespace MiniModule\Controller;

use Zend\Form\Factory;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return array(
            'nom' => 'Tintin'
        );
    }

    public function gmapsAction()
    {
        $markers = array(
            'Mozzat Web Team' => '17.516684,79.961589',
            'Home Town' => '16.916684,80.683594'
        );  //markers location with latitude and longitude

        $config = array(
            'sensor' => 'true',         //true or false
            'div_id' => 'map',          //div id of the google map
            'div_class' => 'grid_6',    //div class of the google map
            'zoom' => 5,                //zoom level
            'width' => "600px",         //width of the div
            'height' => "300px",        //height of the div
            'lat' => 16.916684,         //lattitude
            'lon' => 80.683594,         //longitude
            'animation' => 'none',      //animation of the marker
            'markers' => $markers       //loading the array of markers
        );

        $map = $this->getServiceLocator()->get('GMaps\Service\GoogleMap'); //getting the google map object using service manager
        $map->initialize($config);                                         //loading the config
        $html = $map->generate();                                          //genrating the html map content
        return new ViewModel(array('map_html' => $html));
    }

    //passing it to the view

    public function formAction()
    {

        $configForm = array(
            'elements' => array(
                // la saisie du login (type text)
                array(
                    'spec' => array(
                        'type' => 'Zend\Form\Element\Text',
                        'name' => 'log',
                        'attributes' => array(
                            'size' => '20',
                        ),
                        'options' => array(
                            'label' => 'Login : ',
                        ),
                    ),
                ),
                // le boutton de validation
                array(
                    'spec' => array(
                        'type' => 'Zend\Form\Element\Submit',
                        'name' => 'submit',
                        'attributes' => array(
                            'value' => 'Suite',
                        ),
                    ),
                ),
            ),
        );

        $factory = new Factory();
        $form = $factory->createForm($configForm);
        $services = $this->getServiceLocator();
        $form = $services->get('MiniModule\Form\Authentification');
        return array('form' => $form);
    }
}