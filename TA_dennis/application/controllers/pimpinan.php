<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pimpinan extends CI_Controller {

	public function index()
	{
		$data["page"] = "v_pimpinan";
		$this->load->view("atasbawah/themes",$data);
	}
}