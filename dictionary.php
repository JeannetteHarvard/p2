<?php

$contents = file_get_contents("https://en.wikipedia.org/wiki/Donald_Trump");

$contents = strip_tags($contents);

//$contents = preg_split("#[\b\s]#", $contents);
$contents = preg_split("#[\W\s]#", $contents);

//$contents_length = count($contents);
//$contents = array_slice($contents, 2000, $contents_length-5000);
$contents = array_slice($contents, 2000, -5000);


echo $contents;

 ?>

 <pre>

<?php var_export($contents); ?>

 </pre>
