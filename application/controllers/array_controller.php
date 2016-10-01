<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Array_controller extends CI_Controller {

	function __construct () //construct is run first no matter what, will do  some housekeeping for us
	{
		parent::__construct(); //first the constructor does is call the parent's constructor
		//$this->load->model('model_users'); //test if here or on public funtion home3()
	}
	
	public function index()
	{
		$this->home3();
	}
	
	public function home3()
	{
		//load models and helpers
		$this->load->model('model_users');
		$this->load->helper('array');
		$this->load->helper('email');
		
		$data['title'] = 'Array Helper test'; //It will be accessible in the view as $title
		$data['page_header'] = 'Array Helper trial';//It will be accessible in the view as $page_header
		$data['firstnames'] = $this->model_users->getFirstNames();
		//just stored the array of objects into $data['firstnames']. It will be accessible in 
		//the view as $firstnames
		//$data['users'] = $this->model_users->getUsers();//It will be accessible in the view as $users
		
		$this->load->view('array_view', $data);//This load $data object (associative array) into 
		//welcome_message page view
		
		//CodeIgniter.com says that elements() could be useful for controling what elements 
		//are sent to model funcs. Ex:
		//this->load->model('post_model');
		//this->post_model->update(elements(array('id','title','content'), $POST));
	}

}
