<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_shipment_model extends CI_Model {

    var $page = 'cart_shipment';

    function __construct()
    {
        parent::__construct();
        $this->key = array('api_key' => $this->config->item('nic_key'));
    }

    function create($params)
    {
        $result = null;
        $url = $this->config->item('nic_api'). $this->page . '/create';
        $params = array_merge($params, $this->key);
        $result = $this->rest->post($url, $params);
		return $result;
    }

    function info($params)
    {
        $result = null;
        $url = $this->config->item('nic_api'). $this->page . '/info';
        $params = array_merge($params, $this->key);
        $result = $this->rest->get($url, $params);
		return $result;
    }
}
