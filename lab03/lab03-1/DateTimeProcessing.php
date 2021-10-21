<html>

<head>
  <title>A simple form</title>
  <style>
    .option--small {
      width: 40px;
    }

    .option--big {
      width: 60px;
    }
  </style>
</head>

<body>
  <p>Enter your name and select date and time for the appointment</p>
  <form action="<?php

                use function PHPSTORM_META\type;

                echo $_SERVER['PHP_SELF'] ?>" method="GET">
    <?php
    if (array_key_exists("day", $_GET)) {
      $day = $_GET["day"];
      $month = $_GET["month"];
      $year = $_GET["year"];
      $hour = $_GET["hour"];
      $minute = $_GET["minute"];
      $second = $_GET["second"];
    } else {
      $day = 1;
      $month = 1;
      $year = 2021;
      $hour = 0;
      $minute = 0;
      $second = 0;
    }

    function generateSelect($name, $value, $max)
    {
      print '<select name="' . $name . '">';
      for ($i = 0; $i <= $max; $i++)
        if ($value == $i)
          print "<option selected>$i</option>";
        else
          print "<option>$i</option>";
      print '</select>';
    }

    ?>
    <table>
      <tr>
        <td align="left">Your name:</td>
        <td>
          <input type="text" size="15" name="name" />
        </td>
      </tr>
      <tr>
        <td align="left">Date:</td>
        <td>
          <table>
            <tr>
              <td class="option--small"><?php generateSelect("day", $day, 31) ?></td>
              <td class="option--small"><?php generateSelect("month", $month, 12) ?></td>
              <td class="option--big"><?php generateSelect("year", $year, 3000) ?></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td align="left">Time:</td>
        <td>
          <table>
            <tr>
              <td class="option--small"><?php generateSelect("hour", $hour, 24) ?></td>
              <td class="option--small"><?php generateSelect("minute", $minute, 60) ?></td>
              <td class="option--small"><?php generateSelect("second", $second, 60) ?></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td align="right"><input type="submit" value="Submit" /></td>
        <td align="left"><input type="reset" value="Reset" /></td>
      </tr>
    </table>
  </form>

  <?php
  function isLeapYear($year)
  {
    if ($year % 400 == 0)
      return true;
    if ($year % 4 == 0)
      return true;
    else if ($year % 100 == 0)
      return false;
    else
      return false;
  }
  function checkValidDate($day, $month, $year)
  {
    if ($month == 2) {
      if (isLeapYear(($year)) && $day > 29) {
        return false;
      }
      if ($day > 28) {
        return false;
      }
    }
    if ($month == 4 || $month == 6 || $month == 9 || $month == 11) {
      if ($day > 30) {
        return false;
      }
    }
    return true;
  }

  function isPM($hour)
  {
    if ($hour > 12) {
      return 1;
    }
    return 0;
  }

  function daysInMonth($month, $year)
  {
    if ($month == 2) {
      if (isLeapYear(($year))) {
        return 29;
      }
      return 28;
    }
    if ($month == 4 || $month == 6 || $month == 9 || $month == 11) {
      return 30;
    }
    return 31;
  }

  if (checkValidDate($day, $month, $year)) {
    echo "<p>Hi " . $_GET["name"] . " !!</p>";
    echo "<p>You have choose to have an appointment on " . $hour . ":" . $minute . ":" . $second . ", " . $day . "/" . $month . "/" . $year . "</p>";
    echo "<p> More information </p>";
    if (isPM($hour)) {
      echo "<p>In 12 hours, the time and date is" . $hour - 12 . ":" . $minute . ":" . $second . "PM, " . $day . "/" . $month . "/" . $year . "</p>";
    } else {
      echo "<p>In 12 hours, the time and date is" . $hour . ":" . $minute . ":" . $second . "AM, " . $day . "/" . $month . "/" . $year . "</p>";
    }
    echo "<p> This month has " . daysInMonth($month, $year) . " days!</p>";
  } else {
    echo "invalid input";
  }
  ?>

</body>

</html>