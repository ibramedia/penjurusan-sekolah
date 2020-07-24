<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        if($this->login_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $this->template->load('wakasis/base', 'wakasis/home', null);
    }
}
