<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extra extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->library('imagemanipulation');
    }
    
	function check_all($image)
	{
		// Check image size
		$check_size = $this->imagemanipulation->check_size($image['size']);
		
		if ($check_size == TRUE)
		{
			$msg = array(
				"message" => "error",
				"code" => 400,
				"result" => array(
					"checking" => "Client: ".$check_size
				)
			);
			
			return $msg;
		}
		else
		{
			$explode = explode('.', $image['name']);
			$extension = strtolower(end($explode));
			
			// Check image format
			$check_format = $this->imagemanipulation->check_format($extension);
			
			if ($check_format == TRUE)
			{
				$msg = array(
					"message" => "error",
					"code" => 400,
					"result" => array(
						"checking" => "Client: ".$check_format
					)
				);
				
				return $msg;
			}
			else
			{
				// Check image info (content)
				$check_info = $this->imagemanipulation->check_info($image['tmp_name']);
				
				if ($check_info == TRUE)
				{
					$msg = array(
						"message" => "error",
						"code" => 400,
						"result" => array(
							"checking" => "Client: ".$check_info
						)
					);
					
					return $msg;
				}
				else
				{
					return TRUE;
				}
			}
		}
	}
	
	function coming_soon()
	{
		$this->display_view('extra/coming_soon');
	}
	
	function maintenance()
	{
		$this->display_view('extra/maintenance');
	}
	
	function not_found()
	{
        $data = array();
        $data['view_content'] = 'extra/not_found';
        $this->display_view('templates/frame', $data);
	}
	
	function upload_image()
	{
		$watermark = $this->input->post('watermark');
		$type = $this->input->post('type');
		
		if (isset($_FILES["image"]))
		{
			$image = $_FILES["image"];
			
			// Check image (size, format & content)
			$check_all = $this->check_all($image);
			
			if (is_array($check_all) == FALSE)
			{
				$rename_files = md5(basename($image["name"]) . date('Y-m-d H:i:s'));
				$imageFileType = strtolower(pathinfo($image["name"],PATHINFO_EXTENSION));
				
				// Save Original Image
				$param = array();
				$param['rename_files'] = $rename_files;
				$param['type'] = $type;
				$param['extension'] = $imageFileType;
				$save_ori = $this->imagemanipulation->save($image, $param);
				
				if ($save_ori == 1)
				{
					// resize foto
					if ($type == 'post')
					{
						$param['resize'] = $this->config->item('code_1024x600');
						$resize_1024x600 = $this->imagemanipulation->resize($param, $image, $watermark);
					}
					
					$param['resize'] = $this->config->item('code_640x640');
					$resize_640x640 = $this->imagemanipulation->resize($param, $image, $watermark);
					
					if ($resize_640x640 == 1)
					{
						$param['resize'] = $this->config->item('code_350x350');
						$resize_350x350 = $this->imagemanipulation->resize($param, $image, $watermark, TRUE);
						
						if ($resize_350x350 == 1)
						{
							$photo = UPLOAD_HOST . $type. '/' .$rename_files . '.' . $imageFileType;
							
							$result = array();
							$result['image'] = $photo;
							
							echo json_encode($result);
						}
						else
						{
							return FALSE;
						}
					}
					else
					{
						return FALSE;
					}
				}
				else
				{
					return FALSE;
				}
			}
			else
			{
				return $check_all;
			}
		}
		else
		{
			return FALSE;
		}
	}
}
