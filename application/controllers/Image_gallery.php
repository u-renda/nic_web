<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_gallery extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		if ($this->config->item('image_gallery_mode') == FALSE)
		{
			redirect($this->config->item('link_index'));
		}
		
		$this->load->model('image_album_model');
		$this->load->model('image_model');
    }
	
	function album_lists()
	{
		$data = array();
		$query = $this->image_album_model->lists(array());
		
		$result = array();
		if ($query->code == 200)
		{
			foreach ($query->result as $row)
			{
				$temp = array();
				$temp['id_image_album'] = $row->id_image_album;
				$temp['name'] = $row->name;
				$temp['slug'] = $row->slug;
				
				$query2 = $this->image_model->lists(array('id_image_album' => $row->id_image_album, 'limit' => 5));
				
				if ($query2->code == 200)
				{
					foreach ($query2->result as $val)
					{
						$temp['image'][] = array(
							'id_image' => $val->id_image,
							'url' => $val->url
						);
					}
				}
				
				$result[] = $temp;
			}
		}
		
		$data['result'] = $result;
		$data['view_content'] = 'image_gallery/album';
        $this->display_view('templates/frame', $data);
	}
	
	function detail()
	{
		if ($this->uri->segment(3) == '')
		{
			redirect($this->config->item('link_index'));
		}
		
		$data = array();
		$offset = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
		
		$query = $this->image_album_model->info(array('slug' => $this->uri->segment(3)));
		
		if ($query->code == 200)
		{
			$data['album'] = $query->result;
			
			$param2 = array();
			$param2['id_image_album'] = $query->result->id_image_album;
			$param2['offset'] = $offset;
			$query2 = $this->image_model->lists($param2);
			
			if ($query2->code == 200)
			{
				$data['result'] = $query2->result;

				// Pagination
				$param = array();
				$param['base_url'] = $this->config->item('link_image_gallery_detail').$this->uri->segment(3);
				$param['total'] = $query2->total;
				$param['limit'] = $query2->limit;
				pages_pagination($param);
				
				$data['pagination'] = $this->pagination->create_links();
			}
		}
		
		$data['view_content'] = 'image_gallery/detail';
        $this->display_view('templates/frame', $data);
	}
}
