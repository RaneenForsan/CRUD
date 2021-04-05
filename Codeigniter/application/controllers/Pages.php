<?php
class Pages extends CI_Controller{
    public function view($page="home"){
        $data['title']=$page;
		$this->load->view('templates/header.php',$data);
        $this->load->view('Pages/'.$page,$data);
	    $this->load->view('templates/footer.php',$data);

    }
	public function home($page="home"){
        $data['title']=$page;
		$this->load->view('templates/header.php',$data);
        $this->load->view('Pages/home',$data);
	    $this->load->view('templates/footer.php',$data);

    }
}

?>
