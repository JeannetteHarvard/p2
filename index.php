<?php
require('dictionary.php')
?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name='viewport' content='width=device-width, initial-scale=1'>

  <title>Project 2: xkcd Password Generator</title>
  <meta name="description" content="Password Generator">
  <meta name="author" content="Jeannette">

  <link href='//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css' rel="stylesheet">

  <link href='css/styles.css' rel='stylesheet'>

</head>

<body>

  <div class='container'>
    <h1>Trump Password Generator</h1>

    <p class="error_message"><?php echo $error_message; ?></p>

    <form>
      <label for='numberOfWords'>Number of Words</label>
      <input type='text' maxlength='1' size=1 name='numberOfWords' id='numberOfWords' value='<?php echo $numberOfWords ?>'> (Maximum 9)
      <br>

      <input type="radio" name="delimiterCapital"  <?php echo !$delimiterCapital ? 'checked' : '' ?> value="">&nbsp;Dashes & lower case<br>
      <input type="radio" name="delimiterCapital" <?php echo $delimiterCapital ? 'checked' : '' ?> value="on">&nbsp;Capital case
      <br>

      <label for='includeANumber'>Include a Number (0-999)</label>
      <input type='checkbox' name='includeANumber' id='includeANumber' <?php echo $includeANumber ? 'checked' : '' ?>>
      <br>

      <label for='includeASymbol'>Include a Symbol</label>
      <input type='checkbox' name='includeASymbol' id='includeASymbol' <?php echo $includeASymbol ? 'checked' : '' ?>>
      <br>

      <input type='submit' value='Generate New Trump Password!'>
      <br>
      <p class=note>Note: the words are taken from https://en.wikipedia.org/wiki/Donald_Trump </p>

    </form>

      <p class="password"><?php echo $password ?></p>

    </div>

</body>
</html>
