<?php

namespace Ticket\Model;

 use Zend\Db\TableGateway\TableGateway;

 class TicketTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getTicket($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveTicket(Ticket $ticket)
     {
         $data = array(
             'user_id' => $ticket->userId,
             'title'  => $ticket->title,
         );

         $id = (int) $ticket->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getTicket($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Album id does not exist');
             }
         }
     }

     public function deleteTicket($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }