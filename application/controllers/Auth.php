<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      $this->load->library('form_validation');
  }

  public function index()
  {
      $this->form_validation->set_rules('username', 'Username', 'trim|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');

      if($this->form_validation->run() == false) {
          $this->load->view('templates/login_header.php');
          $this->load->view('auth/index');
          $this->load->view('templates/login_footer.php');
      } else {
          $this->_login();
      }
  }

  private function _login()
  {
      $user = $this->input->post('username', true);
      $pass = $this->input->post('password', true);

      $ambil_data = $this->db->get_where('user', ['Username' =>$user])->row_array();

      if($ambil_data) {
          if($pass == $ambil_data['Password']) {
              $data = [
                  'username' => $ambil_data['Username']
              ];
              $this->session->set_userdata($data);
              redirect('admin');
          } else {
              $this->session->set_flashdata('message', 'password salah');
              redirect('auth');
          }
      } else {
          $this->session->set_flashdata('message', 'username salah');
          redirect('auth');
      }
  }

  public function logout()
  {
      $this->session->unset_userdata('username');
      $this->session->set_flashdata('message', 'Akun anda telah berhasil Keluar!');
      redirect('auth');
  }

}