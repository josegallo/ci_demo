<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$this->home();
	}
	
	public function home()
	{
		$this->load->model('model_users');
		
		$data['title'] = 'MVC Cool Title'; //It will be accessible in the view as $title
		$data['page_header'] = 'Intro to MVC Design';//It will be accessible in the view as $page_header
		$data['firstnames'] = $this->model_users->getFirstNames();
		//just stored the array of objects into $data['firstnames']. It will be accessible in 
		//the view as $firstnames
		$data['users'] = $this->model_users->getUsers();//It will be accessible in the view as $users
		
		$this->load->view('welcome_message.php', $data);//This load $data object (associative array) into 
		//welcome_message page view
	}

}
