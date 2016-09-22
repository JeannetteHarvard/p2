<?php

// First, let's check whether the file words.csv exists, and if not, we'll parse Wikipedia Trump page for words
if (!file_exists('words.csv')) {

  $contents = file_get_contents("https://en.wikipedia.org/wiki/Donald_Trump");
  $contents = strip_tags($contents);

  // splits the string into array separating by non alphabetic characters
  $contents = preg_split("#[\W\s]#", $contents);

  // strip garbage from the beginning and end of the array
  $contents = array_slice($contents, 2000, -5000);

  // bring to lower case
  function clean_my_words($words) {
    return strtolower($words);
  }
  $clean_contents = array_map("clean_my_words", $contents);

  //$clean_contents = array_filter($clean_contents, function($e) { return strlen($e) > 3; });
  $clean_contents = array_filter($clean_contents, function ($e) { return strlen($e) > 3 && strlen($e) < 16; });

  // looking for any non alphabetical symbols, in that case return truth inverted to false by '!', in which case the array item is removed
  $clean_contents = array_filter($clean_contents, function($e) { return !preg_match('#[^a-z]#', $e); });

  // remove duplicates
  $clean_contents = array_unique($clean_contents);

  // write the array to file, words separated by new lines
  file_put_contents('words.csv', join($clean_contents, "\n"));

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
$delimiterCapital = isset($_GET['delimiterCapital']) ? $_GET['delimiterCapital'] == 'on' : false;

// Checking number of words to be within limitsw

$numberOfWords = min(9, $numberOfWords);
$numberOfWords = max(1, $numberOfWords);

// create array of the right size, capitalizing first letters if needed
for ($i = 0; $i < $numberOfWords; $i++) {
  $password[] = $delimiterCapital ? ucfirst($words[$i]) : $words[$i];
}

// join the array to string, brining '-' separator if it is not Calital delimiter
$password = join($password, $delimiterCapital ? '' : '-');

// adding random number if asked by parameter
if($includeANumber){
  $password .= (string) mt_rand(0, 999);
}

// adding symbol if it's set to be included
if($includeASymbol){
  $symbols =  '!"#$%&\'()*+,-.:;<=>?@[\]^_`{|}~';
  $random_symbol = substr($symbols, mt_rand(0, strlen($symbols) - 1), 1);
  $password .= $random_symbol;
}

//var_export($password);
 ?>
