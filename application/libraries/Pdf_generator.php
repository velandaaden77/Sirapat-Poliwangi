<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('assets/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf_generator {
    protected $ci;

    public function __construct(){
        $this->ci =& get_instance();
    }
    public function generate($html, $filename, $paper, $orientation){

        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf= new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array("Attachment" => 0));
    }

}