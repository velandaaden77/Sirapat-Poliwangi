<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('assets/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

class Pdf_generator {
    protected $ci;

    public function __construct(){

        $this->ci =& get_instance();
    }

    public function generate($html, $filename, $paper, $orientation){

        // // $html = $this->ci->load->view($view,$data, TRUE);
        // $html = $this->template->load($view,$data, TRUE);

        $dompdf= new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array("Attachment" => 0));
    }

}