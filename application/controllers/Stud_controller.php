<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Stud_controller extends CI_Controller {

   function __construct() { 
      parent::__construct(); 
      $this->load->helper('url'); 
      $this->load->database(); 
   } 

   public function index() { 
      $query = $this->db->get("stud"); 
      $data['records'] = $query->result(); 
      $data['c_template'] = 'stud/view';
      $this->load->helper('url'); 
      //$this->load->view('header'); 
      $this->load->view('base',$data); 
      //$this->load->view('footer'); 
   } 

   public function add_student_view() { 
      $this->load->helper('form'); 
      $data['c_template'] = 'stud/add';
      $this->load->view('base', $data); 
   } 

   public function add_student() { 
      $this->load->model('Stud_Model');

      $data = array( 
         'roll_no' => $this->input->post('roll_no'), 
         'name' => $this->input->post('name') 
      ); 
      $this->Stud_Model->insert($data); 

      $query = $this->db->get("stud"); 
      $data['records'] = $query->result(); 
      $data['c_template'] = 'stud/view';
      $this->load->view('base',$data); 
   } 

   public function update_student_view() { 
      $this->load->helper('form'); 
      $roll_no = $this->uri->segment('3'); 
      $query = $this->db->get_where("stud",array("roll_no"=>$roll_no));
      $data['records'] = $query->result(); 
      $data['old_roll_no'] = $roll_no; 
      $data['c_template'] = 'stud/edit';
      $this->load->view('base',$data); 
   } 

   public function update_student(){ 
      $this->load->model('Stud_Model');

      $data = array( 
         'roll_no' => $this->input->post('roll_no'), 
         'name' => $this->input->post('name') 
      ); 

      $old_roll_no = $this->input->post('old_roll_no'); 
      $this->Stud_Model->update($data,$old_roll_no); 

      $query = $this->db->get("stud"); 
      $data['records'] = $query->result(); 
      $data['c_template'] = 'stud/view';
      $this->load->view('base',$data); 
   } 

   public function delete_student() { 
      $this->load->model('Stud_Model'); 
      $roll_no = $this->uri->segment('3'); 
      $this->Stud_Model->delete($roll_no); 

      $query = $this->db->get("stud"); 
      $data['records'] = $query->result(); 
      $data['c_template'] = 'stud/view';
      $this->load->view('base',$data); 
   } 
} 
