<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/12/15
 * Time: 15:54
 */

namespace MiniModule\Form;


class AuthentificationFormFactory
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config_authentification_form');
        $factory = new Factory();
        $form = $factory->createForm( $config );
        return $form;
    }
}