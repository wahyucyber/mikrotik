<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "third_party/blade/BladeOne.php";
require_once APPPATH . "third_party/RestController.php";
require_once APPPATH . "third_party/Format.php";

use chriskacerguis\RestServer\RestController;
use chriskacerguis\RestServer\Format;

use eftec\bladeone\BladeOne;

class MY_Controller extends RestController {

   public function __construct()
   {
      parent::__construct();
      $uri = $this->uri->segment(1);
      $class = $this->uri->segment(2);
      
      if($uri == "api" && $class != "auth") {
         $authorization = $this->input->request_headers()[env("app_auth")];
         
         if (AUTHORIZATION::validateTimestamp($authorization) == false) {
            $this->response(array(
               'status' => false,
               'error' => "unauthorization."
            ));
         }
      }
   }

   protected function view($view, $data = [])
   {
      $views = APPPATH . 'views';
      $cache = APPPATH . 'cache';
      $blade = new BladeOne($views,$cache,BladeOne::MODE_DEBUG); // MODE_DEBUG allows to pinpoint troubles.
      echo $blade->run($view,$data); // it calls /views/hello.blade.php
   }

}

/* End of file MY_Controller.php */
