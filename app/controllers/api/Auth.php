<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('api/Auth_model', 'auth');
      
   }
   
   function index_post()
   {
      $result = $this->auth->post($this->post());

      $this->response($result);
   }

   function index_get()
   {
      $result = $this->auth->get();

      $this->response($result);
   }

}

/* End of file Auth.php */
