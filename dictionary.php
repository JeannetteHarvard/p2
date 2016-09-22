<?php

$contents = file_get_contents("https://en.wikipedia.org/wiki/Donald_Trump");

$contents = strip_tags($contents);

//$contents = preg_split("#[\b\s]#", $contents);
$contents = preg_split("#[\W\s]#", $contents);
// splits the string into array separating by non alphabetic characters

//$contents_length = count($contents);
//$contents = array_slice($contents, 2000, $contents_length-5000);
$contents = array_slice($contents, 2000, -5000);

function clean_my_words($words) {
  return strtolower($words);
}

$clean_contents = array_map("clean_my_words", $contents);

//$clean_contents = array_filter($clean_contents, function($e) { return strlen($e) > 3; });
$clean_contents = array_filter($clean_contents, function ($e) { return strlen($e) > 3 && strlen($e) < 16; });

$clean_contents = array_filter($clean_contents, function($e) { return !preg_match('#[^a-z]#', $e); });
// preg is looking for any non alphabetical symbols, in that case retruns truth inverted to false by '!', in which case the array item is removed

$clean_contents = array_unique($clean_contents);

file_put_contents('words.txt', join($clean_contents, "\n"));

echo $clean_contents;

 ?>

 <pre>

<?php var_export($clean_contents); ?>

 </pre>
