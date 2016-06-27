<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_validate extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('member_model');
    }
	
	function check_idcard_number()
	{
		$idcard_number = $this->input->post('idcard_number');
		
		$result = $this->member_model->info(array('idcard_number' => $idcard_number));
	
		if ($result->code == 200)
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
		
		$result = get_kota_lists(array('id_provinsi' => $id_provinsi, 'limit' => 100));
	
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
		$email = $this->input->post('email');
		
		$result = $this->member_model->info(array('email' => $email));
	
		if ($result->code == 200)
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
		$name = $this->input->post('name');
		
		$result = $this->member_model->info(array('name' => $name));
	
		if ($result->code == 200)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
}
