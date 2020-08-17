<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Router_model extends MY_Model {

   protected $router = "mst_router_list";
   
   public function __construct()
   {
      parent::__construct();
      //Do your magic here
   }
   
   public function post($params)
   {
      $session = $params['session'];
      $host = $params['host'];
      $port = $params['port'];
      $username = $params['username'];
      $password = $params['password'];

      $this->form_validation->set_rules('session', 'Session Name', 'required|max_length[50]');
      $this->form_validation->set_rules('host', 'Host Mikrotik', 'required|max_length[50]');
      $this->form_validation->set_rules('port', 'Port API Mikrotik', 'required|max_length[11]|integer');
      $this->form_validation->set_rules('username', 'Username', 'required|max_length[100]');
      $this->form_validation->set_rules('password', 'Password', 'required|max_length[50]');

      
      if ($this->form_validation->run() == FALSE) {
         $errors = $this->form_validation->error_array();

         $output = array(
            'status' => false,
            'error' => $errors
         );
         goto output;
      }

      $is_default = "0";

      $cek_data = $this->db->query("
         SELECT
            id
         FROM
            $this->router 
      ")->num_rows();

      if($cek_data == 0) {
         $is_default = "1";
      }

      $cek_session_name = $this->db->query("
         SELECT
            id
         FROM
            $this->router
         WHERE
            session_name = '$session'
      ")->num_rows();

      if($cek_session_name == 1) {
         $output = array(
            'status' => false,
            'error' => "Session Name sudah terdaftar."
         );
         goto output;
      }

      $cek_host = $this->db->query("
         SELECT
            id
         FROM
            $this->router
         WHERE
            host = '$host'
      ")->num_rows();

      if($cek_host == 1) {
         $output = array(
            'status' => false,
            'error' => "Host Mikrotik sudah terdaftar."
         );
         goto output;
      }

      $cek_username = $this->db->query("
         SELECT
            id
         FROM
            $this->router
         WHERE
            username = '$username'
      ")->num_rows();

      if($cek_username == 1) {
         $output = array(
            'status' => false,
            'error' => "Username sudah terdaftar."
         );
         goto output;
      }

      $this->db->insert($this->router, array(
         'session_name' => $session,
         'host' => $host,
         'port' => $port,
         'username' => $username,
         'password' => $password,
         'is_default' => $is_default
      ));
      
      $output = array(
         'status' => true,
         'message' => "Router List berhasil disimpan.",
         'query' => array(
            'id' => $this->db->insert_id()
         )
      );
      
      output:
      return $output;
   }

   public function get($params)
   {
      $page = $params['page'];
      $length = (empty($params['length'])) ? 1:$params['length'];
      $search = $params['search'];
      $id = $params['id'];

      $rows = $this->db->query("
         SELECT
            id
         FROM
            $this->router
      ")->num_rows();

      $start = ($page > 1) ? ($page * $length) - $length:0;
      $totalRow = ceil($rows / $length);

      if($page >= $totalRow) {
         $start = ($totalRow * $length) - $length;
         $page = $totalRow;
      }else {
         $page = 1;
      }

      $where = (!empty($search)) ? " AND session_name LIKE '%$search%'":"";
      $where .= (!empty($id)) ? " AND id = '$id'":"";

      $router = $this->db->query("
         SELECT
            id,
            session_name,
            host,
            port,
            username,
            password,
            is_default,
            created_at,
            updated_at
         FROM
            $this->router
         WHERE
            id != ''
            $where
         LIMIT $start, $length
      ")->result_array();

      $output = array(
         'status' => true,
         'data' => $router,
         'pagination' => array(
            'page' => $page,
            'length' => $length,
            'total_row' => $totalRow
         )
      );

      return $output;
   }

   public function put($params)
   {
      $id = $params['id'];
      $session = $params['session'];
      $host = $params['host'];
      $port = $params['port'];
      $username = $params['username'];
      $password = $params['password'];

      $this->form_validation->set_data($params);

      $this->form_validation->set_rules('id', 'ID', 'required');
      $this->form_validation->set_rules('session', 'Session Name', 'required|max_length[50]');
      $this->form_validation->set_rules('host', 'Host Mikrotik', 'required|max_length[50]');
      $this->form_validation->set_rules('port', 'Port API Mikrotik', 'required|max_length[11]|integer');
      $this->form_validation->set_rules('username', 'Username', 'required|max_length[100]');
      $this->form_validation->set_rules('password', 'Password', 'required|max_length[50]');

      
      if ($this->form_validation->run() == FALSE) {
         $errors = $this->form_validation->error_array();

         $output = array(
            'status' => false,
            'error' => $errors
         );
         goto output;
      }

      $cek_data = $this->db->query("
         SELECT
            id
         FROM
            $this->router
         WHERE
            id = '$id'
      ")->num_rows();

      if ($cek_data == 0) {
         $output = array(
            'status' => false,
            'error' => "Router List tidak ditemukan."
         );
         goto output;
      }

      $cek_session_name = $this->db->query("
         SELECT
            id
         FROM
            $this->router
         WHERE
            session_name = '$session'
      ");

      if($cek_session_name->num_rows() == 1 && $cek_session_name->row_array()['id'] != $id) {
         $output = array(
            'status' => false,
            'error' => "Session Name sudah terdaftar."
         );
         goto output;
      }

      $cek_host = $this->db->query("
         SELECT
            id
         FROM
            $this->router
         WHERE
            session_name = '$session'
      ");

      if($cek_host->num_rows() == 1 && $cek_host->row_array()['id'] != $id) {
         $output = array(
            'status' => false,
            'error' => "Host Mikrotik sudah terdaftar."
         );
         goto output;
      }

      $cek_username = $this->db->query("
         SELECT
            id
         FROM
            $this->router
         WHERE
            username = '$session'
      ");

      if($cek_username->num_rows() == 1 && $cek_username->row_array()['id'] != $id) {
         $output = array(
            'status' => false,
            'error' => "Username sudah terdaftar."
         );
         goto output;
      }

      $this->db->update($this->router, array(
         'session_name' => $session,
         'host' => $host,
         'port' => $port,
         'username' => $username,
         'password' => $password
      ), array(
         'id' => $id
      ));
      
      $output = array(
         'status' => true,
         'message' => "Router List berhasil diperbarui.",
         'query' => array(
            'id' => $id
         )
      );
      
      output:
      return $output;
   }

   public function delete($params)
   {
      $id = $params['id'];

      $this->form_validation->set_data(array(
         'id' => $id
      ));

      $this->form_validation->set_rules('id', 'ID', 'required');
      
      if ($this->form_validation->run() == FALSE) {
         $errors = $this->form_validation->error_array();

         $output = array(
            'status' => false,
            'error' => $errors
         );
         goto output;
      }

      $cek_data = $this->db->query("
         SELECT
            id
         FROM
            $this->router
         WHERE
            id = '$id'
      ")->num_rows();

      if($cek_data == 0) {
         $output = array(
            'status' => false,
            'error' => "Router List tidak ditemukan."
         );
         goto output;
      }

      $this->db->delete($this->router, array(
         'id' => $id
      ));
      
      $output = array(
         'status' => true,
         'message' => "Router List berhasil dihapus.",
         'query' => array(
            'id' => $id
         )
      );
      
      output:
      return $output;
   }

   public function default($params)
   {
      $id = $params['id'];

      $this->form_validation->set_data($params);

      $this->form_validation->set_rules('id', 'ID', 'required');

      if ($this->form_validation->run() == FALSE) {
         $errors = $this->form_validation->error_array();

         $output = array(
            'status' => false,
            'error' => $errors
         );
         goto output;
      }

      $this->db->update($this->router, array(
         'is_default' => '0'
      ));
      
      $this->db->update($this->router, array(
         'is_default' => '1'
      ), array(
         'id' => $id
      ));

      $output = array(
         'status' => true,
         'message' => "Router List berhasil di set default.",
         'query' => array(
            'id' => $id
         )
      );

      output:
      return $output;
   }

}

/* End of file Router_model.php */
