<html>

<head>
  <title>Receiving Input</title>
</head>

<body>
  <font size=5>Thank you: Got your input.</font>
  <br>
  <?php
  $userName = $_POST["username"];
  $password = $_POST["password"];
  $class = $_POST["class"];
  $email = $_POST["email"];
  $count = 1;

  echo "Hello " . $userName;
  echo "Your password is: " . $password . '<br/>';
  echo "I even know your class, it is " . $class . "<br/>";
  echo "And your email too, " . $email . "<br/>";
  echo "<br/>Your hobbies: <br/>";

  function getHobby($hobby)
  {
    global $count;

    if (array_key_exists($hobby, $_POST)) {
      $hb = $_POST[$hobby];
      if ($hb == "on") {
        echo $count;
        $count++;
        echo ". " . $hobby . "</br>";
      }
    }
  }

  getHobby("game");
  getHobby("movies");
  getHobby("books");
  getHobby("drugs");
  getHobby("chicks");
  getHobby("vodka");
  getHobby("other");
  ?>
</body>

</html>