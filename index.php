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

  <link href='//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css' rel="stylesheet">


  <style>
  body {
      background-image: url(img/trump.jpg);
      background-size: cover;
      background-position: top center;
    }
    .password {
      font-size: 2em;
      text-align: center;
      color: #E39000;
      font-weight: bold;
      text-shadow: 2px 2px #7A4D00;
    }


  </style>

</head>

<body>

  <div class='container'>
    <h1>Trump Password Generator</h1>

    <form>
      <label for='numberOfWords'>Number of Words</label>
      <input type='text' maxlength='1' size=1 name='numberOfWords' id='numberOfWords' value='<?php echo $numberOfWords ?>'> (Maximum 9)
      <br>

      <input type="radio" name="wordsDelimiter"  <?php echo !$wordsDelimiter ? 'checked' : '' ?> value="">&nbsp;Dashes & lower case<br>
      <input type="radio" name="wordsDelimiter" <?php echo $wordsDelimiter ? 'checked' : '' ?> value="on">&nbsp;Capital case
      <br>

      <label for='includeANumber'>Include A Number (0-999)</label>
      <input type='checkbox' name='includeANumber' id='includeANumber' <?php echo $includeANumber ? 'checked' : '' ?>>
      <br>

      <label for='includeASymbol'>Include A Symbol</label>
      <input type='checkbox' name='includeASymbol' id='includeASymbol' <?php echo $includeASymbol ? 'checked' : '' ?>>
      <br>

      <input type='submit' value='Generate New Trump Password!'>
      <br>
      Note: the words are taken from https://en.wikipedia.org/wiki/Donald_Trump 

      <br><br><br><br><br><br><br><br><br>

      <p class="password"><?php echo $password ?></p>



</body>
</html>
