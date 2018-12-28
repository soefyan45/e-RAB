<?php
class Item extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation','datatables'));
        $this->load->helper(array('url', 'language','MY_datatable_helper'));
        $this->load->model(array('M_item'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }
    function index(){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else{
            $data = array(
                'title' => 'Input Item',
            );
            $this->load->view('rab/view_header', $data);
            $this->load->view('rab/view_menu', $data);
            $this->load->view('rab/view_item', $data);
            $this->load->view('rab/view_footer', $data);
        }

    }
    function edit($suntik){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else{
            $query = $this->db->query("SELECT * FROM item_rab WHERE id_item_rab=$suntik");
            $d_item = $query->row();
            $data = array(
                'title' => 'Input Data Surat',
                'n_akun' => $d_item->nama_item,
                'satuan' => $d_item->satuan,
                'estimasi_harga_item' => $d_item->estimasi_harga_item,
                'nama_toko' => $d_item->nama_toko,
                'type_toko' => $d_item->type_toko,
                'di_edit' => $suntik,
            );
            $this->load->view('rab/view_header', $data);
            $this->load->view('rab/view_menu', $data);
            $this->load->view('rab/view_item_edit', $data);
            $this->load->view('rab/view_footer', $data);
        }
    }
    function list_item(){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else{
            header('Content-Type: application/json');
            echo $this->M_item->list_item();
        }
    }
    function save(){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else{
            $data = array(
                'nama_item' => $this->input->post('input_akun'),
                'satuan' => $this->input->post('input_satuan'),
                'estimasi_harga_item' => $this->input->post('input_harga'),
                'nama_toko' => $this->input->post('input_toko'),
                'type_toko' => $this->input->post('input_type'),
                'status' => 1,
            );
            $this->db->insert('item_rab', $data);
            redirect('item','refresh');
        }
    }
    function do_edit(){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else if ($this->ion_auth->is_admin()){
            $data = array(
                'nama_item' => $this->input->post('input_akun'),
                'satuan' => $this->input->post('input_satuan'),
                'estimasi_harga_item' => $this->input->post('input_harga'),
                'nama_toko' => $this->input->post('input_toko'),
                'type_toko' => $this->input->post('input_type'),
                'status' => 1,
            );
            $this->db->where('id_item_rab',$this->input->post('di_edit'));
            $this->db->update('item_rab', $data);
            redirect('item','refresh');
        }else{
            $this->session->set_flashdata('bukanadmin', 'andabuka_admin');
            redirect('item','refresh');
        }
    }
}