<?php

$subject = 'Email from fitnessexpressmiami.com';


// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: info@fitnessexpressmiami.com'  . "\r\n" .
            'Reply-To: info@fitnessexpressmiami.com' . "\r\n";
			

mail('jsanc034@gmail.com', $subject, "TESTESTSDF ASDFA SDFASDF", $headers);
?>