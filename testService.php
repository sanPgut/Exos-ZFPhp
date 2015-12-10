<?php
//namespace Upjv\LicPro;

require "./vendor/autoload.php";

class LicencePro {
    static $NbrInstance = 0;

    function __construct()
    {
        self::$NbrInstance++;
    }

    function __destruct()
    {
        self::$NbrInstance--;
    }

    static function getNbrInstance() {
        return self ::$NbrInstance;
    }
}

$sm = new \Zend\ServiceManager\ServiceManager();
$smc = new Zend\ServiceManager\Config(include './conf.php');
$smc->configureServiceManager($sm);

$obj = $sm->get('promo');
echo LicencePro::getNbrInstance()."\n";
$obj1 = $sm->get('promo');
echo LicencePro::getNbrInstance()."\n";