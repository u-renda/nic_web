<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_index')); }
		
		$this->load->model('cart_model');
		$this->load->model('cart_shipment_model');
		$this->load->model('cart_total_model');
		$this->load->model('member_model');
		$this->load->model('member_point_model');
		$this->load->model('member_transfer_model');
		$this->load->model('order_model');
		$this->load->model('order_transfer_model');
    }
	
	function member_edit()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('phone_number', 'phone_number', 'required');
		$this->form_validation->set_rules('idcard_address', 'idcard_address', 'required');
		
		if ($this->input->post('password') == TRUE)
		{
			$this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
			$this->form_validation->set_rules('confirm_password', 'confirm_password', 'required|min_length[6]|matches[password]');
		}
		
		if ($this->input->post('photo') == TRUE)
		{
			$this->form_validation->set_rules('photo', 'foto diri', 'required', array('required' => '%s harus diisi. Pastikan Anda sudah membaca cara upload foto.'));
		}
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['error'] = validation_errors();
		}
		else
		{
			$param = array();
			$param['id_member'] = $this->session->userdata('id_member');
			$param['email'] = $this->input->post('email');
			$param['phone_number'] = $this->input->post('phone_number');
			$param['idcard_address'] = replace_new_line($this->input->post('idcard_address'));
			
			if ($this->input->post('password') == TRUE)
			{
				$param['password'] = $this->input->post('password');
			}
			
			if ($this->input->post('photo') == TRUE)
			{
				$param['photo'] = $this->input->post('photo');
			}
			
			$query = $this->member_model->update($param);
			
			if ($query->code == 200)
			{
				$response =  array('type' => 'success', 'location' => $this->config->item('link_member_profile'));
			}
			else
			{
				$response =  array('type' => 'error');
			}
			
			echo json_encode($response);
			exit();
		}
	}
	
	function member_event_lists()
	{
		$param = array();
		$param['id_member'] = $this->session->userdata('id_member');
		$query = $this->member_point_model->lists($param);
		
		if ($query->code == 200)
		{
			$data = array();
			
			foreach ($query->result as $row)
			{
				$temp = array();
				$temp['status'] = color_member_point_status($row->status);
				$temp['id_events'] = $row->events->id_events;
				$temp['title'] = $row->events->title;
				$temp['date'] = date('d M Y', strtotime($row->events->date));
				$data[] = (object) $temp;
			}
			
			return $data;
		}
	}
	
	function member_transfer_lists()
	{
		$param = array();
		$param['id_member'] = $this->session->userdata('id_member');
		$query = $this->member_transfer_model->lists($param);
		
		if ($query->code == 200)
		{
			$data = array();
			$code_member_transfer_status = $this->config->item('code_member_transfer_status');
			$code_member_transfer_type = $this->config->item('code_member_transfer_type');
			$i = 1;
			
			foreach ($query->result as $row)
			{
				$date = date('d M Y', strtotime($row->date));
				if ($row->date == '0000-00-00')
				{
					$date = '-';
				}
				
				$temp = array();
				$temp['no'] = $i;
				$temp['id_member_transfer'] = $row->id_member_transfer;
				$temp['name'] = $row->name;
				$temp['total'] = 'Rp '.number_format($row->total, 0, ',', '.');
				$temp['resi'] = $row->resi;
				$temp['status'] = $code_member_transfer_status[$row->status];
				$temp['date'] = $date;
				$temp['type'] = $code_member_transfer_type[$row->type];
				$data[] = (object) $temp;
				$i++;
			}
			
			return $data;
		}
	}
	
	function member_order_lists()
	{
		$param = array();
		$param['id_member'] = $this->session->userdata('id_member');
		$query = $this->order_model->lists($param);
		
		if ($query->code == 200)
		{
			$data = array();
			$i = 1;
			$code_order_status = $this->config->item('code_order_status');
			
			foreach ($query->result as $row)
			{
				$total = 0;
				$resi = '-';
				$query2 = $this->cart_total_model->info(array('id_cart_total' => $row->id_cart_total));
				
				if ($query2->code == 200)
				{
					$shipment_address = '';
					$shipment_total = 0;
					$total = $query2->result->total;
					$total_product = 0;
					$product = array();
					$unique_code = $query2->result->unique_code;
					
					$query4 = $this->cart_shipment_model->info(array('unique_code' => $unique_code));
					
					if ($query4->code == 200)
					{
						$shipment_address = $query4->result->shipment_address;
						$shipment_total = $query4->result->total;
					}
					
					$query5 = $this->cart_model->lists(array('unique_code' => $unique_code));
					
					if ($query5->code == 200)
					{
						foreach ($query5->result as $row2)
						{
							$total_product += $row2->total * $row2->quantity;
							$image = $row2->product->image;
							$explode = explode('.', $image);
							
							$temp2 = array();
							$temp2['product_image'] = $explode[0].'_350x350.'.$explode[1];
							$temp2['product_name'] = $row2->product->name;
							$temp2['product_slug'] = $row2->product->slug;
							$temp2['product_quantity'] = $row2->quantity;
							$product[] = $temp2;
						}
					}
				}
				
				$query3 = $this->order_transfer_model->info(array('id_order' => $row->id_order));
				
				if ($query3->code == 200)
				{
					$resi = $query3->result->resi;
				}
				
				$temp = array();
				$temp['no'] = $i;
				$temp['id_order'] = $row->id_order;
				$temp['status'] = $code_order_status[$row->status];
				$temp['total'] = $total;
				$temp['resi'] = $resi;
				$temp['shipment_address'] = $shipment_address;
				$temp['shipment_total'] = $shipment_total;
				$temp['total_product'] = $total_product;
				$temp['unique_trf'] = $total - $shipment_total - $total_product;
				$temp['product'] = $product;
				$temp['created_date'] = date('d M Y', strtotime($row->created_date));
				$data[] = (object) $temp;
				$i++;
			}
			
			return $data;
		}
	}
	
	function profile()
	{
		$data = array();
		
		$query = $this->member_model->info(array('id_member' => $this->session->userdata('id_member')));
		
		if ($query->code == 200)
		{
			if ($this->input->post('submit') == TRUE)
			{
				$this->member_edit();
			}
			
			$code_member_gender = $this->config->item('code_member_gender');
			$code_member_shirt_size = $this->config->item('code_member_shirt_size');
			$result = $query->result;
			
			if ($result->gender == 1)
			{
				$icon_gender = '<i class="fa fa-female"></i> ';
			}
			else
			{
				$icon_gender = '<i class="fa fa-male"></i> ';
			}
			
			$photo = '';
			if ($result->photo == TRUE)
			{
				$code_350x350 = $this->config->item('code_350x350');
				$explode = explode('.', $result->photo);
				
				if(is_bool(LOCALHOST) || LOCALHOST == 'localhost')
				{
					$photo = $explode[0].$code_350x350['extra'].'.'.$explode[1];
				}
				else
				{
					$photo = $explode[0].'.'.$explode[1].'.'.$explode[2].$code_350x350['extra'].'.'.$explode[3];
				}
			}
			
			$temp = array();
			$temp['name'] = $result->name;
			$temp['email'] = $result->email;
			$temp['photo'] = $photo;
			$temp['replace_idcard_address'] = replace_new_line($result->idcard_address);
			$temp['idcard_address'] = $result->idcard_address;
			$temp['birth_place'] = $result->birth_place;
			$temp['birth_date'] = date('d M Y', strtotime($result->birth_date));
			$temp['marital_status'] = $result->marital_status;
			$temp['phone_number'] = $result->phone_number;
			$temp['member_card'] = $result->member_card;
			$temp['shirt_size'] = $code_member_shirt_size[$result->shirt_size];
			$temp['gender'] = $code_member_gender[$result->gender];
			$temp['icon_gender'] = $icon_gender;
			$temp['postal_code'] = $result->postal_code;
			$data['member'] = (object) $temp;
			$data['member_event'] = (object) $this->member_event_lists();
			$data['member_transfer'] = (object) $this->member_transfer_lists();
			$data['order'] = (object) $this->member_order_lists();
			
			$data['code_member_marital_status'] = $this->config->item('code_member_marital_status');
			$data['view_content'] = 'member/profile';
			$this->display_view('templates/frame', $data);
		}
		else
		{
			redirect($this->config->item('link_login'));
		}
	}
}
