 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Excel extends CI_Controller {
 
      //constructor class C_excel
      public function __construct() {
          parent::__construct();
          //load helper url
          $this->load->helper('url');
          //load model
          $this->load->model('header_transaksi_model');
          // proteksi halaman
          $this->simple_login->cek_login();
      }
 
      //halaman awal untuk menampilkan tabel
      public function index() {

        // ambil data login id_pelanggan dari SESSION
          $header_transaksi = $this->header_transaksi_model->listing();
          
          $data = array('title'             => 'Laporan Transaksi',
                        'header_transaksi'  => $header_transaksi,
                        'isi'               => 'admin/export/vw_excel'
                );
          $this->load->view('admin/layout/wrapper', $data, FALSE);
      }
 
      //export ke dalam format excel
      public function export(){
        
        // Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excel
          header("Content-type: application/vnd-ms-excel");
          header("Content-Disposition: attachment; filename=Data_Transaksi.xls");
          
          $data['header_transaksi'] = $this->header_transaksi_model->listing();
          $this->load->view('admin/export/vw_laporan_excel', $data);

      }
 }
 
 /* End of file C_excel.php */
 /* Location: ./application/controllers/C_excel.php */