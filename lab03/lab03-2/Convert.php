<html>

<head>
  <title>Converter</title>
</head>

<body>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
    Deg or Rad ?
    <input type="radio" name="measurand" value="1"> Deg to Rad
    <input type="radio" name="measurand" value="2"> Rad to Deg
    <br>
    <input type="text" name="x">
    <button type="submit">Submit</button>
  </form>

  <?php
  $x = $_GET["x"];
  $measurand = $_GET["measurand"];

  if ($measurand == 1) {
    echo "Convert " . $x . " deg to " . deg2rad($x) .  " rad";
  } else {
    echo "Convert " . $x . " rad to " . rad2deg($x) .  " deg";
  }
  ?>
</body>

</html>