<html>

<head>
  <title>Our Shop</title>
</head>

<body>
  <font size=4 color="blue">
    <?php
    $today = date('l, F d, Y');
    print "Welcome on $today to our huge blowout sale!</font>";
    $month = date('m');
    $year = date('Y');
    $dayOfYear = date('z');

    if ($year == 2021) {
      $daysLeft = 365 - $dayOfYear + 10;
      print "<br> There are $daysLeft sales days left";
    } elseif ($month == 01 && $year == 2022) {
      if ($dayOfYear <= 10) {
        $daysLeft = (10 - $dayOfYear);
        print "<br> There are $daysLeft sales days left";
      } else {
        print "<br> Sorry, out sale is over";
      }
    } else {
      print "<br> Sorry, out sale is over";
    }
    print "<br> Our Sale Ends Janurary Janurary 10, 2022";
    ?>
  </font>
</body>

</html>