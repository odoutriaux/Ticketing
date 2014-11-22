<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Ticket\Controller\Ticket' => 'Ticket\Controller\TicketController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'ticket' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/ticket[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Ticket\Controller\Ticket',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);