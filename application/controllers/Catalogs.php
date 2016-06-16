<?php
class Catalogs extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper("catalogs");
	}
	public function add(){
		if(islogin()){
			$this->load->view("catalogs/registration");
		}
	}
	public function index(){
		if(islogin()){
			$data["objs"] = getbackendcatalogs();
			$this->load->view("catalogs/catalogs",$data);
		}
	}
	public function profile(){
		if(islogin()){
			$data["relateds"] = array(array("id"=>"1","name"=>"AAA","description"=>"Laptop super ","action"=>""),array("id"=>"2","name"=>"BBB","description"=>"Laptop super sae","action"=>""),array("id"=>"3","name"=>"CCC","description"=>"Laptop super bagus","action"=>""));
			$data["obj"] = getcatalog($this->uri->segment(3));
			$this->load->view("catalogs/profile",$data);
		}
	}
	public function save(){
		$params = $this->input->post();
		$query = "insert into catalogs (name,category,image,sellprice,dellprice,buyprice,description) ";
		$query.= "values ('".$params["name"]."','".$params["category"]."','".$params["image"]."','".$params["sellprice"]."','".$params["dellprice"]."','".$params["buyprice"]."','".$params["description"]."')";
		$this->db->query($query);
		echo $this->db->insert_id();
	}
	public function setactive(){
		$params = $this->input->post();
		$query = "update catalogs set active='".$params["active"]."' where id='".$params["id"]."'";
		$this->db->query($query);
		echo $query;		
	}
	public function update(){
		$params = $this->input->post();
		$query = "update catalogs set name='".$params["name"]."',category='".$params["category"]."',image='".$params["image"]."',sellprice='".$params["sellprice"]."',dellprice='".$params["dellprice"]."',buyprice='".$params["buyprice"]."',showinfront='".$params["showinfront"]."',exhibit='".$params["exhibit"]."',description='".$params["description"]."' where id='".$params["id"]."'";
		$this->db->query($query);
		echo $query;
	}
	public function view(){
		$this->load->view("catalogs");
	}
}
