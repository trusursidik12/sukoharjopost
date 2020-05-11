<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cems extends CI_Controller {

	public function index()
	{
		$data['getdata'] = $this->cems_m->get();

		$this->load->view('kota/sukoharjo/cems_rum', $data);
	}

	public function send()
    {
    	$data['getdata'] = $this->cems_m->get();

        $this->form_validation->set_rules('id_stasiun', 'ID Stasiun', 'required');

        $this->form_validation->set_message('required', '%s tidak boleh kosong');

        if ($this->form_validation->run() === false) {
            $this->load->view('kota/sukoharjo/cems_rum', $data);
        } else {
            $send = $this->cems_m->send_cemsdata();
            if($send){
                $this->cems_m->update_cemsdatalocal();
            }else{
                echo "SEND DATA FAILED";
            }
            redirect('cems/send');
        }
    }
}
