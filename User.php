<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->library('form_validation');
    }


    public function index()
    {

        $data['users']=$this->user_model->get_all_users();
        $this->load->view('login',$data);
    }
    public function user_add()
    {
        $data = array(
					'UserTC' => $this->input->post('UserTC'),
					'UserName' => $this->input->post('UserName'),
					'UserSurname' => $this->input->post('UserSurname'),
					'Email' => $this->input->post('Email'),
          'Password' => $this->input->post('Password'),
          'Telephone' => $this->input->post('Telephone'),
          'Gender' => $this->input->post('Gender'),
          'CityId' => $this->input->post('CityId'),
          'DateofBirth' => $this->input->post('DateofBirth'),
          'TaskId' => $this->input->post('TaskId'),
          'RecorderId' => $this->input->post('RecorderId'),
          'DateofRecord' => $this->input->post('DateofRecord'),
          'IsAccept' => $this->input->post('IsAccept'),
				);
        $insert = $this->user_model->user_add($data);
        echo json_encode(array("status" => TRUE));
    }
    public function ajax_edit($id)
    {
        $data = $this->user_model->get_by_id($id);



        echo json_encode($data);
    }

    public function user_update()
    {
        $data = array(
            'UserTC' => $this->input->post('UserTC'),
            'UserName' => $this->input->post('UserName'),
            'UserSurname' => $this->input->post('UserSurname'),
            'Email' => $this->input->post('Email'),
            'Password' => $this->input->post('Password'),
            'Telephone' => $this->input->post('Telephone'),
            'Gender' => $this->input->post('Gender'),
            'CityId' => $this->input->post('CityId'),
            'DateofBirth' => $this->input->post('DateofBirth'),
            'TaskId' => $this->input->post('TaskId'),
            'RecorderId' => $this->input->post('RecorderId'),
            'DateofRecord' => $this->input->post('DateofRecord'),
            'IsAccept' => $this->input->post('IsAccept'),
			);
        $this->user_model->user_update(array('UserId' => $this->input->post('UserId')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function user_delete($id)
    {
        $this->user_model->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function user_show($id)
    {
        $data = $this->user_model->get_by_id($id);



        echo json_encode($data);
    }

  //bu fonksiyonu düzenleyecsin unurtma giris kontrolleri burada yapılacak
  //burası user login sayfasına yönlendirme yapacak..
  public function user_login()
  {
        $this->load->view('login');
  }

  //önce email kontolu yapıyoruz boş ve email şeklinde girilmediği
  // zaman hata verecek
  public function user_login_control()
  {
    if(isset($_POST['login']))
    {
      $this->form_validation->set_rules('email','Email','trim|required|valid_email',array(
                         'required' => 'Lütfen geçerli bir Email adresi giriniz',
                         'valid_email'=>'Lütfen @ işareti ve nokta kullanınız.'
                         ));
      $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[15]',array(
                            'required' =>'Lütfen kullanıcı şifrenizi giriniz.',
                            'min_length' =>'Şifreniz en az 4 karakter olmalı. ',
                            'max_length' => 'Şİfreniz en fazla 15 karakter olmalı.'
                          ));
    if($this->form_validation->run()==true)
    {
      $email=$this->input->post('email');
      $password=$this->input->post('password');
      $data= $this->user_model->user_login_control_data($email,$password);
      if($data['isLogin']==true)
      {
		$this->load->view('index');
        $this->session->set_userdata('username',$data['username']);
        $this->session->set_userdata('taskid',$data['taskid']);
        $this->session->set_userdata('userid',$data['userid']);

      }
      else
      {
        echo " giriş yapılamadı..";
      }
    }
    else
    {
      $data['validation_error']="tüm alanları doldurun";
      $this->load->view('login',$data);
    }
   }
  }


  //user ın çıkış yapmasını ve aynı zamanda sessionu sıfırlamayı saglayacak fonk.
  public function logout()
  {
    $this->session->sess_destroy();
    $this->load->view('login');
  }


}
