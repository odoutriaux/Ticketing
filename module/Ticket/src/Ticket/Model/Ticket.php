<?php

namespace Ticket\Model;

 class Ticket
 {
     public $id;
     public $userId;
     public $title;

     public function exchangeArray($data)
     {
         $this->id     = (!empty($data['id'])) ? $data['id'] : null;
         $this->userId = (!empty($data['user_id'])) ? $data['user_id'] : null;
         $this->title  = (!empty($data['title'])) ? $data['title'] : null;
     }
 }