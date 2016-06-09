<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    var $global_data = array();

    function __construct()
    {
        parent::__construct();

        // DEVELOPMENT MODE
        if ($this->config->item('development_mode') == TRUE)
        {
            $data = array();
            $data['text'] = "WEBSITE IS UNDER MAINTENANCE";
            echo $this->load->view("development_mode", $data, TRUE);
            die();
        }
    }

    function display_view($view, $local_data = array())
    {
        $this->load->model('preferences_model');
        
        $query = $this->preferences_model->info(array('key' => 'about_us'));
        
        if ($query->code == 200)
        {
            $about_us = substr($query->result->value, 0, 200);
        }
        
        $this->global_data['about_us'] = $about_us;
        
        $data = array_merge($this->global_data, $local_data);
        
        return $this->load->view($view, $data);
    }
}
