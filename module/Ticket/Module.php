<?php

namespace Ticket;
use Ticket\Model\Ticket;
use Ticket\Model\TicketTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
     {
         return array(
             'factories' => array(
                 'Ticket\Model\TicketTable' =>  function($sm) {
                     $tableGateway = $sm->get('TicketTableGateway');
                     $table = new TicketTable($tableGateway);
                     return $table;
                 },
                 'TicketTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Ticket());
                     return new TableGateway('ticket', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
     }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}