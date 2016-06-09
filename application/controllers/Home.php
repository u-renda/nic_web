<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('member_model');
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
		$data['agnezmo'] = $this->get_agnezmo();
		$data['nic'] = $this->get_nic();
		$data['view_content'] = 'home/home';
        $this->display_view('templates/frame', $data);
	}
	
	function get_agnezmo()
	{
		// Get 4 last post (type = agnezmo)
		$param = array();
		$param['limit'] = 4;
		$param['sort'] = 'desc';
		$param['type'] = 2;
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
			
			$temp = array();
			$temp['title'] = wordwrap($row->title, 33);
			$temp['slug'] = $row->slug;
			$temp['content'] = $content;
			$temp['created_date'] = date('j F Y', strtotime($row->created_date));
			$temp['media'] = $row->media;
			$query2[] = (object) $temp;
		}
		
		return $query2;
	}
	
	function get_nic()
	{
		// Get 4 last post (type = nic)
		$param = array();
		$param['limit'] = 4;
		$param['sort'] = 'desc';
		$param['type'] = 1;
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
			
			$temp = array();
			$temp['title'] = wordwrap($row->title, 33);
			$temp['slug'] = $row->slug;
			$temp['content'] = $content;
			$temp['created_date'] = date('j F Y', strtotime($row->created_date));
			$temp['media'] = $row->media;
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
				$query = $this->member_model->info(array('username' => $this->input->post('username')));

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
        $this->display_view('home/recovery_password');
	}
	
	function register()
	{
		if ($this->input->post('submit') == TRUE)
		{
			echo "ada";die();
			//$this->load->library('form_validation');
			//$this->form_validation->set_rules('username', 'Username', 'required');
		}
		
		
		$data = array();
		$data['provinsi_lists'] = get_provinsi_lists(array('limit' => 40))->result;
		$data['code_idcard_type'] = $this->config->item('code_idcard_type');
		$data['code_marital_status'] = $this->config->item('code_marital_status');
		$data['code_religion'] = $this->config->item('code_religion');
        $this->display_view('home/register', $data);
	}
}
