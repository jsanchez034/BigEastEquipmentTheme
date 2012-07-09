<?php

$from = $_REQUEST['email'] ;
// subject
$subject = 'Email from Big East Equipment';

$fullname = '<p><span style="font-weight:bold;">Name</span>:&nbsp;'. $_REQUEST['fname'] . '&nbsp;' . $_REQUEST['lname'] . '</p>';
$compname =  '<p><span style="font-weight:bold;">Company Name</span>:&nbsp;'. $_REQUEST['cname'] . '</p>';
$fulladd = '<p><span style="font-weight:bold; font-size: 14px;">Address:</span><br/><br/>' . $_REQUEST['addr1'] .'</p>' ;
$phone =  '<p><span style="font-weight:bold;">Phone</span>:&nbsp;'. $_REQUEST['phone'] . '</p>';


$besttime = '<span style="font-weight:bold;">Best time to be reached : </span><p>'. $_REQUEST['time'] . '</p>';
$wlooking = '<span style="font-weight:bold;">What are you looking for? (equipment, parts, other) : </span><p>'. $_REQUEST['look'] . '</p>';
$budget = '<span style="font-weight:bold;">Budget range (Equipment only; not for parts) : </span><p>'. $_REQUEST['budget'] . '</p>';
$comment = '<span style="font-weight:bold;">Any other specific needs you may have for the above inquiry ? : </span><p>'. $_REQUEST['comm'] . '</p>';

$html = <<<END
<html>
	<body>
		$fullname $compname $fulladd $phone $besttime $wlooking $budget $comment  
	</body>
</html>
END;

$html = stripcslashes($html);

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: ' . $from . "\r\n" .
            'Reply-To: ' . $from . "\r\n";
			

mail('Sales@bigeastequipment.com', $subject, $html, $headers);  //sales@bigeastequipment.com
?>