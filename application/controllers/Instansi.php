<?php
class Instansi extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation','datatables','PHPExcel'));
        $this->load->helper(array('url', 'language','MY_datatable_helper'));
        $this->load->model(array('M_letter'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }
    function index(){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else{
            $data = array(
                'title' => 'Tambah Data Instasi',
            );
            $this->load->view('rab/view_header', $data);
            $this->load->view('rab/view_menu', $data);
            $this->load->view('rab/view_instansi', $data);
            $this->load->view('rab/view_footer', $data);
        }
    }
    function list_instansi(){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else{
            header('Content-Type: application/json');
            echo $this->M_letter->list_instasi();
        }
    }
    function tambah_ins(){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else{
            if(!empty($_POST["instansi"])){
                $data = array(
                    'nama_instansi' => $this->input->post('instansi'),
                );
                $this->db->insert('data_instansi',$data);
                redirect('instansi','refresh');
            }
            redirect('instansi','refresh');
        }
    }
    function edit($suntik=null){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else if ($this->ion_auth->is_admin()){
            if (!null == $suntik){
                $query = $this->db->query("SELECT * FROM data_instansi WHERE id_instansi=$suntik");
                $nama_lama = $query->row()->nama_instansi;
                $data = array(
                    'title' => 'Tambah Data Instasi',
                    'nama_lama' => $nama_lama,
                    'suntik'  => $suntik
                );
                $this->load->view('rab/view_header', $data);
                $this->load->view('rab/view_menu', $data);
                $this->load->view('rab/view_edit_instansi', $data);
                $this->load->view('rab/view_footer', $data);
            }else{
                redirect('instansi','refresh');
            }
        }else{
            $this->session->set_flashdata('bukanadmin', 'andabuka_admin');
            redirect('instansi','refresh');
        }
    }
    function save_edit(){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else{
            $suntik = $this->input->post('suntik');
            $data = array(
                'nama_instansi' => $this->input->post('instansi')
            );
            $this->db->where('id_instansi',$suntik);
            $this->db->update('data_instansi',$data);
            redirect('instansi','refresh');
        }
    }
    function dell($suntik=null){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else if ($this->ion_auth->is_admin()){
            if (!null == $suntik){
                $this->db->where('id_instansi',$suntik);
                $this->db->delete('data_instansi');
                redirect('instansi','refresh');
            }
        }else{
            $this->session->set_flashdata('bukanadmin', 'andabuka_admin');
            redirect('instansi','refresh');
        }
    }
}