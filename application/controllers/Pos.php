<?php
class Pos extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("pos");
	}
	function index(){
		$data['catalogs'] = getcatalogs();
		$this->load->view("Pos/pos",$data);
	}
}
