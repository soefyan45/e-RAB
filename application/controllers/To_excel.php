<?php
class To_excel extends CI_Controller{
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
    function index($suntik = null){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else{
            if (null !== $suntik){
                echo $suntik;
                $query = $this->db->query("SELECT * FROM rab_record WHERE by_surat=$suntik");
                $surat = $this->db->query("SELECT * FROM surat_permintaan WHERE id_surat_permintaan=$suntik");
                $id_instanya = $surat->row()->instansi_id;
                $nama_instansi = $this->db->query("SELECT * FROM data_instansi WHERE id_instansi='$id_instanya'");

                // export ke database
                $objPHPExcel = new PHPExcel();
                //$objPHPExcel->setActiveSheetIndex(0);
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Hello')
                    ->setCellValue('B2', 'Ini')
                    ->setCellValue('C1', 'Excel')
                    ->setCellValue('D2', 'Pertamaku');
                //Set Title
                $objPHPExcel->getActiveSheet()->setTitle('jdi_excel');

                //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'

                $objWriter  = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
                ob_end_clean();
                header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
                header('Chace-Control: no-store, no-cache, must-revalation');
                header('Chace-Control: post-check=0, pre-check=0', FALSE);
                header('Pragma: no-cache');
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="RAB_123'. date('Ymd') .'.xlsx"');
                //Download
                $objWriter->save("php://output");
                ob_end_clean();
            }
        }
    }
    function cobadulu($suntik){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else{
            $query = $this->db->query("SELECT * FROM rab_record WHERE by_surat=$suntik");
            foreach ($query->result() as $ros ){
                $gg = array($ros);
                print_r($gg);
            }
        }
    }
    function do_export($suntik = null){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login', 'refresh');
        }else{
            if (null !== $suntik){
                echo $suntik;
                $query = $this->db->query("SELECT * FROM rab_record WHERE by_surat=$suntik");
                foreach ($query->result() as $ros ){
                    $gg = array($ros);
                    print_r($gg);
                }
                $surat = $this->db->query("SELECT * FROM surat_permintaan WHERE id_surat_permintaan=$suntik");
                $id_instanya = $surat->row()->instansi_id;
                //$no_letter = $surat->nomer_surat;
                $nama_instansi = $this->db->query("SELECT * FROM data_instansi WHERE id_instansi='$id_instanya'");

                // export ke database
                //$objPHPExcel = new PHPExcel();
                //$objPHPExcel->setActiveSheetIndex(0);
                //echo date('H:i:s') , " Load from Excel5 template" , EOL;
                $objReader = PHPExcel_IOFactory::createReader('Excel5');
                $objPHPExcel = $objReader->load("excel_export/RAB_1.xls");
                echo date('H:i:s') , " Add new data to the template" , EOL;
                $objPHPExcel->getActiveSheet()->setCellValue('D1', PHPExcel_Shared_Date::PHPToExcel(time()));
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('C12', $surat->row()->keperluan.' No. Surat: '.$surat->row()->nomer_surat);
                $baseRow = 17;
                foreach($query->result() as $r => $dataRow) {
                    $row = $baseRow + $r;
                    $objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);
                    $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $r+1)
                        ->setCellValue('C'.$row, $dataRow->nama_item)
                        ->setCellValue('D'.$row, $dataRow->qty_item)
                        ->setCellValue('E'.$row, $dataRow->satuan)
                        ->setCellValue('F'.$row, $dataRow->harga_item)
                        ->setCellValue('G'.$row, '=D'.$row.'*F'.$row);
                }
                $objPHPExcel->getActiveSheet()->removeRow($baseRow-1,1);
                //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
                $objWriter  = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                ob_end_clean();
                header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
                header('Chace-Control: no-store, no-cache, must-revalation');
                header('Chace-Control: post-check=0, pre-check=0', FALSE);
                header('Pragma: no-cache');
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="RAB_123'. date('Ymd') .'.xls"');
                //Download
                $objWriter->save("php://output");
                ob_end_clean();
            }
        }
    }
}