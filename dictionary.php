<?php

$contents = file_get_contents("https://en.wikipedia.org/wiki/Donald_Trump");

$contents = strip_tags($contents);

//$contents = preg_split("#[\b\s]#", $contents);
$contents = preg_split("#[\W\s]#", $contents);

echo $contents;

 ?>

 <pre>

<?php var_export($contents); ?>

 </pre>
