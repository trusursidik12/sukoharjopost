<?php

use GuzzleHttp\Client;

class Cems_m extends CI_Model
{
	private $_client;

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->db2 = $this->load->database('second', TRUE);
		$this->_client 	= new Client([
			'base_uri' 	=> 'http://ispumaps.id/restserverclientdata/'
		]);
	}

	public function get($id = FALSE)
	{
		if($id === FALSE){
			$this->db2->where('sent_vps', '0');
			$this->db2->order_by('id', 'ASC');
			$this->db2->limit('1');
			$query = $this->db2->get('cems_data');
			return $query->result_array();
		}
		$query = $this->db2->get_where('cems_data', array('id' => $id));
		return $query->row_array();
	}

	public function send_cemsdata()
	{
		$data = array(
			'id_stasiun' 		=> $this->input->post('id_stasiun'),
			'waktu' 			=> $this->input->post('waktu'),
			'h2s' 				=> $this->input->post('h2s'),
			'cs2' 				=> $this->input->post('cs2'),
			'velocity' 			=> $this->input->post('velocity'),
			'temperature' 		=> $this->input->post('temperature'),
			'trusur_key'		=> 'VHJ1c3VyVW5nZ3VsVGVrbnVzYV9wVA=='
		);
		$response = $this->_client->request('POST', 'api/add/cemsdata/sukoharjo', [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function update_cemsdatalocal()
	{
		$data = array(
			'sent_vps' => '1'
		);
		$this->db2->where('sent_vps', '0');
		$this->db2->order_by('id', 'ASC');
		$this->db2->limit('1');
		$this->db2->update('cems_data', $data);
		return $this->db2->affected_rows();
	}
}