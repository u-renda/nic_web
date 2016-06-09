<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('admin_model');
    }
	
	function agnezmo()
	{
		$param = array();
		$param['limit'] = 5;
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
			$content = substr($remove, 0, 400);
			
			$temp = array();
			$temp['title'] = $row->title;
			$temp['slug'] = $row->slug;
			$temp['content'] = $content;
			$temp['created_date'] = $row->created_date;
			$temp['media'] = $row->media;
			$query2[] = (object) $temp;
		}
		
		$data = array();
		$data['post'] = $query2;
		$data['view_content'] = 'pages/agnezmo';
        $this->display_view('templates/frame', $data);
	}
	
	function detail()
	{
		$data['view_content'] = 'pages/pages_detail';
        $this->display_view('templates/frame', $data);
	}
	
	function faq()
	{
		$query = get_faq_lists(array());
		
		$data = array();
		$data['faq'] = $query->result;
		$data['view_content'] = 'pages/faq';
        $this->display_view('templates/frame', $data);
	}
	
	function nic()
	{
		$param = array();
		$param['limit'] = 5;
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
			$content = substr($remove, 0, 400);
			
			$temp = array();
			$temp['title'] = $row->title;
			$temp['slug'] = $row->slug;
			$temp['content'] = $content;
			$temp['created_date'] = $row->created_date;
			$temp['media'] = $row->media;
			$query2[] = (object) $temp;
		}
		
		$data = array();
		$data['post'] = $query2;
		$data['view_content'] = 'pages/nic';
        $this->display_view('templates/frame', $data);
	}
	
	function team()
	{
		$code_admin_group = $this->config->item('code_admin_group');
		
		$query = get_admin_lists(array('limit' => 30, 'order' => 'admin_group'));
		
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
		
		$data = array();
		$data['admin'] = $query2;
		$data['view_content'] = 'pages/team';
        $this->display_view('templates/frame', $data);
	}
}
