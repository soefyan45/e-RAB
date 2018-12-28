<?php
class M_letter extends CI_Model{
    function get_harga_item_rab($ide){
        $hasil=$this->db->query("SELECT * FROM item_rab WHERE id_item_rab='$ide'");
        return $hasil->row();
    }
    function save_data_all($data){
        return $this->db->insert_batch('rab_record', $data);
    }
    function list_rab(){
        $this->datatables->select('id_surat_permintaan as id_sp, instansi_id as ins_id, nomer_surat as nom_sr, keperluan as kprl, tanggal_terima as tgl_terima, time_stamp as time_s, status as ss,nama_instansi as nam_ins');
        $this->datatables->from('surat_permintaan');
        $this->datatables->join('data_instansi', 'instansi_id=id_instansi');
        $this->datatables->edit_column('get_view', '$1','cek_disabled("ss")');
        $this->datatables->edit_column('view', '<a href="rab/$1" class="edit_record badge badge-secondary btn-xs" data-kode="$1" >RAB</a> <a href="delete/$1" class="badge badge-dark btn-xs" data-kode="$1">Delete</a>','id_sp,ins_id,nom_sr,kprl,tgl_terima,time_s,ss,nam_ins');
        return $this->datatables->generate();
    }
    function list_instasi(){
        $this->datatables->select('id_instansi, nama_instansi');
        $this->datatables->from('data_instansi');
        $this->datatables->edit_column('view', '<a href="instansi/edit/$1" class="edit_record badge badge-secondary btn-xs" data-kode="$1" >Edit</a>  <a href="instansi/dell/$1" class="edit_record badge badge-danger btn-xs" data-kode="$1" >Delete</a>','id_instansi, nama_instansi');
        return $this->datatables->generate();
    }
}