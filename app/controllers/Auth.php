<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

   
   public function __construct()
   {
      parent::__construct();
      //Do your magic here
   }

   public function index_get()
   {
      $this->view("auth");
   }
   
   public function verify_get($token)
   {
      
      $this->session->set_userdata(array(
         'token' => $token
      ));
      
      header('location: '.base_url("dashboard.html"));
   }

   public function logout_get()
   {
      $this->session->sess_destroy();

      header('location: '.base_url());
   }

}

/* End of file Auth.php */
