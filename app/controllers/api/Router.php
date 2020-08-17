<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Router extends MY_Controller {

   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('api/Router_model', 'routers');
   }

   function index_post()
   {
      $result = $this->routers->post($this->post());

      $this->response($result);
   }

   function index_get()
   {
      $result = $this->routers->get($this->get());

      $this->response($result);
   }
   
   function index_put()
   {
      $result = $this->routers->put($this->put());

      $this->response($result);
   }

   function index_delete()
   {
      $result = $this->routers->delete($this->delete());

      $this->response($result);
   }

   function default_put()
   {
      $result = $this->routers->default($this->put());

      $this->response($result);
   }

}

/* End of file Router.php */
