<?php

namespace Ticket\Controller;

use Zend\Mvc\Controller\AbstractActionController,
Zend\View\Model\ViewModel,
Ticket\Model\TicketTable;

class TicketController extends AbstractActionController
{

    protected $ticketTable;

    public function indexAction()
    {
        return new ViewModel(array(
            'tickets' => $this->getTicketTable()->fetchAll(),
        ));
    }
    
    public function addAction()
    {
    }
    
    public function editAction()
    {
    }
    
    public function deleteAction()
    {
    }
    
    public function getTicketTable()
    {
        if (!$this->ticketTable) {
            $sm = $this->getServiceLocator();
            $this->ticketTable = $sm->get('Ticket\Model\TicketTable');
        }
        return $this->ticketTable;
    }
}