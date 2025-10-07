<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#[\AllowDynamicProperties] // biar aman di PHP 8+
class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // load library/helper yang sering dipake
        $this->load->helper(array('url', 'form', 'html'));
        $this->load->library(array('session', 'form_validation'));

        // contoh: otomatis load model user kalau project lu butuh
        // $this->load->model('M_user');

        // bisa tambahin default setting lain di sini
        // misal timezone
        date_default_timezone_set('Asia/Jakarta');
    }
}
