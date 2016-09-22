<?php

if (!file_exists('words.csv')) {

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

file_put_contents('words.csv', join($clean_contents, "\n"));

//echo $clean_contents;

//var_export($clean_contents);

}

$words = file_get_contents('words.csv');
$words = explode("\n", $words);
shuffle($words);
//var_export($words);

$password = [];
$numberOfWords = isset ($_GET['numberOfWords']) ? (int) $_GET['numberOfWords'] : 5;
$includeANumber = isset($_GET['includeANumber']) ? $_GET['includeANumber'] == 'on' : false;
$includeASymbol = isset($_GET['includeASymbol']) ? $_GET['includeASymbol'] == 'on' : false;

for ($i = 0; $i < $numberOfWords; $i++) {
  $password[] = $words[$i];
}
$password = join($password, '-');

if($includeANumber){
  $password .= (string) mt_rand(0, 999);
}

if($includeANumber){
  $symbols =  '!"#$%&\'()*+,-.:;<=>?@[\]^_`{|}~';
  $random_symbol = substr($symbols, mt_rand(0, strlen($symbols) - 1), 1);
  $password .= $random_symbol;
}




//var_export($password);
 ?>
