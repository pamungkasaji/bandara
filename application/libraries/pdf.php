
<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');  
 
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Pdf extends Dompdf
{
  protected $ci;

  public function __construct()
  {
        parent::__construct();
        $this->ci =& get_instance();
  }

  public function generate($view, $data = array(), $filename = 'Laporan', $paper = 'A4', $orientation='portrait')
  {
    $dompdf = new Dompdf();
    $html = $this->ci->load->view($view, $data, TRUE);
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    // Render the HTML as PDF.
    $dompdf->render();
      $dompdf->stream( $filename . ".pdf", array("Attachment" => FALSE));

  }

}

?>



