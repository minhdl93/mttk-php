<?php

class Main extends CI_Controller {
	
	//check if user have logged in
	function __construct() {
        parent::__construct();
        $is_logged_in = $this->session->userdata('is_logged_in');
        if(!isset($is_logged_in) || $is_logged_in!=true)
        {
            redirect('/userController/index', 'refresh');
        }
    }

    function clearCache(){
    	$this->smarty->clearAllCache();
    }

	function firstTime()
	{
		$this->smarty->view('signUpInfo');
	}

	function player()
	{
		$this->smarty->view('addFanclub');
	}
	
	public function search()
	{
		$this->smarty->view('searchFriend');
	}
	
	//load message view
	public function chat()
	{
		$this->smarty->assign('userPicCmt',$this->session->userdata('pic'));
		$this->smarty->assign('userLogin',$this->session->userdata('email'));
		$this->smarty->assign('userName',$this->session->userdata('first_name').' '.$this->session->userdata('last_name'));
		$this->smarty->view('chat');
	}

	//load homepage view
	public function homePage()
	{
		$this->smarty->assign('userPicCmt',$this->session->userdata('pic'));
		$this->smarty->assign('userName',$this->session->userdata('first_name').' '.$this->session->userdata('last_name'));
		$this->smarty->assign('userLogin',$this->session->userdata('email'));
		$this->smarty->view('homePage');
	}
}
?>