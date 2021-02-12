<?php

class Error404 extends CI_Controller 
{
    public function index(){
 
        $data = [
            'title' => '404 Not Found'
        ];

        $this->output->set_status_header('404'); 
        $this->load->view('errors/error404', $data);
     
      }
}
