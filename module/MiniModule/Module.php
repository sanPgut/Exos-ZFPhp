<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/12/15
 * Time: 10:08
 */

namespace MiniModule;

use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\Http\Literal;
use Zend\View\Resolver\TemplateMapResolver;

/* Class OnBootstrap
 *
 class Module implements BootstrapListenerInterface
{
    public function onBootstrap(eventInterface $e)
    {
        //$e->getTarget() renvoit Zend\MVC\Appication
        $sm=$e->getTarget()->getServiceManager();
        $view=$sm->get('ViewManager');
        $resolv=new TemplateMapResolver(array(
            'error'=>__DIR__.'/view/error.phtml',
                'layout/layout'=>__DIR__.'/view/layout/layout.phtml',
        )
        );
        $view->getRenderer()->setResolver($resolv);
    }
}*/

class Module implements ConfigProviderInterface, BootstrapListenerInterface
{
    public function onBootstrap(eventInterface $e)
    {
        $application= $e->getTarget();
        $event = $application->getEventManager();
        $event->attach(MvcEvent::EVENT_DISPATCH_ERROR, function(MvcEvent $e){
           error_log( $e->getError() );
            error_log( $e->getControllerClass().' '.$e->getController());
            error_log('exception'.$e->getParam('exception')->getMessage());
            }
        );
        $sm = $application->getServiceManager();
        $router = $sm->get('Router');
        $router->addRoute('principale', Literal::factory(
            array(
                'route'  => '/',
                'defaults' => array(
                    //delcaration de la route
                    'controller' =>'index',
                    'action' => 'index',
                )
            )
        ));
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    public function getConfig()
    {
        return include __DIR__."/config/module.config.php";
    }

}