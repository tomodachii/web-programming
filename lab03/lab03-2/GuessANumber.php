<html>

<head>
  <title>Hay chon gia dung</title>
</head>

<body>
  <font size="5" color="blue">Enter a number from 1 to 100</font>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>">
    Select a number: <input type="number" name="guess" min="0" max="100">
    <button type="submit">Submit</button>
  </form>

  <?php
  srand((float) microtime() * 10000000);
  $random = rand(0, 100);
  $guess = $_GET["guess"];
  $times = 1;

  if ($guess < 0 || $guess > 100) {
    echo "Invalid Input!!";
  } else {
    if ($guess > $random) {
      echo "Wrong. Please try a lower number. You have guessed " . $times . " time!";
      $times++;
    } else if ($guess < $random) {
      echo "Wrong. Please try a higher number. You have guessed " . $times . " time!";
      $times++;
    } else {
      echo "Good job!";
      $times = 1;
    }
  }
  echo "\nrandom value: " . $random;
  ?>
</body>

</html>