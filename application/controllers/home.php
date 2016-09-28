<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		$this->home2();
	}
	
	public function home2()
	{
		$this->load->model('model_users');
		
		$data['title'] = 'Users'; //It will be accessible in the view as $title
		$data['page_header'] = 'This are our users';//It will be accessible in the view as $page_header
		$data['firstnames'] = $this->model_users->getFirstNames();
		//just stored the array of objects into $data['firstnames']. It will be accessible in 
		//the view as $firstnames
		//$data['users'] = $this->model_users->getUsers();//It will be accessible in the view as $users
		
		$this->load->view('view_home', $data);//This load $data object (associative array) into 
		//welcome_message page view
	}

}
