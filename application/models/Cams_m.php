<?php

use GuzzleHttp\Client;

class Cams_m extends CI_Model
{
	private $_client;

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->_client 	= new Client([
			'base_uri' 	=> 'http://ispumaps.id/restserverclientdata/'
		]);
	}

	//SUKOHARJO RUM
	public function get_rum($id = FALSE)
	{
		if($id === FALSE){
			$this->db->where('id_stasiun', 'SKH_RUM');
			$this->db->where('sent_vps', '0');
			$this->db->order_by('id', 'ASC');
			$this->db->limit('1');
			$query = $this->db->get('cams_data');
			return $query->result_array();
		}
		$query = $this->db->get_where('cams_data', array('id' => $id));
		return $query->row_array();
	}

	public function send_rumdata()
	{
		$data = array(
			'id_stasiun' 		=> $this->input->post('id_stasiun'),
			'waktu' 			=> $this->input->post('waktu'),
			'h2s' 				=> $this->input->post('h2s'),
			'cs2' 				=> $this->input->post('cs2'),
			'ws' 				=> $this->input->post('ws'),
			'wd' 				=> $this->input->post('wd'),
			'humidity' 			=> $this->input->post('humidity'),
			'temperature' 		=> $this->input->post('temperature'),
			'pressure' 			=> $this->input->post('pressure'),
			'sr' 				=> $this->input->post('sr'),
			'rain_intensity' 	=> $this->input->post('rain_intensity'),
			'trusur_key'		=> 'VHJ1c3VyVW5nZ3VsVGVrbnVzYV9wVA=='
		);
		$response = $this->_client->request('POST', 'api/add/camsdata/sukoharjo', [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function update_rumlocal()
	{
		$data = array(
			'sent_vps' => '1'
		);
		$this->db->where('id_stasiun', 'SKH_RUM');
		$this->db->where('sent_vps', '0');
		$this->db->order_by('id', 'ASC');
		$this->db->limit('1');
		$this->db->update('cams_data', $data);
		return $this->db->affected_rows();
	}

	//SUKOHARJO GUPIT
	public function get_gupit($id = FALSE)
	{
		if($id === FALSE){
			$this->db->where('id_stasiun', 'SKH_GUPIT');
			$this->db->where('sent_vps', '0');
			$this->db->order_by('id', 'ASC');
			$this->db->limit('1');
			$query = $this->db->get('cams_data');
			return $query->result_array();
		}
		$query = $this->db->get_where('cams_data', array('id' => $id));
		return $query->row_array();
	}

	public function send_gupitdata()
	{
		$data = array(
			'id_stasiun' 		=> $this->input->post('id_stasiun'),
			'waktu' 			=> $this->input->post('waktu'),
			'h2s' 				=> $this->input->post('h2s'),
			'cs2' 				=> $this->input->post('cs2'),
			'ws' 				=> $this->input->post('ws'),
			'wd' 				=> $this->input->post('wd'),
			'humidity' 			=> $this->input->post('humidity'),
			'temperature' 		=> $this->input->post('temperature'),
			'pressure' 			=> $this->input->post('pressure'),
			'sr' 				=> $this->input->post('sr'),
			'rain_intensity' 	=> $this->input->post('rain_intensity'),
			'trusur_key'		=> 'VHJ1c3VyVW5nZ3VsVGVrbnVzYV9wVA=='
		);
		$response = $this->_client->request('POST', 'api/add/camsdata/sukoharjo', [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function update_gupitlocal()
	{
		$data = array(
			'sent_vps' => '1'
		);
		$this->db->where('id_stasiun', 'SKH_GUPIT');
		$this->db->where('sent_vps', '0');
		$this->db->order_by('id', 'ASC');
		$this->db->limit('1');
		$this->db->update('cams_data', $data);
		return $this->db->affected_rows();
	}

	//SUKOHARJO GUPIT
	public function get_plesan($id = FALSE)
	{
		if($id === FALSE){
			$this->db->where('id_stasiun', 'SKH_PLESAN');
			$this->db->where('sent_vps', '0');
			$this->db->order_by('id', 'ASC');
			$this->db->limit('1');
			$query = $this->db->get('cams_data');
			return $query->result_array();
		}
		$query = $this->db->get_where('cams_data', array('id' => $id));
		return $query->row_array();
	}

	public function send_plesandata()
	{
		$data = array(
			'id_stasiun' 		=> $this->input->post('id_stasiun'),
			'waktu' 			=> $this->input->post('waktu'),
			'h2s' 				=> $this->input->post('h2s'),
			'cs2' 				=> $this->input->post('cs2'),
			'ws' 				=> $this->input->post('ws'),
			'wd' 				=> $this->input->post('wd'),
			'humidity' 			=> $this->input->post('humidity'),
			'temperature' 		=> $this->input->post('temperature'),
			'pressure' 			=> $this->input->post('pressure'),
			'sr' 				=> $this->input->post('sr'),
			'rain_intensity' 	=> $this->input->post('rain_intensity'),
			'trusur_key'		=> 'VHJ1c3VyVW5nZ3VsVGVrbnVzYV9wVA=='
		);
		$response = $this->_client->request('POST', 'api/add/camsdata/sukoharjo', [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function update_plesanlocal()
	{
		$data = array(
			'sent_vps' => '1'
		);
		$this->db->where('id_stasiun', 'SKH_PLESAN');
		$this->db->where('sent_vps', '0');
		$this->db->order_by('id', 'ASC');
		$this->db->limit('1');
		$this->db->update('cams_data', $data);
		return $this->db->affected_rows();
	}
}