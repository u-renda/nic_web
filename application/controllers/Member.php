<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_index')); }
		$this->load->model('member_model');
		$this->load->model('member_point_model');
		$this->load->model('member_transfer_model');
    }
	
	function member_edit()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('phone_number', 'phone_number', 'required');
		$this->form_validation->set_rules('marital_status', 'marital_status', 'required');
		$this->form_validation->set_rules('occupation', 'occupation', 'required');
		$this->form_validation->set_rules('idcard_address', 'idcard_address', 'required');
		
		if ($this->input->post('password') == TRUE)
		{
			$this->form_validation->set_rules('password', 'password', 'required');
			$this->form_validation->set_rules('confirm_password', 'confirm_password', 'required');
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
			$param['marital_status'] = $this->input->post('marital_status');
			$param['occupation'] = $this->input->post('occupation');
			$param['idcard_address'] = replace_new_line($this->input->post('idcard_address'));
			
			if ($this->input->post('password') == TRUE)
			{
				$param['password'] = $this->input->post('password');
			}
			
			$query = $this->member_model->update($param);
			
			if ($query->code == 200)
			{
				$response =  array('type' => 'success');
			}
			else
			{
				$response =  array('type' => 'error');
			}
			
			echo json_encode($response);
			exit();
		}
	}
	
	function member_event()
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
			$code_member_religion = $this->config->item('code_member_religion');
			$code_member_shirt_size = $this->config->item('code_member_shirt_size');
			$result = $query->result;
			
			$temp = array();
			$temp['name'] = $result->name;
			$temp['email'] = $result->email;
			$temp['username'] = $result->username;
			$temp['replace_idcard_address'] = replace_new_line($result->idcard_address);
			$temp['idcard_address'] = $result->idcard_address;
			$temp['birth_place'] = $result->birth_place;
			$temp['birth_date'] = date('d M Y', strtotime($result->birth_date));
			$temp['point'] = $result->point;
			$temp['occupation'] = $result->occupation;
			$temp['marital_status'] = $result->marital_status;
			$temp['religion'] = $code_member_religion[$result->religion];
			$temp['phone_number'] = $result->phone_number;
			$temp['resi'] = $result->resi;
			$temp['member_card'] = $result->member_card;
			$temp['shirt_size'] = $code_member_shirt_size[$result->shirt_size];
			$temp['gender'] = $code_member_gender[$result->gender];
			$data['member'] = (object) $temp;
			$data['member_event'] = (object) $this->member_event();
		}
		
		$data['code_member_marital_status'] = $this->config->item('code_member_marital_status');
		$data['view_content'] = 'member/profile';
        $this->display_view('templates/frame', $data);
	}
}
