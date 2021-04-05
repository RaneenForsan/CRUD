
<?php

class Posts extends CI_Controller{

	public function country(){
		$data['title']='Create post';
		$data['posts']=$this->post_model->get_posts();
		 $this->load->view('templates/header',$data);
		 $this->load->view('pages/countries',$data);
		 $this->load->view('templates/footer');
	}
	public function create(){
     $this->form_validation->set_rules('country','Country','required');
	 if($this->form_validation->run() === FALSE){
		 $data['title']='Create post';
		 $this->load->view('templates/header',$data);
		 $this->load->view('pages/AddCountry',$data);
		 $this->load->view('templates/footer');


	 }
	 else{
		 $this->post_model->create_Post();
		 redirect ('county');
	 }

	}

	public function login(){
		$data['title']="Login";
		$this->load->view('pages/login',$data);

	}
	public function login_validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run()){
			$email=$this->input->post('email');
			$password=$this->input->post('password');
            $this->load->model('post_model');
			if($this->post_model->can_login($email,$password)){
			$session_data=array(
               'email'=>$email

			);	

			
			$this->session->set_userdata($session_data);
			 redirect('home');
		}
		else{
			$this->session->set_flashdata('error','Invalid Username and password');
			redirect('login');

		}}
		else{
			$this->login();
		}



	


	}

	function logout(){
		$this->session->unset_userdata('email');
		redirect('login');
	}

	


}


?>
