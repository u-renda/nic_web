<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('member_model');
		$this->load->model('member_transfer_model');
		$this->load->model('post_model');
    }

    function check_email()
    {
        $self = $this->input->post('selfemail');
		$input = strtolower($this->input->post('email'));
		$get = $this->member_model->info(array('email' => $input));
		
        if ($get->code == 200 && $self != $input)
        {
            $this->form_validation->set_message('check_email', 'Email sudah terdaftar.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    function check_email_recovery($email, $member_card)
    {
		$param = array();
		$param['email'] = $email;
		$param['member_card'] = $member_card;
		$param['status'] = 4;
        $result = $this->member_model->valid_recovery_password($param);
		
        if ($result->code == 200)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_email_recovery', 'Email atau no. member salah');
            return FALSE;
        }
    }

    function check_idcard_number()
    {
		$self = $this->input->post('selfidcard_number');
		$input = $this->input->post('idcard_number');
		$get = $this->member_model->info(array('idcard_number' => $input));
		
        if ($get->code == 200 && $self != $input)
        {
            $this->form_validation->set_message('check_idcard_number', 'Nomor ID card sudah terdaftar');
            return FALSE;
        }
        else
        {
            return TRUE;
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

    function check_name()
    {
        $self = $this->input->post('selfname');
		$input = strtolower($this->input->post('name'));
		$get = $this->member_model->info(array('name' => $input, 'status' => 4));
		
        if ($get->code == 200 && $self != $input)
        {
            $this->form_validation->set_message('check_name', 'Nama sudah terdaftar');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    function check_password($password, $member_card)
    {
        $result = $this->member_model->valid(array('member_card' => $member_card, 'password' => $password));
		
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

    function check_phone_number()
    {
        $self = $this->input->post('selfphone_number');
		$input = $this->input->post('phone_number');
		$get = $this->member_model->info(array('phone_number' => $input));
		
        if ($get->code == 200 && $self != $input)
        {
            $this->form_validation->set_message('check_phone_number', 'Nomor telp sudah terdaftar');
            return FALSE;
        }
        else
        {
            return TRUE;
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
		// Get 4 last post with image exist -> slider
		$param = array();
		$param['limit'] = 4;
		$param['sort'] = 'desc';
		$param['media_not'] = TRUE;
		$param['status'] = 1;
		$query = $this->post_model->lists($param);
		
		$slider = array();
		if ($query->code == 200)
		{
			foreach ($query->result as $row)
			{
				$media = $row->media;
				
				if ($row->media_type == 2)
				{
					// Pilih media dengan dimensi 1349x600
					$code_1349x600 = $this->config->item('code_1349x600');
					$explode = explode('.', $media);
					
					if(is_bool(LOCALHOST) || LOCALHOST == 'localhost')
					{
						$media = $explode[0].$code_1349x600['extra'].'.'.$explode[1];
					}
					else
					{
						$media = $explode[0].'.'.$explode[1].$code_1349x600['extra'].'.'.$explode[2];
					}
				}
				
				$temp = array();
				$temp['title'] = $row->title;
				$temp['media'] = $media;
				$slider[] = (object) $temp;
			}
		}
		
		$data = array();
		$data['slider'] = (object) $slider;
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
			
			// Pilih media dengan dimensi 350x350
			$media = $row->media;
			if ($row->media_type == 2)
			{
				$code_350x350 = $this->config->item('code_350x350');
				$explode = explode('.', $row->media);
				
				if(is_bool(LOCALHOST) || LOCALHOST == 'localhost')
				{
					$media = $explode[0].$code_350x350['extra'].'.'.$explode[1];
				}
				else
				{
					$media = $explode[0].'.'.$explode[1].$code_350x350['extra'].'.'.$explode[2];
				}
			}
			
			$temp = array();
			$temp['title'] = wordwrap($row->title, 33);
			$temp['slug'] = $row->slug;
			$temp['content'] = $content;
			$temp['created_date'] = date('j F Y', strtotime($row->created_date));
			$temp['media'] = $media;
			$temp['link'] = $link;
			$query2[] = (object) $temp;
		}
		
		return $query2;
	}
	
	function login()
	{
		if ($this->session->userdata('is_login') == TRUE || $this->config->item('login_mode') == FALSE) { redirect($this->config->item('link_index')); }
		
        $data = array();
		if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('member_card', 'No. Member', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required|callback_check_password['.$this->input->post('member_card').']');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['error'] = validation_errors();
			}
			else
			{
				$query = $this->member_model->info(array('member_card' => $this->input->post('member_card')));

				if ($query->code == 200)
				{
					$member = $query->result;
					
					$cached = array(
						'id_member'=> $member->id_member,
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
	
	function member_invalid()
	{
		$data = array();
		$query = $this->member_model->info(array('short_code' => $this->input->get_post('c')));
		
		if ($query->code == 200)
		{
			if ($query->result->status == 5)
			{
				if ($this->input->post('submit') == TRUE)
				{
					$this->load->library('form_validation');
					$this->form_validation->set_rules('idcard_type', 'tipe ID', 'required');
					$this->form_validation->set_rules('idcard_number', 'nomor ID', 'required|numeric|callback_check_idcard_number');
					$this->form_validation->set_rules('name', 'nama', 'required|callback_check_name');
					$this->form_validation->set_rules('gender', 'jenis kelamin', 'required');
					$this->form_validation->set_rules('birth_place', 'tempat lahir', 'required');
					$this->form_validation->set_rules('birth_date', 'tanggal lahir', 'required');
					$this->form_validation->set_rules('phone_number', 'nomor telp', 'required|numeric|callback_check_phone_number');
					$this->form_validation->set_rules('idcard_address', 'alamat sesuai ID', 'required');
					$this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_check_email');
					$this->form_validation->set_rules('shirt_size', 'ukuran baju', 'required');
					$this->form_validation->set_rules('shipment_address', 'alamat pengiriman', 'required');
					$this->form_validation->set_rules('id_provinsi', 'provinsi', 'required');
					$this->form_validation->set_rules('id_kota', 'kota', 'required');
					$this->form_validation->set_rules('postal_code', 'kode pos', 'required');
					$this->form_validation->set_rules('terms', 'terms', 'required');
					$this->form_validation->set_rules('idcard_photo', 'ID card foto', 'required', array('required' => '%s harus diisi. Pastikan Anda sudah membaca cara upload foto.'));
					$this->form_validation->set_rules('photo', 'foto diri', 'required', array('required' => '%s harus diisi. Pastikan Anda sudah membaca cara upload foto.'));
					
					if ($this->form_validation->run() == FALSE)
					{
						$response =  array('msg' => validation_errors(), 'type' => 'error');
						echo json_encode($response);
						exit();
					}
					else
					{
						$param = array();
						$param['id_member'] = $query->result->id_member;
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
						$param['shirt_size'] = $this->input->post('shirt_size');
						$param['status'] = 1;
						$param['idcard_photo'] = $this->input->post('idcard_photo');
						$param['photo'] = $this->input->post('photo');
						$query2 = $this->member_model->update($param);
						
						if ($query2->code == 200)
						{
							$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_register_success'));
						}
						else
						{
							$response =  array('msg' => 'Create data failed', 'type' => 'error');
						}
						
						echo json_encode($response);
						exit();
					}
				}
		
				$data['result'] = $query->result;
				$data['provinsi_lists'] = get_provinsi_lists(array('limit' => 40))->result;
				$data['code_member_idcard_type'] = $this->config->item('code_member_idcard_type');
				$data['code_member_marital_status'] = $this->config->item('code_member_marital_status');
				$data['code_member_religion'] = $this->config->item('code_member_religion');
				$this->display_view('member/member_invalid', $data);
			}
			else
			{
				$this->display_view('not_found', $data);
			}
		}
		else
		{
			$this->display_view('not_found', $data);
		}
	}
	
	function recovery_password()
	{
		$data = array();
		$success = FALSE;
        if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_message('required', '%s harus diisi');
			$this->form_validation->set_rules('member_card', 'no member', 'required');
			$this->form_validation->set_rules('email', 'email', 'required|callback_check_email_recovery['.$this->input->post('member_card').']');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['error'] = validation_errors();
			}
			else
			{
				// Kirim email recovery password
				$param = array();
				$param['email'] = $this->input->post('email');
				$param['member_card'] = $this->input->post('member_card');
				$query = $this->member_model->send_recovery_password($param);
				
				if ($query->code == 200)
				{
					$success = TRUE;
				}
				else
				{
					$this->form_validation->set_message('send_email', 'Maaf email tidak berhasil dikirim. Mohon dicoba lagi.');
				}
			}
		}
		
		$data['success'] = $success;
		$this->display_view('home/recovery_password', $data);
	}
	
	function register()
	{
		if ($this->session->userdata('is_login') == TRUE || $this->config->item('register_mode') == FALSE) { redirect($this->config->item('link_index')); }
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('idcard_type', 'tipe ID', 'required');
			$this->form_validation->set_rules('idcard_number', 'nomor ID', 'required|numeric|callback_check_idcard_number');
			$this->form_validation->set_rules('name', 'nama', 'required|callback_check_name');
			$this->form_validation->set_rules('gender', 'jenis kelamin', 'required');
			$this->form_validation->set_rules('birth_place', 'tempat lahir', 'required');
			$this->form_validation->set_rules('birth_date', 'tanggal lahir', 'required');
			$this->form_validation->set_rules('phone_number', 'nomor telp', 'required|numeric|callback_check_phone_number');
			$this->form_validation->set_rules('idcard_address', 'alamat sesuai ID', 'required');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_check_email');
			$this->form_validation->set_rules('shirt_size', 'ukuran baju', 'required');
			$this->form_validation->set_rules('shipment_address', 'alamat pengiriman', 'required');
			$this->form_validation->set_rules('id_provinsi', 'provinsi', 'required');
			$this->form_validation->set_rules('id_kota', 'kota', 'required');
			$this->form_validation->set_rules('postal_code', 'kode pos', 'required');
			$this->form_validation->set_rules('terms', 'terms', 'required');
			$this->form_validation->set_rules('idcard_photo', 'ID card foto', 'required', array('required' => '%s harus diisi. Pastikan Anda sudah membaca cara upload foto.'));
			$this->form_validation->set_rules('photo', 'foto diri', 'required', array('required' => '%s harus diisi. Pastikan Anda sudah membaca cara upload foto.'));
			
			if ($this->form_validation->run() == FALSE)
			{
				$response =  array('msg' => validation_errors(), 'type' => 'error');
				echo json_encode($response);
				exit();
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
				$param['shirt_size'] = $this->input->post('shirt_size');
				$param['status'] = 1;
				$param['idcard_photo'] = $this->input->post('idcard_photo');
				$param['photo'] = $this->input->post('photo');
				$query = $this->member_model->create($param);
				
				if ($query->code == 200)
				{
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_register_success'));
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
	
	function reset_password()
	{
		$data = array();
		$data['code'] = $this->input->get('c');
		
		$success = FALSE;
		
		if ($data['code'] == TRUE)
		{
			$query2 = $this->member_model->info(array('short_code' => $data['code']));
			
			if ($query2->code == 200)
			{
				if ($this->input->post('submit') == TRUE)
				{
					$this->load->library('form_validation');
					$this->form_validation->set_message('required', '%s harus diisi');
					$this->form_validation->set_message('min_length', '%s minimum 6 karakter');
					$this->form_validation->set_message('matches', '%s tidak sama dengan Password');
					$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
					$this->form_validation->set_rules('passconf', 'Ulangi password', 'required|min_length[6]|matches[password]');
					
					if ($this->form_validation->run() == FALSE)
					{
						$data['error'] = validation_errors();
					}
					else
					{
						$param = array();
						$param['id_member'] = $query2->result->id_member;
						$param['password'] = $this->input->post('password');
						$query = $this->member_model->update($param);
						
						if ($query->code == 200)
						{
							$success = TRUE;
						}
						else
						{
							$data['error'] = 'Reset password failed.';
						}
					}
				}
				
				$data['success'] = $success;
				$this->display_view('home/reset_password', $data);
			}
			else
			{
				$this->display_view('not_found', $data);
			}
		}
		else
		{
			$this->display_view('not_found', $data);
		}
	}
	
	function transfer_confirmation()
	{
		$data = array();
		$data['short_code'] = $this->input->get_post('c');
		
		if ($data['short_code'] == TRUE)
		{
			$query = $this->member_model->info(array('short_code' => $data['short_code']));
			
			if ($query->code == 200 && $query->result->status == 2)
			{
				$param = array();
				$param['id_member'] = $query->result->id_member;
				$param['type'] = 1;
				$query2 = $this->member_transfer_model->lists($param);
				
				if ($query2->code == 200)
				{
					foreach ($query2->result as $row)
					{
						$result = array();
						$result['id_member_transfer'] = $row->id_member_transfer;
						$result['total'] = $row->total;
					}
					
					if ($this->input->post('submit') == TRUE)
					{
						$this->load->library('form_validation');
						$this->form_validation->set_rules('total', 'total', 'required');
						$this->form_validation->set_rules('date', 'tanggal transfer', 'required');
						$this->form_validation->set_rules('account_name', 'pemilik rekening', 'required');
						$this->form_validation->set_rules('account_name', 'pemilik rekening', 'required');
						$this->form_validation->set_rules('photo', 'bukti transfer', 'required', array('required' => '%s harus diisi. Pastikan Anda sudah membaca cara upload foto.'));
						
						if ($this->form_validation->run() == TRUE)
						{
							$param2 = array();
							$param2['id_member_transfer'] = $this->input->post('id_member_transfer');
							$param2['date'] = date('Y-m-d', strtotime($this->input->post('date')));
							$param2['photo'] = $this->input->post('photo');
							$param2['account_name'] = $this->input->post('account_name');
							$param2['other_information'] = $this->input->post('other_information');
							$param2['status'] = 2;
							$query3 = $this->member_transfer_model->update($param2);
							
							if ($query3->code == 200)
							{
								$param3 = array();
								$param3['id_member'] = $query->result->id_member;
								$param3['status'] = 3;
								$query4 = $this->member_model->update($param3);
							
								$response =  array('msg' => 'Confirmation data success', 'type' => 'success', 'location' => $this->config->item('link_transfer_confirmation_success'));
							}
							else
							{
								$response =  array('msg' => 'Confirmation data failed', 'type' => 'error');
							}
							
							echo json_encode($response);
							exit();
						}
					}
					
					$data['result'] = (object) $result;
					$data['view_content'] = 'home/transfer_confirmation';
					$this->display_view('templates/frame', $data);
				}
				else
				{
					$this->display_view('not_found', $data);
				}
			}
			else
			{
				$this->display_view('not_found', $data);
			}
		}
		else
		{
			$this->display_view('not_found', $data);
		}
	}
	
	function transfer_confirmation_success()
	{
		$data = array();
		$data['view_content'] = 'home/transfer_confirmation_success';
		$this->display_view('templates/frame', $data);
	}
}
