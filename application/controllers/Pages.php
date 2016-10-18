<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('post_archived_model');
		$this->load->model('post_model');
		$this->load->model('preferences_model');
    }
	
	function agnezmo()
	{
		if (empty($this->uri->segment(3)))
		{
			$offset = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
			
			$param = array();
			$param['limit'] = 5;
			$param['offset'] = $offset;
			$param['sort'] = 'desc';
			$param['type'] = 2;
			$param['status'] = 1;
			$query = get_post_lists($param);
			
			$data = array();
			$query2 = array();
			if ($query != FALSE)
			{
				foreach ($query->result as $row)
				{
					// Decode special character into HTML tag
					$decode = html_entity_decode($row->content);
					
					// Remove HTML tag
					$remove = strip_tags($decode);
					
					// Get part of the string
					$content = substr($remove, 0, 390);
					
					$temp = array();
					$temp['title'] = $row->title;
					$temp['slug'] = $row->slug;
					$temp['content'] = $content;
					$temp['created_date'] = $row->created_date;
					$temp['media'] = $row->media;
					$query2[] = (object) $temp;
				}
				
				// Pagination
				pages_pagination($query);
				
				$data['pagination'] = $this->pagination->create_links();
			}
			
			// History
			$data['history'] = $this->history($param);
			
			$data['link_pages'] = $this->config->item('link_pages_agnezmo');
			$data['post'] = $query2;
			$data['view_content'] = 'pages/agnezmo';
			$this->display_view('templates/frame', $data);
		}
		else
		{
			$param2 = array();
			$param2['link_pages'] = $this->config->item('link_pages_agnezmo');
			$param2['type'] = 2;
			$this->detail($param2);
		}
	}
	
	function detail($param)
	{
		$query = $this->post_model->info(array('slug' => $this->uri->segment(3)));
		
		if ($query->code == 200)
		{
			$result = $query->result;
			$code_post_type = $this->config->item('code_post_type');
			
			// Decode special character into HTML tag
			$content = html_entity_decode($result->content);
			
			$temp = array();
			$temp['title'] = $result->title;
			$temp['content'] = $content;
			$temp['created_date'] = $result->created_date;
			$temp['media'] = $result->media;
			$temp['type'] = $code_post_type[$result->type];
			$query2 = (object) $temp;
			
			// History
			$data['history'] = $this->history($param);
			
			$data['link_pages'] = $param['link_pages'];
			$data['post'] = $query2;
			$data['view_content'] = 'pages/detail';
			$this->display_view('templates/frame', $data);
		}
		else
		{
			redirect($this->config->item('link_index'));
		}
	}
	
	function faq()
	{
		$query = get_faq_lists(array());
		
		$data = array();
		$data['faq'] = $query->result;
		$data['view_content'] = 'pages/faq';
        $this->display_view('templates/frame', $data);
	}
	
	function help()
	{
		$query = get_faq_lists(array());
		
		$data = array();
		$data['section'] = 'pages/faq';
		$data['faq'] = $query->result;
		$section = $this->uri->segment(3);
		
		if ($section == TRUE)
		{
			if ($section == 'upload_photo')
			{
				$data['section'] = 'pages/help/upload_photo';
			}
		}
		
		$data['view_content'] = 'pages/help';
        $this->display_view('templates/frame', $data);
	}
	
	function history($param2)
	{
		$param = array();
		$param['order'] = 'created_date,month';
		$param['sort'] = 'desc';
		$param['status'] = 1;
		$param['type'] = $param2['type'];
		$get = $this->post_archived_model->lists($param);
		
		if ($get->code == 200)
		{
			$code_month_name = $this->config->item('code_month_name');
			
			$temp = array();
			foreach($get->result as $row)
			{
				$year = $row->year;
				$slug = $row->post->slug;
				$month = $code_month_name[$row->month];
				$temp[$year][$month][$slug] = $row->post->title;
			}

			krsort($temp);
			return $temp;
		}
	}
	
	function nic()
	{
		if (empty($this->uri->segment(3)))
		{
			$offset = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
			
			$param = array();
			$param['limit'] = 5;
			$param['offset'] = $offset;
			$param['sort'] = 'desc';
			$param['type'] = 1;
			$param['status'] = 1;
			$query = get_post_lists($param);
			
			$data = array();
			$query2 = array();
			if ($query != FALSE)
			{
				foreach ($query->result as $row)
				{
					// Decode special character into HTML tag
					$decode = html_entity_decode($row->content);
					
					// Remove HTML tag
					$remove = strip_tags($decode);
					
					// Get part of the string
					$content = substr($remove, 0, 390);
					
					$temp = array();
					$temp['title'] = $row->title;
					$temp['slug'] = $row->slug;
					$temp['content'] = $content;
					$temp['created_date'] = $row->created_date;
					$temp['media'] = $row->media;
					$query2[] = (object) $temp;
				}
				
				// Pagination
				pages_pagination($query);
				
				$data['pagination'] = $this->pagination->create_links();
			}
			
			// History
			$data['history'] = $this->history($param);
			
			$data['link_pages'] = $this->config->item('link_pages_nic');
			$data['post'] = $query2;
			$data['view_content'] = 'pages/nic';
			$this->display_view('templates/frame', $data);
		}
		else
		{
			$param2 = array();
			$param2['link_pages'] = $this->config->item('link_pages_nic');
			$param2['type'] = 1;
			$this->detail($param2);
		}
	}
	
	function team()
	{
		$data = array();
		$code_admin_group = $this->config->item('code_admin_group');
		
		$query = get_admin_lists(array('limit' => 30, 'order' => 'admin_group', 'sort' => 'desc'));
		
		$query2 = array();
		foreach ($query->result as $row)
		{
			$temp = array();
			$temp['name'] = $row->name;
			$temp['admin_group'] = $code_admin_group[$row->admin_group];
			$temp['photo'] = $row->photo;
			$temp['position'] = $row->position;
			$temp['twitter'] = $row->twitter;
			$query2[] = (object) $temp;
		}
		
		$query3 = $this->preferences_model->info(array('key' => 'about_us'));
		
		if ($query3->code == 200)
		{
			$data['the_team'] = $query3->result;
		}
		
		$data['admin'] = $query2;
		$data['view_content'] = 'pages/team';
        $this->display_view('templates/frame', $data);
	}
}
