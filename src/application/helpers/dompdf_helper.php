<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function dompdf_createpdf300dpi($html, $filename = '', $stream = true, $landscape=false, $a5paper=false)
{
    require_once 'dompdf-310/autoload.php';

    $dompdf = new Dompdf\Dompdf([
        'dpi' => 300,
        'isRemoteEnabled' => true,
    ]);
    if ($a5paper && $landscape) {
        $dompdf->set_paper('a5','landscape');
    }
    elseif ($a5paper && !$landscape) {
        $dompdf->set_paper('a5','portrait');
    }
    elseif (!$a5paper && $landscape) {
        $dompdf->set_paper('a4','landscape');
    }
    elseif (!$a5paper && !$landscape) {
        $dompdf->set_paper('a4','portrait');
    }
    $dompdf->load_html($html);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename . ".pdf");
    } else {
        return $dompdf->output();
    }
}


//creates a PDF
function dompdf_createpdf($html, $filename = '', $stream = true, $landscape=false, $a5paper=false) {


/*	
require_once("dompdf/dompdf_config.inc.php");
$dompdf = new DOMPDF();
*/

    require_once 'dompdf-082/autoload.php';

    $dompdf = new Dompdf\Dompdf([
        'isRemoteEnabled' => true,
    ]);
    if ($a5paper && $landscape) {
		$dompdf->set_paper('a5','landscape');
	}
	elseif ($a5paper && !$landscape) {
		$dompdf->set_paper('a5','portrait');
	}	
	elseif (!$a5paper && $landscape) {
		$dompdf->set_paper('a4','landscape');
	}	
	elseif (!$a5paper && !$landscape) {
		$dompdf->set_paper('a4','portrait');
	}	
	$dompdf->load_html($html);
	$dompdf->render();
	if ($stream) {
		$dompdf->stream($filename . ".pdf");
	} else {
		return $dompdf->output();
	}

}
