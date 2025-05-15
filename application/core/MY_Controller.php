<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->driver('session');
		$this->load->helper('url');

	}
	
	public function sessionIn(){
		if($this->session->userdata('iduser')!=null){
			redirect(site_url('DashCntrl'));
		}
	}
	
	public function sessionOut(){
		if($this->session->userdata('iduser')==null){
			redirect(site_url('login'), 'refresh');
		}
		
	}

}
?>