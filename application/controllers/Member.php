<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_index')); }
    }
	
	function profile()
	{
		$data = array();
		$data['view_content'] = 'member/profile';
        $this->display_view('templates/frame', $data);
	}
}
