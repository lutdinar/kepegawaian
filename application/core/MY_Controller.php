<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public function render_views($content, $data = null)
    {
        $data['header']     = $this->load->view('templates/header', $data, true);
        $data['content']    = $this->load->view($content, $data, true);
        $data['footer']     = $this->load->view('templates/footer', $data, true);

        $this->load->view('templates/content', $data);
    }

}