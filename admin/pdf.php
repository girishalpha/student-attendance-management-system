<?php

//pdf.php

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options; 

$options = new Options(); 
$options->set('isPhpEnabled', 'true'); 

class Pdf extends Dompdf
{
	public function __construct()
	{
		parent::__construct();
	}
}


?>