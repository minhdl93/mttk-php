<?php
class StatusController extends CI_Controller {
    private $musicURL;

	function __construct() {
        parent::__construct();
        $is_logged_in = $this->session->userdata('is_logged_in');
        if(!isset($is_logged_in) || $is_logged_in!=true)
        {
            redirect('/login/index', 'refresh');
        }
        $musicURL="";
    }

	function index()
	{
        $em = $this->doctrine->em;
        $status = new Entity\statusDAO($em);
        $status->layDSStatus($this->session->userdata('email'));
	}

}
?>