<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

   
   public function __construct()
   {
      parent::__construct();
      $authorization = $this->input->request_headers()[env("app_auth")];
      
   }

}

/* End of file MY_Model.php */
