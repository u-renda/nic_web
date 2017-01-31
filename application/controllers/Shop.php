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
		
		$this->load->model('product_model');
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
		$this->load->library('pagination');
		
		$data = array();
		$product = array();
		
		// Lists Product
		$query = $this->product_model->lists(array());
		
		$data['count'] = $query->count;
		$data['total'] = $query->total;
		
		if ($query->code == 200)
		{
			$code_product_status = $this->config->item('code_product_status');
			$result = $query->result;
			
			foreach ($result as $row)
			{
				$explode = explode('.', $row->image);
				$image = $explode[0].'_350x350.'.$explode[1];
				
				$temp = array();
				$temp['name'] = $row->name;
				$temp['slug'] = $row->slug;
				$temp['image'] = $image;
				$temp['type'] = $row->type;
				$temp['price_public'] = number_format($row->price_public, 0, ',', '.');
				$temp['price_member'] = number_format($row->price_member, 0, ',', '.');
				$temp['status'] = $code_product_status[$row->status];
				$product[] = (object) $temp;
			}
		}
		
		// pagination
		$config['base_url'] = '';
		$config['total_rows'] = $data['total'];
		$config['per_page'] = 2;
		$config['next_link'] = '<i class="fa fa-chevron-right"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active">';
		$config['cur_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		
		$data['pagination'] = $this->pagination->create_links();
		$data['product'] = $product;
		$data['view_content'] = 'shop/shop_lists';
        $this->display_view('templates/frame', $data);
	}
	
	function invoice()
	{
		$data['view_content'] = 'shop/invoice';
        $this->display_view('templates/frame', $data);
	}
}
