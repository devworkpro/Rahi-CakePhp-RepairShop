<?php
header("Content-Type: application/force-download");
header("Content-type: application/pdf");
switch ($courseDetail['Course']['type2']) {
	case '0':
		$type = "Line";
		break;
	case '1':
		$type = "Score";
		break;
	case '2':
		$type = "Scatter";
		break;
}
$pdf = new XTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle($type);
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$pdf->AddPage();
$pdf_name = md5($courseDetail['Course']['id'].$courseDetail['Course']['slug']);
$html = '
      <section>
	  <div><h4 style="font-family: Montserrat; padding-left: 0px; padding-right: 35px; text-transform: uppercase; width: auto;">'.$courseDetail['Course']['Name'].'</h4></div>
			
					<h2 class="course_head_text" >Course Information</h2> 
				<div class="crs_innr_info">
					<h2 style="font-family: lato; font-weight: 600; padding-bottom: 1px; font-size: 16px;">'.$courseDetail['Course']['name'].'</h2>
					<div >
					<span class="course_info" >Course type: </span>'.$type.' Course	</div>
					<div ><span class="course_info" >Date: </span>'.$courseDetail['Course']['start_time'].' - '.$courseDetail['Course']['end_time'].'</div>
					<div style="  float: left;     font-family: roboto;     font-size: 13px;     margin-top: 1px;     width: 100%;"><span class="course_info" style="color: rgb(0, 0, 0); float: none; font-family: roboto; font-weight: 500; margin: 0px 5px 0px 0px; font-size: 14px;">Start Location: </span>'.$courseDetail['Course']['location'].'</div>
					
					<h2 class="course_head_text">REQUIREMENT / DESCRIPTION</h2>
					<small> </small>
					<h4>'.$courseDetail['Course']['objective'].'</h4>	
					<div class="crs_innr_info requit">
					<strong>'.$courseLabel.'</strong> '.$labelValue.'<br>
					<strong>'.$courseLabel1.'</strong> '.$labelValue1.'
					</div>	
				</div>

	
   
      </section>
	 
	  <style type="text/css" media="print">
		.course_head_text{margin-bottom: 0px; color: #000;  font-family: lato;font-size: 16px; width: 100%; text-transform: uppercase; vertical-align:middle; border-bottom:1px solid #000;}
	  </style>'.$rules
      ;
	  
 
$pdf->writeHTML($html, true, false, true, false, '');
 
$pdf->lastPage();
 $path = WWW_ROOT.'pdf_subrub_courses/';
$pdf->Output($path.$courseDetail['Course']['id'] . '-'.$courseDetail['Course']['Name'] .'.pdf', 'F');
header('Location: '.SITEURL.'admin/courses');

    exit();
?>
