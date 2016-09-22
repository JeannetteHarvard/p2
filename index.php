<?php
require('dictionary.php')
?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name='viewport' content='width=device-width, initial-scale=1'>

  <title>CSCI-15 Project 2: xkcd Password Generator</title>
  <meta name="description" content="Password Generator">
  <meta name="author" content="Jeannette">

</head>

<body>

  <div class='container'>
    <h1>xkcd Password Generator</h1>

    <p><font color=blue><b><?php echo $password ?></b></font></p>

    <form>
      <label for='numberOfWords'>Number of Words</label>
      <input type='text' maxlength='1' size=1 name='numberOfWords' id='numberOfWords' value=''> (Maximum 9)
      <br>

      <label for='includeANumber'>Include A Number</label>
      <input type='checkbox' name='includeANumber' id='includeANumber' checked>
      <br>

      <label for='includeASymbol'>Include A Symbol</label>
      <input type='checkbox' name='includeASymbol' id='includeASymbol' checked>
      <br>

      <input type='submit' value='Generate New Password!'>

</body>
</html>




<hr>




<pre>
TO INCLUDE:

 Forms
  Inputs
    Checkboxes, radiobuttions

    => SUBMIT to generator.
      Taking form data,
      Generating a password

      array_shuffle or shuffle
      rand()
      // million ways to accomplish this
      // i.e. taking API?
      // scraping external site with English words

      // scrape it only once and put it into text file (file processing in php)
      // or to .cvs (there are php functions for that, and will put it into array)

      // (trump pwd generator :) )

      // chr - returns ascii character based ascii code
</pre>
