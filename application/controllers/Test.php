<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

   class Test extends CI_Controller {  
     
     public function __construct() {
       parent::__construct();
       // Call the model (it can be auto loaded if its name assigned in $autoload['model'] = array();)
       // After loading it it will be saved as $this->wasy
       $this->load->model('wasy');
     }
     
      public function index() { 
        
        var_dump($this->wasy->pai());
         $this->load->view('tests/index');
      } 
  
      public function hello() { 
         var_dump($this->wasy->pai());
         $this->load->database();
         
         $data = array( 
            'id' => '1', 
            'Name' => 'wasy' 
         ); 

        //$this->db->insert("stud", $data);

        $data = array( 
          'name' => 'wasy2222'
); 

      $this->db->set($data); 
      $this->db->where("id", '1'); 
      $this->db->update("stud", $data);

         
         $this->load->view('tests/hello');
      } 
   } 
