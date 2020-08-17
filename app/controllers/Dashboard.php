<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

   
   public function __construct()
   {
      parent::__construct();
      //Do your magic here
   }
   
   public function index_get()
   {
      $this->view('dashboard.index');
   }

}

/* End of file Dashboard.php */
