<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Letter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation','datatables'));
        $this->load->helper(array('url', 'language','MY_datatable_helper'));
        $this->load->model(array('M_letter'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }
    function index(){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else{
            $query = $this->db->query("SELECT * FROM data_instansi");
            //$q_instansi = $query->result();

            $data = array(
                'title' => 'Input Data Surat',
                'data_ins' => $query,
            );
            $this->load->view('rab/view_header', $data);
            $this->load->view('rab/view_menu', $data);
            $this->load->view('rab/view_letter', $data);
            $this->load->view('rab/view_footer', $data);
        }

    }
    function do_record_letter(){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else{
            $waktuinput = time();
            $data = array(
                'instansi_id'       => $this->input->post('insta'),
                'nomer_surat'       => $this->input->post('nom_s'),
                'keperluan'         => $this->input->post('keperluan'),
                'tanggal_terima'    => $this->input->post('datepicker'),
                'time_stamp'        => $waktuinput,
                'status'            => 1,
            );
            $this->db->insert('surat_permintaan', $data);
            $query = $this->db->query("SELECT * FROM surat_permintaan WHERE time_stamp='$waktuinput'");
            $suntik = $query->row()->id_surat_permintaan;
            echo "<a href=".base_url('letter/rab/').$suntik." class=\"btn btn-primary\">RAB</a>";
        }

    }
    function c_rab($suntik = null){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else{
            if (null !== $suntik) {
                $query = $this->db->query("SELECT * FROM surat_permintaan WHERE id_surat_permintaan='$suntik'");
                $surat = $query->row();
                if ($surat==''){
                    echo 'kosong';
                }else{
                    if ($surat->status == 0){ // cek status surat permintaan jika tidak aktif
                        echo "Surat Sudah Tidak Aktif";
                    }elseif ($surat->status == 1){ // cek status surat permintaan jika aktif tampilkan data
                        $instan = $this->db->query("SELECT * FROM data_instansi WHERE id_instansi='$surat->instansi_id'");
                        $instansi = $instan->row();
                        $get_item_rab = $this->db->query("SELECT * FROM item_rab");
                        $data = array(
                            'title' => 'Create RAB',
                            'nama_ins' => $instansi->nama_instansi,
                            'no_surat'  => $surat->nomer_surat,
                            'keperluan' => $surat->keperluan,
                            'item'      => $get_item_rab,
                            'suntik'   => $suntik
                        );
                        $this->load->view('rab/view_header', $data);
                        $this->load->view('rab/view_menu', $data);
                        $this->load->view('rab/view_rab', $data);
                        $this->load->view('rab/view_footer', $data);
                    }elseif ($surat->status == 2){
                        echo "onProses";
                    }elseif ($surat->status == 3){
                        echo "Selesai";
                    }else{
                        echo "tidak terdevinisi";
                    }
                }
            }else{
                redirect('letter/v_letter', 'refresh');
            }
        }
    }
    function rab($suntik=null){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else{
            if (!null == $suntik){
                $query = $this->db->query("SELECT * FROM rab_record WHERE by_surat=$suntik");
                if ($query->num_rows()<=0){
                    $this->c_rab($suntik);
                }else{
                    //$query->num_rows();
                    $surat = $this->db->query("SELECT * FROM surat_permintaan WHERE id_surat_permintaan=$suntik");
                    $id_instanya = $surat->row()->instansi_id;
                    $nama_instansi = $this->db->query("SELECT * FROM data_instansi WHERE id_instansi='$id_instanya'");
                    //$total_est = $query->row()->sub_totalitem;
                    foreach ($query->result() as $rw){
                        $total_est[] = $rw->sub_totalitem;
                    }
                    $data = array(
                        'title' => 'Rincian RAB',
                        'list_rab' => $query,
                        'nama_insta' => $nama_instansi->row()->nama_instansi,
                        'nomor_surat' => $surat->row()->nomer_surat,
                        'kegiatan' => $surat->row()->keperluan,
                        'total_estimasi' => array_sum($total_est),
                        'ini_suntik' => $suntik,
                    );
                    $this->load->view('rab/view_header', $data);
                    $this->load->view('rab/view_menu', $data);
                    $this->load->view('rab/view_item_rab', $data);
                    $this->load->view('rab/view_footer', $data);
                }
            }else{
                redirect('letter/v_letter','refresh');
            }
        }
    }
    function v_letter(){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else{
            $data = array(
                'title' => 'Record-Surat Masuk',
            );
            $this->load->view('rab/view_header', $data);
            $this->load->view('rab/view_menu', $data);
            $this->load->view('rab/view_list_rab', $data);
            $this->load->view('rab/view_footer', $data);
        }

    }
    function list_rab(){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else{
            header('Content-Type: application/json');
            echo $this->M_letter->list_rab();
        }
    }
    function get_harga(){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else{
            $ide = $this->input->post('ide');
            $data = $this->M_letter->get_harga_item_rab($ide);
            $rows[] = array(
                'harga_item' => $data->estimasi_harga_item,
                'data_item' => $data->nama_item,
                'data_satuan' => $data->satuan,
            );
            echo json_encode($rows);
        }
    }
    function do_save_rab(){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else{
            if(!empty($_POST["id_surat_rab"])){
                foreach ($_POST["id_surat_rab"] as $key => $value) {
                    $result[] = array(
                        "nama_item"  => $_POST['real_name'][$key],
                        "qty_item"  => $_POST['input_qty'][$key],
                        "satuan"  => $_POST['real_satuan'][$key],
                        "harga_item"  => $_POST['masukan_harga'][$key],
                        "sub_totalitem"  => $_POST['input_sub_total'][$key],
                        "by_surat"  => $_POST['id_surat_rab'][$key],
                    );
                }
                $this->M_letter->save_data_all($result);
                $data = array(
                    "status" => 2
                );
                $this->db->where('id_surat_permintaan',$this->input->post('id_surat_rab_1'));
                $this->db->update('surat_permintaan',$data);
                //echo json_encode(['success'=>'Names Inserted successfully.']);
                //print_r($result);
                //$this->db->insert_batch('');
                redirect('letter/v_letter','refresh');
            }
        }
    }
    function delete($suntik= null){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        } else if ($this->ion_auth->is_admin()){
            if (!null==$suntik){
                $this->db->where('id_surat_permintaan',$suntik);
                $this->db->delete('surat_permintaan');
                redirect('letter/v_letter','refresh');
            }else{
                echo "tidak ada";
            }
        }else{
            $this->session->set_flashdata('bukanadmin', 'andabuka_admin');
            redirect('letter','refresh');
        }
    }
    function dodol(){
        $this->session->set_flashdata('bukanadmin', 'andabuka_admin');
        redirect('letter','refresh');
    }
}