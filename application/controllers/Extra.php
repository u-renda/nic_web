<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extra extends MY_Controller {

	function __construct()
    {
        parent::__construct();
    }
	
	function maintenance()
	{
		$this->display_view('extra/maintenance');
	}
	
	function coming_soon()
	{
		$this->display_view('extra/coming_soon');
	}
	
	function not_found()
	{
        $data = array();
        $data['view_content'] = 'extra/not_found';
        $this->display_view('templates/frame', $data);
	}
}
