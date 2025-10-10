<?php

#[\AllowDynamicProperties]
Class Template {

    var $template_data = array();

    function set($name, $value)
    {
        $this->template_data[$name] = $value;
    }

    function load($template = '', $view = '', $view_data = array(), $return = FALSE)
    {
        $this->CI =& get_instance();
        $this->CI->load->model('M_gudang/M_gudang_admin/M_admin_sppb');
        $this->CI->load->model('M_gudang/M_gudang_admin/M_admin_spbm');
        $this->CI->load->model('M_accounting/M_invoice');
        $view_data['cek_sppb'] = $this->CI->M_admin_sppb->cek_sppb()->result_array()[0]['tot_status_sppb'];
        $view_data['cek_spbm'] = $this->CI->M_admin_spbm->cek_spbm()->result_array()[0]['tot_status_spbm'];
        $view_data['cek_order'] = $this->CI->M_invoice->cek_order()->result_array()[0]['tot_status_invoice'];
        $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
        return $this->CI->load->view($template, $this->template_data, $return);
    }

}