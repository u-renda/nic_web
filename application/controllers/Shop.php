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
	
	function invoice()
	{
		$data['view_content'] = 'shop/invoice';
        $this->display_view('templates/frame', $data);
	}
	
	function lists()
	{
		$this->load->library('pagination');
		
		$data = array();
		$product = array();
		
		if ($this->uri->segment(3) == '')
		{
			$offset = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
			
			$param = array();
			$param['limit'] = 2;
			$param['offset'] = $offset;
			$param['sort'] = 'desc';
			$query = $this->product_model->lists($param);
			
			if ($query != FALSE)
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
				
				// Pagination
				pages_pagination($query);
				
				$data['pagination'] = $this->pagination->create_links();
			}
			
			$data['link_pages'] = $this->config->item('link_shop_lists');
			$data['count'] = $query->count;
			$data['total'] = $query->total;
			$data['product'] = $product;
			$data['view_content'] = 'shop/lists';
			$this->display_view('templates/frame', $data);
		}
		else
		{
			echo "ada";die();
			//$param2 = array();
			//$param2['link_pages'] = $this->config->item('link_pages_agnezmo');
			//$this->detail($param2);
		}
	}
	
	function shopping_cart()
	{
		$data['view_content'] = 'shop/shopping_cart';
        $this->display_view('templates/frame', $data);
	}
}
