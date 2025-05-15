<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    include_once APPPATH.'libraries/MPDF56/mpdf.php';
 
class M_pdf {
 
    public $param;
    public $pdf;
 
    public function __construct($param = '"utf-8","LEGAL","","",10,10,10,10,10,10')
    {
        $this->param =$param;
        $this->pdf = new mPDF($this->param);
    }
}
?>