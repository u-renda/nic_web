<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('member_model');
    }

    function check_email()
    {
        $result = $this->member_model->info(array('email' => $this->input->post('email')));
		
        if ($result->code == 200)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_email', 'Email tidak terdaftar atau Anda belum resmi menjadi member.');
            return FALSE;
        }
    }
	
    function check_idcard_photo()
    {
        if (isset($_FILES['idcard_photo']))
        {
            if ($_FILES["idcard_photo"]["error"] == 0)
            {
                $name = md5(basename($_FILES["idcard_photo"]["name"]) . date('Y-m-d H:i:s'));
                $target_dir = UPLOAD_MEMBER_HOST;
                $imageFileType = strtolower(pathinfo($_FILES["idcard_photo"]["name"],PATHINFO_EXTENSION));
                
				$param2 = array();
                $param2['target_file'] = UPLOAD_FOLDER . $name . '.' . $imageFileType;
                $param2['imageFileType'] = $imageFileType;
                $param2['tmp_name'] = $_FILES["idcard_photo"]["tmp_name"];
                $param2['tmp_file'] = $target_dir . $name . '.' . $imageFileType;
                $param2['size'] = $_FILES["idcard_photo"]["size"];
                $check_image = check_image($param2);
				
                if ($check_image == 'true')
                {
                    return TRUE;
                }
                else
                {
                    $this->form_validation->set_message('check_idcard_photo', $check_image);
                    return FALSE;
                }
            }
			else
			{
				$this->form_validation->set_message('check_idcard_photo', 'ID card foto error');
                return FALSE;
			}
        }
    }

    function check_password($password, $username)
    {
        $result = $this->member_model->valid(array('username' => $username, 'password' => $password));
		
        if ($result->code == 200)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_password', 'Wrong Username or Password');
            return FALSE;
        }
    }
	
    function check_photo()
    {
        if (isset($_FILES['photo']))
        {
			if ($_FILES["photo"]["error"] == 0)
            {
                $name = md5(basename($_FILES["photo"]["name"]) . date('Y-m-d H:i:s'));
                $target_dir = UPLOAD_MEMBER_HOST;
                $imageFileType = strtolower(pathinfo($_FILES["photo"]["name"],PATHINFO_EXTENSION));
                
				$param2 = array();
                $param2['target_file'] = UPLOAD_FOLDER . $name . '.' . $imageFileType;
                $param2['imageFileType'] = $imageFileType;
                $param2['tmp_name'] = $_FILES["photo"]["tmp_name"];
                $param2['tmp_file'] = $target_dir . $name . '.' . $imageFileType;
                $param2['size'] = $_FILES["photo"]["size"];
                $check_image = check_image($param2);
				
                if ($check_image == 'true')
                {
                    return TRUE;
                }
                else
                {
                    $this->form_validation->set_message('check_photo', $check_image);
                    return FALSE;
                }
            }
			else
			{
				$this->form_validation->set_message('check_photo', 'Foto error');
                return FALSE;
			}
        }
    }
	
	function index()
	{
		// Get 4 last post with image exist
		$param = array();
		$param['limit'] = 4;
		$param['sort'] = 'desc';
		$param['media_not'] = TRUE;
		$param['status'] = 1;
		$query = get_post_lists($param);
		
		$data = array();
		$data['slider'] = $query->result;
		$data['latest'] = $this->get_latest();
		$data['view_content'] = 'home/home';
        $this->display_view('templates/frame', $data);
	}
	
	function get_latest()
	{
		// Get 4 latest post (type = all)
		$param = array();
		$param['limit'] = 4;
		$param['sort'] = 'desc';
		$param['status'] = 1;
		$query = get_post_lists($param);
		
		$query2 = array();
		foreach ($query->result as $row)
		{
			// Decode special character into HTML tag
			$decode = html_entity_decode($row->content);
			
			// Remove HTML tag
			$remove = strip_tags($decode);
			
			// Get part of the string
			$content = substr($remove, 0, 300);
			
			// Get link for type
			if ($row->type == 1)
			{
				$link = $this->config->item('link_pages_nic');
			}
			else
			{
				$link = $this->config->item('link_pages_agnezmo');
			}
			
			$temp = array();
			$temp['title'] = wordwrap($row->title, 33);
			$temp['slug'] = $row->slug;
			$temp['content'] = $content;
			$temp['created_date'] = date('j F Y', strtotime($row->created_date));
			$temp['media'] = $row->media;
			$temp['link'] = $link;
			$query2[] = (object) $temp;
		}
		
		return $query2;
	}
	
	function login()
	{
		if ($this->session->userdata('is_login') == TRUE) { redirect($this->config->item('link_index')); }
		
        $data = array();
		if ($this->input->cookie('username') != '' && $this->input->cookie('password') != '')
		{
			$username = decode($this->input->cookie('username'), $this->config->item('cookie_key'));
			$getdata = $this->member_model->info(array('username' => $username));
			
			if ($getdata->code == 200)
			{
				$member = $getdata->result;
				$check_pass = sha1($member->password);
				
				if ($check_pass == $this->input->cookie('password'))
				{
					$cached = array(
						'id_member'=> $member->id_member,
						'username'=> $member->username,
						'name'=> $member->name,
						'email'=> $member->email,
						'photo'=> $member->photo,
						'is_login' => TRUE
					);
					
					// Set session
					$this->session->set_userdata($cached);
					
					redirect($this->config->item('link_index'));
				}
			}
		}
		elseif ($this->input->post('submit'))
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required|callback_check_password['.$this->input->post('username').']');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['error'] = validation_errors();
			}
			else
			{
				$param = array();
				$param['username'] = $this->input->post('username');
				$param['password'] = $this->input->post('password');
				$query = $this->member_model->valid($param);

				if ($query->code == 200)
				{
					$member = $query->result;
					$code_admin_role = $this->config->item('code_admin_role');
					
					$cached = array(
						'id_member'=> $member->id_member,
						'username'=> $member->username,
						'name'=> $member->name,
						'email'=> $member->email,
						'photo'=> $member->photo,
						'is_login' => TRUE
					);
					
					// Set session
					$this->session->set_userdata($cached);

					// Set cookie
					if ($this->input->post('logged'))
					{
						$cookie_user = encode($username, $this->config->item('cookie_key'));
						$cookie_pass = sha1($admin->password);
						
						$cookie_username = array(
							'name' => 'username',
							'value' => ''.$cookie_user.'',
							'expire' => '1728000'
						);
						$cookie_password = array(
							'name' => 'password',
							'value' => ''.$cookie_pass.'',
							'expire' => '1728000'
						);
						
						$this->input->set_cookie($cookie_username);
						$this->input->set_cookie($cookie_password);
					}
					
					redirect($this->config->item('link_index'));
				}
			}
		}

        $this->display_view('home/login');
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		$this->session->unset_userdata('id_member');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('photo');
		$this->session->unset_userdata('is_login');
		
		delete_cookie('username');
		delete_cookie('password');
		
        redirect($this->config->item('link_index'));
	}
	
	function recovery_password()
	{
		$data = array();
		$success = FALSE;
        if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email', 'email', 'required|callback_check_email');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['error'] = validation_errors();
			}
			else
			{
				// Kirim email recovery password
				
				$success = TRUE;
			}
		}
		
		$data['success'] = $success;
		$this->display_view('home/recovery_password', $data);
	}
	
	function register()
	{
		if ($this->session->userdata('is_login') == TRUE) { redirect($this->config->item('link_index')); }
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('idcard_type', 'tipe ID', 'required');
			$this->form_validation->set_rules('idcard_number', 'nomor ID', 'required');
			$this->form_validation->set_rules('marital_status', 'status perkawinan', 'required');
			$this->form_validation->set_rules('religion', 'agama', 'required');
			$this->form_validation->set_rules('occupation', 'pekerjaan', 'required');
			$this->form_validation->set_rules('name', 'nama', 'required');
			$this->form_validation->set_rules('gender', 'jenis kelamin', 'required');
			$this->form_validation->set_rules('birth_place', 'tempat lahir', 'required');
			$this->form_validation->set_rules('birth_date', 'tanggal lahir', 'required');
			$this->form_validation->set_rules('phone_number', 'nomor telp', 'required');
			$this->form_validation->set_rules('idcard_address', 'alamat sesuai ID', 'required');
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('shirt_size', 'ukuran baju', 'required');
			$this->form_validation->set_rules('shipment_address', 'alamat pengiriman', 'required');
			$this->form_validation->set_rules('id_provinsi', 'provinsi', 'required');
			$this->form_validation->set_rules('id_kota', 'kota', 'required');
			$this->form_validation->set_rules('postal_code', 'kode pos', 'required');
			$this->form_validation->set_rules('terms', 'terms', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['error'] = validation_errors();
			}
			else
			{
				$param = array();
				$param['id_kota'] = $this->input->post('id_kota');
				$param['name'] = $this->input->post('name');
				$param['email'] = $this->input->post('email');
				$param['idcard_type'] = $this->input->post('idcard_type');
				$param['idcard_number'] = $this->input->post('idcard_number');
				$param['idcard_address'] = $this->input->post('idcard_address');
				$param['shipment_address'] = $this->input->post('shipment_address');
				$param['postal_code'] = $this->input->post('postal_code');
				$param['gender'] = $this->input->post('gender');
				$param['phone_number'] = $this->input->post('phone_number');
				$param['birth_place'] = $this->input->post('birth_place');
				$param['birth_date'] = date('Y-m-d', strtotime($this->input->post('birth_date')));
				$param['marital_status'] = $this->input->post('marital_status');
				$param['occupation'] = $this->input->post('occupation');
				$param['religion'] = $this->input->post('religion');
				$param['shirt_size'] = $this->input->post('shirt_size');
				$param['status'] = 1;
				$query = $this->member_model->create($param);
				
				if ($query->code == 200)
				{
					// id_member dimasukin ke session
					$this->session->set_userdata(array('id_member' => $query->result->id_member));
					
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_register_upload'));
				}
				else
				{
					$response =  array('msg' => 'Create data failed', 'type' => 'error');
				}
				
				echo json_encode($response);
				exit();
			}
		}
		
		$data = array();
		$data['provinsi_lists'] = get_provinsi_lists(array('limit' => 40))->result;
		$data['code_member_idcard_type'] = $this->config->item('code_member_idcard_type');
		$data['code_member_marital_status'] = $this->config->item('code_member_marital_status');
		$data['code_member_religion'] = $this->config->item('code_member_religion');
        $this->display_view('home/register', $data);
	}
	
	function register_success()
	{
		// destroy session id_member
		$this->session->sess_destroy();
		$this->session->unset_userdata('id_member');
		
		$data = array();
		$data['view_content'] = 'home/register_success';
		$this->display_view('templates/frame', $data);
	}
	
	function register_upload()
	{
		$id = $this->session->userdata('id_member');
		
		if ($id == FALSE) { redirect($this->config->item('link_index')); }
		
		if ($this->input->post('submit_upload') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('idcard_photo', 'foto ID', 'callback_check_idcard_photo');
			$this->form_validation->set_rules('photo', 'foto', 'callback_check_photo');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['error'] = validation_errors();
			}
			else
			{
				$photo = '';
				$idcard_photo = '';
				if (isset($_FILES['photo']))
                {
                    if ($_FILES["photo"]["error"] == 0)
                    {
                        $name = md5(basename($_FILES["photo"]["name"]) . date('Y-m-d H:i:s'));
                        $imageFileType = strtolower(pathinfo($_FILES["photo"]["name"],PATHINFO_EXTENSION));
                        $photo = UPLOAD_MEMBER_HOST . $name . '.' . $imageFileType;
                    }
                }
				if (isset($_FILES['idcard_photo']))
                {
                    if ($_FILES["idcard_photo"]["error"] == 0)
                    {
                        $name = md5(basename($_FILES["idcard_photo"]["name"]) . date('Y-m-d H:i:s'));
                        $imageFileType = strtolower(pathinfo($_FILES["idcard_photo"]["name"],PATHINFO_EXTENSION));
                        $idcard_photo = UPLOAD_MEMBER_HOST . $name . '.' . $imageFileType;
                    }
                }
				
				$param = array();
				$param['id_member'] = $id;
				$param['idcard_photo'] = $idcard_photo;
				$param['photo'] = $photo;
				$query = $this->member_model->update($param);
				
				if ($query->code == 200)
				{
					redirect($this->config->item('link_register_success'));
				}
			}
		}
		
		$data = array();
		$data['id'] = $id;
		$this->display_view('home/register_upload', $data);
	}
}
