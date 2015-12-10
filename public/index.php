<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/12/15
 * Time: 09:44
 */
chdir(dirname(__DIR__));
require __DIR__.'/../vendor/autoload.php';
//require __DIR__ . '/../module/MiniModule/src/MiniModule/Controller/IndexController.php';

//run the application!
Zend\Mvc\Application::init(require 'config/application.config.php')->run();
