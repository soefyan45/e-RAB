
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *  edit_column callback function in Codeigniter (Ignited Datatables)
 *
 * Grabs a value from the edit_column field for the specified field so you can
 * return the desired value.
 *
 * @access   public
 * @return   mixed
 */

if ( ! function_exists('cek_terbayar'))
{
    function cek_terbayar($terbayar,$hapus)
    {
        if ($terbayar==1 and ($hapus==0)){
            return '<span class="label label-success" align="center">Lunas</span>';
        }elseif ($terbayar==0 and ($hapus==0)){
            return '<span class="label label-warning" align="center">EXP</span>';
        }else if ($terbayar==0 and ($hapus==1)){
            return '<span class="label label-danger" align="center">Belum Bayar</span>';
        }

        //return ($terbayar==1) ? 'Active' : 'Inactive';
    }
}
if ( ! function_exists('cek_disabled'))
{
    function cek_disabled($status)
    {
        if ($status==0){
            return '<div class="badge badge-danger">Disactive</div>';
        }elseif ($status==1){
            return '<div class="badge badge-info">Active</div>';
        }elseif ($status==2){
            return '<div class="badge badge-warning">onProses</div>';
        }elseif ($status==3){
            return '<div class="badge badge-success">onIntalsi</div>';
        }elseif ($status==4){
            return '<div class="badge badge-success">Finish</div>';
        }
    }
}

/* End of file MY_datatable_helper.php */
/* Location: ./application/helpers/MY_datatable_helper.php */  