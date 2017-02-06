<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_validate extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('member_model');
		$this->load->model('member_transfer_model');
    }
	
	function check_member_idcard_number()
	{
		$self = $this->input->post('selfidcard_number');
		$input = $this->input->post('idcard_number');
		$get = $this->member_model->info(array('idcard_number' => $input));
		
        if ($get->code == 200 && $self != $input)
        {
            echo 'false';
        }
        else
        {
            echo 'true';
        }
	}
	
	function check_kota_lists()
	{
		$id_provinsi = $this->input->post('id_provinsi');
		
		$result = get_kota_lists(array('id_provinsi' => $id_provinsi, 'limit' => 700));
	
		if ($result->code == 200)
		{
			$data = array();
			$data['kota_lists'] = $result->result;
			$this->load->view('select_options_kota', $data);
		}
		else
		{
            echo 'false';
        }
	}
	
	function check_member_email()
	{
		$self = $this->input->post('selfemail');
		$input = strtolower($this->input->post('email'));
		$get = $this->member_model->info(array('email' => $input, 'status' => 4));
		
        if ($get->code == 200 && $self != $input)
        {
            echo 'false';
        }
        else
        {
            echo 'true';
        }
	}
	
	function check_member_name()
	{
		$self = $this->input->post('selfname');
		$input = strtolower($this->input->post('name'));
		$get = $this->member_model->info(array('name' => $input, 'status' => 4));
		
        if ($get->code == 200 && $self != $input)
        {
            echo 'false';
        }
        else
        {
            echo 'true';
        }
	}
	
	function check_member_phone_number()
	{
		$self = $this->input->post('selfphone_number');
		$input = $this->input->post('phone_number');
		$get = $this->member_model->info(array('phone_number' => $input));
		
        if ($get->code == 200 && $self != $input)
        {
            echo 'false';
        }
        else
        {
            echo 'true';
        }
	}
	
	function check_member_transfer_total()
	{
		$self = $this->input->post('selftotal');
		$input = $this->input->post('total');
		
        if ($self != $input)
        {
            echo 'false';
        }
        else
        {
            echo 'true';
        }
	}
}
