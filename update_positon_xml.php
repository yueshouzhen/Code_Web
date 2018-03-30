<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>update_position_xml</title>
</head>

<body>
<?php
	
	
$dom =new DomDocument();
$dom->load('dbresource.xml');
$jifang = $dom->getElementsByTagName( "jifang" ); 
foreach($jifang as $jf)
{
    echo $jf->attributes->item(0)->nodeValue;
	$jigui=$jf->getElementsByTagName('jg');
	foreach($jigui as $jg)
	{
		echo $jg->attributes->item(0)->nodeValue;
		$num_dhs=$jg->childNodes;
		foreach($num_dhs as $dh )
		{echo $dh->nodeValue;}
		}
	}

?>
</body>
</html>