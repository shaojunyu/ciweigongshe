<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->view('welcome_message');
		// var_dump($_COOKIE);

//		$this->load->view('index_view');
//        var_dump($this->is_mobile_device());
        if ($this->is_mobile_device()){
            $this->load->view('mobile/index_view');
        }else{
            $this->load->view('pc/index_view');
        }
	}

	private function is_mobile_device()
    {
        return preg_match('/mobile/i',$_SERVER['HTTP_USER_AGENT'])==1?true:false;
    }
}
