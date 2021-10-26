<html>

<head>
  <title>Distance and Time Calculations</title>
</head>

<body>
  <?php
  $cities = array(
    'Dallas' => 803, 'Toronro' => 435, 'Boston' => 848,
    'Nashville' => 406, 'Las Vegas' => 1526, 'San Francisco' => 1835,
    'Washington, DC' => 595, 'Miami' => 1189, 'Pittsburgh' => 409
  );
  $destinations = $_GET["destination"];
  foreach ($destinations as $destination) {
    echo "destination: " . $destination;
    if (isset($cities[$destination])) {
      $distance = $cities[$destination];
      $time = round(($distance / 60), 2);
      $walktime = round(($distance / 5), 2);
      print "The distance between Chicago and <i>$destination</i> is $distance miles.";
      print "<br>Driving at 60 miles per hour it would take $time hours.";
      print "<br>Walking at 60 miles per hour it would take $walktime hours.";
    } else {
      print "Sorry, do not have destination information for $destination";
    }
    echo "<hr/>";
  }
  ?>
</body>

</html>