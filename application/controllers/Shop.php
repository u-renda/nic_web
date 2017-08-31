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
		
		$this->load->model('cart_model');
		$this->load->model('cart_shipment_model');
		$this->load->model('kota_model');
		$this->load->model('product_model');
    }
	
	function add_cart()
	{
		$id = $this->input->post('id_product');
		
		$query = $this->product_model->info(array('id_product' => $id));
		
		if ($query->code == 200)
		{
			$result = $query->result;
			$param = array();
			
			if ($this->session->userdata('is_login') == TRUE)
			{
				$total = $result->price_member;
				$param['id_member'] = $this->session->userdata('id_member');
			}
			else
			{
				$total = $result->price_public;
			}
			
			$param['id_product'] = $id;
			$param['quantity'] = 1;
			$param['total'] = $total;
			$param['status'] = 1;
			$param['unique_code'] = $this->session->userdata('unique_code');
			$query2 = $this->cart_model->create($param);
			
			if ($query2->code == 200)
			{
				$response =  array('msg' => 'Success add to shopping cart', 'type' => 'success', 'title' => 'Shopping Cart');
			}
			else
			{
				$response =  array('msg' => 'Failed add to shopping cart', 'type' => 'error', 'title' => 'Shopping Cart');
			}
			
			echo json_encode($response);
			exit();
		}
	}
	
	function checkout()
	{
		$data['view_content'] = 'shop/checkout';
        $this->display_view('templates/frame', $data);
	}
	
	function delete_cart()
	{
		$data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
		
        $get = $this->cart_model->info(array('id_cart' => $data['id']));
		
        if ($get->code == 200)
        {
            if ($this->input->post('delete'))
            {
                $param1 = array();
                $param1['id_cart'] = $data['id'];
                $query = $this->cart_model->delete($param1);

                if ($query->code == 200)
                {
                    $response =  array('msg' => 'Delete data success', 'type' => 'success', 'title' => 'Delete');
                }
                else
                {
                    $response =  array('msg' => 'Delete data failed', 'type' => 'error', 'title' => 'Delete');
                }

                echo json_encode($response);
                exit();
            }
            else
            {
                $this->load->view('delete_confirm', $data);
            }
        }
        else
        {
            echo "Data Not Found";
        }
	}
	
	function detail()
	{
		$data = array();
		$query = $this->product_model->info(array('slug' => $this->uri->segment(3)));
		
		if ($query->code == 200)
		{
			$result = $query->result;
			
			$temp = array();
			$temp['id_product'] = $result->id_product;
			$temp['name'] = $result->name;
			$temp['price_public'] = $result->price_public;
			$temp['price_member'] = $result->price_member;
			$temp['description'] = $result->description;
			$temp['size'] = $result->detail->size;
			$temp['colors'] = $result->detail->colors;
			$temp['material'] = $result->detail->material;
			
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
		$param['type'] = 0;
		
		if ($this->session->userdata('is_login') == TRUE)
		{
			$param['type'] = 1;
		}
		
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
	
	function shipping_cart()
	{
		$data = array();
		$query = $this->kota_model->info(array('id_kota' => $this->input->post('id_kota')));
		
		if ($query->code == 200)
		{
			$result = $query->result;
			
			$param = array();
			$param['id_kota'] = $result->id_kota;
			$param['unique_code'] = $this->session->userdata('unique_code');
			$param['total'] = $result->price;
			$query2 = $this->cart_shipment_model->create($param);
			
			if ($query2->code == 200)
			{
				$response =  array('msg' => 'Success add shipping cart', 'type' => 'success', 'title' => 'Ongkos Kirim');
			}
			else
			{
				$response =  array('msg' => 'Failed add shipping cart', 'type' => 'error', 'title' => 'Ongkos Kirim');
			}
			
			echo json_encode($response);
			exit();
		}
	}
	
	function shopping_cart()
	{
		$data = array();
		$param = array();
		$param['id_member'] = $this->session->userdata('id_member');
		$query = $this->cart_model->lists($param);
		
		if ($query->code == 200)
		{
			$cart = array();
			$subtotal = 0;
			$cart_subtotal = 0;
			foreach ($query->result as $row)
			{
				$product_price = 0;
				if ($this->session->userdata('is_login') == TRUE)
				{
					$product_price = $row->product->price_member;
				}
				else
				{
					$product_price = $row->product->price_public;
				}
				
				$subtotal = $row->quantity * $product_price;
				$cart_subtotal += $subtotal;
				
				$temp = array();
				$temp['id_cart'] = $row->id_cart;
				$temp['product_slug'] = $row->product->slug;
				$temp['product_image'] = $row->product->image;
				$temp['product_name'] = $row->product->name;
				$temp['product_price'] = $product_price;
				$temp['quantity'] = $row->quantity;
				$temp['subtotal'] = $subtotal;
				$cart[] = (object) $temp;
			}
		}
		
		// shipping
		$shipping = 0;
		$query2 = $this->cart_shipment_model->info(array('unique_code' => $this->session->userdata('unique_code')));
		
		if ($query2->code == 200)
		{
			$shipping = $query2->result->total;
		}
		
		$data['cart'] = $cart;
		$data['cart_subtotal'] = $cart_subtotal;
		$data['shipping'] = $shipping;
		$data['total'] = $shipping + $cart_subtotal;
		$data['provinsi_lists'] = get_provinsi_lists(array('limit' => 40))->result;
		$data['view_content'] = 'shop/shopping_cart';
        $this->display_view('templates/frame', $data);
	}
	
	function update_cart()
	{
		
	}
}
