<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


use Dompdf\Dompdf;

class Dompdf_gen
{
    public function __construct(){
        
        // include autoloader
        require_once dirname(__FILE__).'/dompdf/autoload.inc.php';
        
        // instantiate and use the dompdf class
        // $pdf = new DOMPDF(array('enable_remote' => true));
        $pdf = new DOMPDF();
        
        $CI =& get_instance();
        $CI->dompdf = $pdf;
        
    }
}
?>