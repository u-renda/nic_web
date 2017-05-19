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
		$data = array();
		$query = $this->product_model->info(array('slug' => $this->uri->segment(3)));
		
		if ($query->code == 200)
		{
			$result = $query->result;
			
			$temp = array();
			$temp['name'] = $result->name;
			$temp['price_public'] = $result->price_public;
			$temp['description'] = $result->description;
			
			$temp['image'][] = $result->image;			
			foreach ($result->other_image as $row)
			{
				$temp['image'][] = $row->image;
			}
		}
		else
		{
			redirect($this->config->item('link_shop_lists'));
		}
		
		$data['product'] = (object) $temp;
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
		
		$offset = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
		
		$param = array();
		$param['limit'] = 10;
		$param['offset'] = $offset;
		$param['sort'] = 'desc';
		$param['status_not'] = 4;
		$query = $this->product_model->lists($param);
		
		if ($query != FALSE)
		{
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
				$temp['status'] = $row->status;
				$product[] = (object) $temp;
			}
			
			// Pagination
			$param2 = array();
			$param2['base_url'] = $this->config->item('link_shop_lists');
			$param2['total'] = $query->total;
			$param2['limit'] = $query->limit;
			pages_pagination($param2);
			
			$data['pagination'] = $this->pagination->create_links();
		}
		
		// Number showing item
		$data['showing_from'] = $offset + 1;
		$showing_to = $data['showing_from'] + $param['limit'] - 1;
		
		if ($showing_to > $query->total)
		{
			$showing_to = $query->total;
		}
		
		$data['link_pages'] = $this->config->item('link_shop_lists');
		$data['total'] = $query->total;
		$data['product'] = $product;
		$data['showing_to'] = $showing_to;
		$data['code_product_status'] = $this->config->item('code_product_status');
		$data['view_content'] = 'shop/lists';
		$this->display_view('templates/frame', $data);
	}
	
	function shopping_cart()
	{
		$data['view_content'] = 'shop/shopping_cart';
        $this->display_view('templates/frame', $data);
	}
}
