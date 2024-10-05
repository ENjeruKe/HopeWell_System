header and a footer for your document.


<?php
define('FPDF_FONTPATH','font/');
require('fpdf.php');

class PDF extends FPDF
{
  function Header()
    {
      $this->Image('images/dashboard.jpg',10,8,33);
      $this->SetFont('Arial','B',15);
      $this->SetXY(50, 10);
      $this->Cell(0,10,'This is a header',1,0,'C');
     }

  function Footer()
    {
      $this->SetXY(100,-15);
      $this->SetFont('Arial','I',10);
      $this->Write (5, 'This is a footer');
    }
}

$pdf=new PDF();
$pdf->AddPage();
$pdf->Output('example2.pdf','D');
?>


As you can see we are creating a child class of FPDF using inheritance and setting up the be