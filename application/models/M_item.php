<?php
class M_item extends CI_Model{
    function list_item(){
        $this->datatables->select('id_item_rab as id_i_r, nama_item as n_i,satuan as satu,estimasi_harga_item as e_h_i,nama_toko as n_toko, type_toko as t_toko, status as ss');
        $this->datatables->from('item_rab');
        //$this->datatables->join('data_instansi', 'instansi_id=id_instansi');
        $this->datatables->edit_column('get_view', '$1','cek_disabled("ss")');
        $this->datatables->edit_column('view', '<a href="item/edit/$1" class="edit_record badge badge-secondary btn-xs" data-kode="$1" >Edit</a>','id_i_r,n_i,satu,e_h_i,n_toko,t_toko,ss');
        return $this->datatables->generate();
    }
}