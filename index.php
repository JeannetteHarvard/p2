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

    <?php if(isset($error_message)): ?>
      <p class="error_message"><?php echo $error_message; ?></p>
    <?php endif ?>

    <form>
      <label for='numberOfWords'>Number of Words</label>
      <input type='text' maxlength='1' size=1 name='numberOfWords' id='numberOfWords' value='<?php echo $numberOfWords ?>'> (Maximum 9)
      <br>

      <input type="radio" name="delimiterCapital"  <?php echo !$delimiterCapital ? 'checked' : '' ?> value="">&nbsp;Hyphens  & lower case<br>
      <input type="radio" name="delimiterCapital" <?php echo $delimiterCapital ? 'checked' : '' ?> value="on">&nbsp;camelCase
      <br>

      <label for='includeANumber'>Include a Number (0-999)</label>
      <input type='checkbox' name='includeANumber' id='includeANumber' <?php echo $includeANumber ? 'checked' : '' ?>>
      <br>

      <label for='includeASymbol'>Include a Symbol</label>
      <input type='checkbox' name='includeASymbol' id='includeASymbol' <?php echo $includeASymbol ? 'checked' : '' ?>>
      <br>

      <input type='submit' class='btn btn-danger' value='Generate New Trump Password!'>
      <br>
      <p class=note>Words   Source: <a href="http://www.politico.com/story/2016/07/full-transcript-donald-trump-nomination-acceptance-speech-at-rnc-225974">Donald Trump 2016 RNC speech</a>

    </form>

      <p class="password"><?php echo $password ?></p>

    </div>

</body>
</html>
