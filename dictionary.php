<?php

error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
ini_set('display_errors', 1); # Display errors on page (instead of a log file)


// First, let's check whether the file words.csv exists, and if not, we'll parse Wikipedia Trump page for words
if (!file_exists('words.csv')) {

  $url = 'http://en.wikipedia.org/wiki/Donald_Trump';
  //$url = "http://www.politico.com/story/2016/07/full-transcript-donald-trump-nomination-acceptance-speech-at-rnc-225974";
  echo $url;
  //$contents = file_get_contents(urlencode($url));
  $contents = file_get_contents($url);
  //$contents = file_get_contents("http://en.wikipedia.org/wiki/Donald_Trump");
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

  // Let's remove the words which are too short or too long
  $clean_contents = array_filter($clean_contents, function ($e) { return strlen($e) > 3 && strlen($e) < 16; });

  // looking for any non alphabetical symbols, in that case return truth inverted to false by '!', in which case the array item is removed
  $clean_contents = array_filter($clean_contents, function($e) { return !preg_match('#[^a-z]#', $e); });

  // remove duplicates
  $clean_contents = array_unique($clean_contents);

  // write the array to file, words separated by new lines
  file_put_contents('words.csv', join($clean_contents, "\n"));

  //var_export($clean_contents);

}

// Let's get words out of the file!
$words = file_get_contents('words.csv');
$words = explode("\n", $words);
shuffle($words);
//echo count($words);
//var_export($words);

$password = [];

$numberOfWords = isset($_GET['numberOfWords']) ? $_GET['numberOfWords'] : 3;

// let's check number of words set by user
if (!is_numeric($numberOfWords)){
  $error_message = "For <i>number of words</i> please enter <i>a number</i>.<br>For now we'll set the number to 3!";
  $numberOfWords = 3;
} elseif ((1 <= $numberOfWords) && ($numberOfWords <= 9)) {
  //$error_message = "All is Ok!";
} else {
  $error_message = "The <i>number of words</i> should be in the range <i>from 1 to 9</i>!<br>For now we'll set the number to 5!";
  $numberOfWords = 5;
}

$includeANumber = isset($_GET['includeANumber']) ? $_GET['includeANumber'] == 'on' : false;
$includeASymbol = isset($_GET['includeASymbol']) ? $_GET['includeASymbol'] == 'on' : false;
$delimiterCapital = isset($_GET['delimiterCapital']) ? $_GET['delimiterCapital'] == 'on' : false;

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
