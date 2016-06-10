<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		if ($this->config->item('shop_mode') == FALSE)
		{
			redirect($this->config->item('link_index'));
		}
    }
	
	function cart()
	{
		$data['view_content'] = 'shop/cart';
        $this->display_view('templates/frame', $data);
	}
	
	function checkout()
	{
		$data['view_content'] = 'shop/checkout';
        $this->display_view('templates/frame', $data);
	}
	
	function detail()
	{
		$data['view_content'] = 'shop/detail';
        $this->display_view('templates/frame', $data);
	}
	
	function index()
	{
		$data['view_content'] = 'shop/lists';
        $this->display_view('templates/frame', $data);
	}
	
	function invoice()
	{
		$data['view_content'] = 'shop/invoice';
        $this->display_view('templates/frame', $data);
	}
}
