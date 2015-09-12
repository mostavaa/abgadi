<?php
/*
$str = "ioashd iasd#@";
$str=iconv('cp1256', 'utf-8', $str);
echo preg_replace('~[^\p{L}\p{N}]++~u', ' ', $str);
echo "<br>".preg_match("~[^\p{L}\p{N}]++~u" , $str);
echo "<br>".preg_replace("~[^\p{Xan}\s]++~u" , '' , $str);

$special = "\s\-";
$min = 1;
$max = 60;
echo "<br><br>".preg_match("~^[a-z{$special}\p{Arabic}\d]{{$min},{$max}}$~iu", $str);
$special = "@_\-\.";
echo "<br><br>".preg_match("~^[a-z{$special}\p{Arabic}\d]{{$min},{$max}}$~iu", "mos.hame_d11@hotmail.com")
    */
/*
$xml = simplexml_load_file("sitemap22.xml");
$xml->addChild('url')->addChild('loc', 'fourth data');
file_put_contents('sitemap22.xml', $xml->asXML());
*/
// for new 

/*

$domDocument = new DOMDocument('1.0', "UTF-8");
$domElement = $domDocument->createElement('urlset');
$domAttribute = $domDocument->createAttribute('xmlns');

// Value for the created attribute
$domAttribute->value = "http://www.sitemaps.org/schemas/sitemap/0.9";
$domElement->appendChild($domAttribute);

// Append it to the document itself
$domDocument->appendChild($domElement);
$domDocument->save("sitemap22.xml");
*/
?>