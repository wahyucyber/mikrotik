<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends MY_Model {

   private $user = "mst_user";
   
   public function __construct()
   {
      parent::__construct();
      //Do your magic here
   }

   public function post($params)
   {
      $username = $params['username'];
      $password = $params['password'];

      $this->form_validation->set_rules('username', 'Username', 'required|max_length[100]');
      $this->form_validation->set_rules('password', 'Password', 'required|max_length[50]');

      if ($this->form_validation->run() == FALSE) {
         $errors = $this->form_validation->error_array();
         $output =  array(
            'status' => false,
            'error' => $errors
         );
         goto output;
      }

      $cek_akun = $this->db->query("
         SELECT
            id,
            password
         FROM
            $this->user
         WHERE
            username = '$username'
      ");

      if($cek_akun->num_rows() == 0) {
         $output = array(
            'status' => false,
            'error' => "Username salah."
         );
         goto output;
      }

      if(password_verify($password, $cek_akun->row_array()['password']) == true) {

         $token = AUTHORIZATION::generateToken(array(
            'id' => $cek_akun->row_array()['id'],
            'timestamp' => now()
         ));

         $output = array(
            'status' => true,
            'message' => "success.",
            'data' => array(
               'token' => $token
            )
         );
         goto output;
      }else {
         $output = array(
            'status' => false,
            'error' => "Password salah."
         );
         goto output;
      }

      output:
      return $output;

   }
   
   public function get()
   {
      $auth = env("app_auth");

      $authorization = $this->input->request_headers()[$auth];

      if (empty($authorization)) {

         $output = array(
            'status' => false,
            'error' => array(
               'authorization' => "Authorization wajib diisi."
            )
         );
         goto output;
      }

      $validate = AUTHORIZATION::validateTimestamp($authorization);

      if($validate == false) {
         $output = array(
            'status' => false,
            'error' => "unauthorization."
         );
         goto output;
      }

      $user_id = $validate->id;

      $get_user = $this->db->query("
         SELECT
            nama,
            username
         FROM
            $this->user
         WHERE
            id = '$user_id'
      ")->row_array();

      $output = array(
         'status' => true,
         'message' => "success.",
         'data' => $get_user
      );
      
      output:
      return $output;
   }

}

/* End of file Auth_model.php */
