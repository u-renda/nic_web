<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('check_image')) {
    function check_image($param)
    {
        $CI =& get_instance();
		
        // Check if image file is a actual image or fake image
        $check = @getimagesize($param["tmp_name"]);
		
        if($check === FALSE)
        {
            $msg = "File is not an image.";
            return $msg;
        }
        else
        {
            // Check if file already exists
            if (file_exists($param['tmp_file']))
            {
                $msg = "Sorry, file already exists.";
                return $msg;
            }
            else
            {
                // Check file size
                if ($param["size"] > '2097152')
                {
                    $msg = "Sorry, your file is too large.";
					return $msg;
                }
                else
                {
                    // Allow certain file formats
                    if($param['imageFileType'] != "jpg" && $param['imageFileType'] != "png" && $param['imageFileType'] != "jpeg" && $param['imageFileType'] != "gif" )
                    {
                        $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        return $msg;
                    }
                    else
                    {
                        $param['image_width'] = $check[0];
						
                        // Save & resize image berdasarkan width-nya
                        $save_resize = save_resize($param, 500);
						
                        if ($save_resize == TRUE)
                        {
							$msg = 'true';
							return $msg;
                        }
                        else
                        {
                            $msg = "Sorry, there was an error uploading your file.";
							return $msg;
                        }
                    }
                }
            }
        }
    }
}

/*
+-------------------------------------+
    Name: color_member_point_status
    Purpose: memberi label warna untuk member point status
    @param return : label warna sesuai dengan status
+-------------------------------------+
*/
if ( ! function_exists('color_member_point_status')) {
	function color_member_point_status($status)
	{
		$CI =& get_instance();
		$code_member_point_status = $CI->config->item('code_member_point_status');
		
		if ($status == 1)
		{
			$label = '<span class="label label-danger">'.$code_member_point_status[$status].'</span>';
		}
		elseif ($status == 2)
		{
			$label = '<span class="label label-success">'.$code_member_point_status[$status].'</span>';
		}
		elseif ($status == 4)
		{
			$label = '<span class="label label-dark">'.$code_member_point_status[$status].'</span>';
		}
		else
		{
			$label = '<span class="label label-default">'.$code_member_point_status[$status].'</span>';
		}
		
		return $label;
	}
}

/*
+-------------------------------------+
    Name: color_member_transfer_status
    Purpose: memberi label warna untuk member transfer status
    @param return : label warna sesuai dengan status
+-------------------------------------+
*/
if ( ! function_exists('color_member_transfer_status')) {
	function color_member_transfer_status($status)
	{
		$CI =& get_instance();
		$code_member_transfer_status = $CI->config->item('code_member_transfer_status');
		
		if ($status == 1)
		{
			$label = '<span class="label label-danger">'.$code_member_transfer_status[$status].'</span>';
		}
		elseif ($status == 2)
		{
			$label = '<span class="label label-success">'.$code_member_transfer_status[$status].'</span>';
		}
		else
		{
			$label = '<span class="label label-default">'.$code_member_transfer_status[$status].'</span>';
		}
		
		return $label;
	}
}

/*
+-------------------------------------+
    Name: decode
    Purpose: ungenerate value
    @param return : ungenerated value
+-------------------------------------+
*/
if ( ! function_exists('decode')) {
	function decode($value, $key)
	{ 
		return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($value), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
	}
}

/*
+-------------------------------------+
    Name: encode
    Purpose: generate value
    @param return : generated value
+-------------------------------------+
*/
if ( ! function_exists('encode')) {
	function encode($value, $key)
	{ 
		return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $value, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
	}
}

/*
+-------------------------------------+
    Name: get_admin_lists
    Purpose: mendapatkan data admin
    @param return : data admin atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_admin_lists')) {
    function get_admin_lists($param)
    {
        $CI =& get_instance();
        $CI->load->model('admin_model');

        $query = $CI->admin_model->lists($param);
		
		if ($query->code == 200)
		{
			return $query;
		}
    }
}

/*
+-------------------------------------+
    Name: get_cached
    Purpose: mendapatkan data cached berdasarkan cookie
    @param return : data cached atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_cached')) {
    function get_cached()
    {
        $CI =& get_instance();

        $cookie = hex2bin($CI->input->cookie('nic_admin', TRUE));

        if(is_array($cookie))
        {
            return $cookie;
        }
        else
        {
            return FALSE;
        }
    }
}

/*
+-------------------------------------+
    Name: get_email_template
    Purpose: mendapatkan data email template
    @param return : data emal template atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_email_template')) {
    function get_email_template($param)
    {
        $CI =& get_instance();
        $CI->load->model('preferences_model');

        $query = $CI->preferences_model->lists($param);
		
		if ($query->code == 200)
		{
			return $query;
		}
    }
}

/*
+-------------------------------------+
    Name: get_email_template_info
    Purpose: memasukkan data ke email template
    @param return : data emal template atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_email_template_info')) {
    function get_email_template_info($param, $member)
    {
        $CI =& get_instance();
        $CI->load->model('member_model');
        $CI->load->model('preferences_model');

        $query = $CI->preferences_model->info($param);
		
        if ($query->code == 200)
        {
            $email_content = $query->result->value;

            if ($param['key'] == 'email_req_transfer')
            {
                $query3 = $CI->kota_model->info(array('id_kota' => $member->id_kota));
                $query4 = $CI->preferences_model->info(array('key' => 'unique_trf_id'));
                $registration_fee = $CI->config->item('registration_fee');
                $delivery_cost = '';
                $unique_code = '';

                if ($query3->code == 200)
                {
                    $delivery_cost = $query3->result->price;
                }

                if ($query4->code == 200)
                {
                    $unique_code = $query4->result->value;
                }

                $content = array();
                $content['member_name'] = ucwords($member->name);
                $content['registration_fee'] = number_format($registration_fee, 0, '', '.');
                $content['delivery_cost'] = number_format($delivery_cost, 0, '', '.');
                $content['unique_code'] = $unique_code;
                $content['total_transfer'] = number_format($registration_fee + $delivery_cost + $unique_code, 0, '', '.');
                $content['link_web_transfer'] = $CI->config->item('link_web_transfer');

                foreach ($content as $key => $value)
                {
                    $k = "{" . $key . "}";
                    $email_content = str_replace($k, $value, $email_content);
                }
            }

            return $email_content;
        }
        else
        {
            return FALSE;
        }
    }
}

/*
+-------------------------------------+
    Name: get_faq_lists
    Purpose: mendapatkan data FAQ
    @param return : data FAQ atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_faq_lists')) {
    function get_faq_lists($param)
    {
        $CI =& get_instance();
        $CI->load->model('faq_model');
		
        $query = $CI->faq_model->lists($param);
		
		if ($query->code == 200)
		{
			return $query;
		}
    }
}

/*
+-------------------------------------+
    Name: get_kota_lists
    Purpose: mendapatkan data kota dan ongkir
    @param return : data kota dan ongkir atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_kota_lists')) {
    function get_kota_lists($param)
    {
        $CI =& get_instance();
        $CI->load->model('kota_model');
		
        $query = $CI->kota_model->lists($param);
		
		if ($query->code == 200)
		{
			return $query;
		}
		else
		{
			return FALSE;
		}
    }
}

/*
+-------------------------------------+
    Name: get_member
    Purpose: mendapatkan data member
    @param return : data member atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_member')) {
    function get_member($param)
    {
        $CI =& get_instance();
        $CI->load->model('member_model');
		
        $query = $CI->member_model->lists($param);
		
		if ($query->code == 200)
		{
			return $query;
		}
    }
}

/*
+-------------------------------------+
    Name: get_member_card
    Purpose: mendapatkan data member card
    @param return : data member card
+-------------------------------------+
*/
if ( ! function_exists('get_member_card')) {
    function get_member_card($param)
    {
        /* Format member card
		 * 2 digit = bulan lahir
		 * 2 digit = tahun lahir
		 * 1 digit = jenis kelamin
		 * 1 digit = inisial pakai apa daftarnya
		 * 1 digit = admin inisial
		 * 2 digit = tahun sekarang
		 * 5 digit = member number
		 */
		 
		$CI =& get_instance();

		$queue_num = $param['member_number'];
		
		if (strlen($param['member_number']) == 1)
		{
			$queue_num = "0000" . $param['member_number'];
		}
		elseif (strlen($param['member_number']) == 2)
		{
			$queue_num = "000" . $param['member_number'];
		}
		else if (strlen($param['member_number']) == 3)
		{
			$queue_num = "00" . $param['member_number'];
		}
		else if (strlen($param['member_number']) == 4)
		{
			$queue_num = "0" . $param['member_number'];
		}
		
		if ($param['gender'] == 1)
		{
			$gender = 'F';
		}
		else
		{
			$gender = 'M';
		}
		
		$birth_month = date('m', strtotime($param['birth_date']));
		$birth_year = date('y', strtotime($param['birth_date']));
		$now_year = date('y');
		
		$member_card = $birth_month.$birth_year.$gender.'W'.$CI->session->userdata('admin_initial').$now_year.$queue_num;
		
		return $member_card;
    }
}

/*
+-------------------------------------+
    Name: get_member_number
    Purpose: mendapatkan no member pada saat approved data
    @param return : no member atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_member_number')) {
    function get_member_number()
    {
        $CI =& get_instance();
        $CI->load->model('member_model');
		
		$param = array();
		$param['status'] = 4;
		$param['order'] = 'member_number';
		$param['sort'] = 'desc';
		$param['limit'] = 1;
        $query = $CI->member_model->lists($param);
		
		if ($query->code == 200)
		{
			foreach ($query->result as $row)
			{
				$member_number = $row->member_number;
			}
			
			$member_number++;
			return $member_number;
		}
		else
		{
			return FALSE;
		}
    }
}

/*
+-------------------------------------+
    Name: get_member_username
    Purpose: mendapatkan data username
    @param return : data username
+-------------------------------------+
*/
if ( ! function_exists('get_member_username')) {
    function get_member_username($name)
    {
        $CI =& get_instance();
        
        $date = date('dm');
        $name = str_replace(" ", "", $name);
		$name = substr($name, 0, 8);
		$username = $name.$date;
		
		return $username;
    }
}

/*
+-------------------------------------+
    Name: get_post_lists
    Purpose: mendapatkan data post (artikel)
    @param return : data post atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_post_lists')) {
    function get_post_lists($param)
    {
        $CI =& get_instance();
        $CI->load->model('post_model');
		
        $query = $CI->post_model->lists($param);
		
		if ($query->code == 200)
		{
			return $query;
		}
		else
		{
			return FALSE;
		}
    }
}

/*
+-------------------------------------+
    Name: get_provinsi_lists
    Purpose: mendapatkan data provinsi
    @param return : data provinsi atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_provinsi_lists')) {
    function get_provinsi_lists($param)
    {
        $CI =& get_instance();
        $CI->load->model('provinsi_model');

        $query = $CI->provinsi_model->lists($param);
		
		if ($query->code == 200)
		{
			return $query;
		}
		else
		{
			return FALSE;
		}
    }
}

/*
+-------------------------------------+
    Name: get_secret_santa
    Purpose: mendapatkan data email template
    @param return : data emal template atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_secret_santa')) {
    function get_secret_santa($param)
    {
        $CI =& get_instance();
        $CI->load->model('secret_santa_model');

        $query = $CI->secret_santa_model->lists($param);
		
		if ($query->code == 200)
		{
			return $query;
		}
    }
}

/*
+-------------------------------------+
    Name: is_logged_in
    Purpose: melakukan pengecekan apakah ada user yang login
    @param return : TRUE atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('is_logged_in')) {
    function is_logged_in()
    {
        $CI =& get_instance();
        $valid = false;

        $cookie = unserialize(hex2bin($CI->input->cookie('nic_admin', TRUE)));

        if(is_array($cookie))
        {
            $results = $CI->memcached_library->get('ik_lifestyle_'.$cookie['id_user']);

            if($results['is_login'] && $results['salt'] == $cookie['salt'])
            {
                $valid = true;
            }
        }

        return $valid;
    }
}

if ( ! function_exists('pages_pagination'))
{
	function pages_pagination($param)
	{
		$CI =& get_instance();
		$CI->load->library('pagination');
		
		$config['base_url'] = $param['base_url'];
		$config['total_rows'] = $param['total'];
		$config['per_page'] = $param['limit'];
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['full_tag_open'] = '<ul class="pagination pull-right">';
		$config['full_tag_close'] = '</ul>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['page_query_string'] = TRUE;
		
		$CI->pagination->initialize($config);
	}
}

/*
+-------------------------------------+
    Name: replace_new_line
    Purpose: replace \r\n into HTML tag
    @param return : HTML tag
+-------------------------------------+
*/
if ( ! function_exists('replace_new_line'))
{
    function replace_new_line($param)
    {
        $CI =& get_instance();
		return str_replace(array("\\r\\n", "\\r", "\\n"), "<br />", $param);
	}
}

if ( ! function_exists('save_resize'))
{
    function save_resize($param, $width)
    {
        $CI =& get_instance();

        // if everything is ok, try to upload file
        if (move_uploaded_file($param["tmp_name"], $param['target_file']))
        {
            if ($param['image_width'] != $width)
            {
                // Resize image
                $config['image_library'] = 'gd2';
                $config['source_image']	= $param['target_file'];
                $config['maintain_ratio'] = TRUE;
                $config['width'] = $width;
				
                $CI->load->library('image_lib', $config);

                if ($CI->image_lib->resize() == FALSE)
                {
					return $CI->image_lib->display_errors();
                }
                else
                {
                    return TRUE;
                }
            }
            else
            {
                return TRUE;
            }
        }
        else
        {
            return FALSE;
        }
    }
}

/*
+-------------------------------------+
    Name: send_email
    Purpose: melakukan pengecekan apakah ada user yang login
    @param return : TRUE atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('send_email')) {
    function send_email($param, $email_content)
    {
        $CI =& get_instance();

        $config['useragent'] = 'nezindaclub.com';
        $config['wordwrap'] = FALSE;
        $config['mailtype'] = 'html';
        $CI->email->initialize($config);

        $CI->email->from($CI->config->item('email_admin'), $CI->config->item('title'));
        $CI->email->to($param['email']);
        $CI->email->subject($param['subject']);
        $CI->email->message('<html><head></head><body>'.$email_content.'</body></html>');

        $send = $CI->email->send();
        return $send;
    }
}
