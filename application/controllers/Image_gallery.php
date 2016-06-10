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
    }
	
	function detail()
	{
		$data['view_content'] = 'image_gallery/detail';
        $this->display_view('templates/frame', $data);
	}
	
	function index()
	{
		$data['view_content'] = 'image_gallery/album';
        $this->display_view('templates/frame', $data);
	}
}
