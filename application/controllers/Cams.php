<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cams extends CI_Controller {

	public function rum()
    {
    	$data['getdata'] = $this->cams_m->get_rum();

        $this->form_validation->set_rules('id_stasiun', 'ID Stasiun', 'required');

        $this->form_validation->set_message('required', '%s tidak boleh kosong');

        if ($this->form_validation->run() === false) {
            $this->load->view('kota/sukoharjo/rum', $data);
        } else {
            $send = $this->cams_m->send_rumdata();
            if($send){
                $this->cams_m->update_rumlocal();
            }else{
                echo "SEND DATA FAILED";
            }
            redirect('cams/rum');
        }
    }

    public function gupit()
    {
        $data['getdata'] = $this->cams_m->get_gupit();

        $this->form_validation->set_rules('id_stasiun', 'ID Stasiun', 'required');

        $this->form_validation->set_message('required', '%s tidak boleh kosong');

        if ($this->form_validation->run() === false) {
            $this->load->view('kota/sukoharjo/gupit', $data);
        } else {
            $send = $this->cams_m->send_gupitdata();
            if($send){
                $this->cams_m->update_gupitlocal();
            }else{
                echo "SEND DATA FAILED";
            }
            redirect('cams/gupit');
        }
    }

    public function plesan()
    {
        $data['getdata'] = $this->cams_m->get_plesan();

        $this->form_validation->set_rules('id_stasiun', 'ID Stasiun', 'required');

        $this->form_validation->set_message('required', '%s tidak boleh kosong');

        if ($this->form_validation->run() === false) {
            $this->load->view('kota/sukoharjo/plesan', $data);
        } else {
            $send = $this->cams_m->send_plesandata();
            if($send){
                $this->cams_m->update_plesanlocal();
            }else{
                echo "SEND DATA FAILED";
            }
            redirect('cams/plesan');
        }
    }
}
