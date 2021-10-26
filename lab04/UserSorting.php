<html>

<head>
  <title>User Sorting</title>
</head>

<body>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

    <div style="display: grid; grid-template-columns: repeat(4, 1fr);">
      <div><input type="radio" name="sort_type" value="sort" /> Standard sort<br /></div>
      <div><input type="radio" name="sort_type" value="rsort" /> Reverse sort<br /></div>
      <div><input type="radio" name="sort_type" value="usort" /> User-defined sort<br /></div>
      <div><input type="radio" name="sort_type" value="ksort" /> Key sort<br /></div>
      <div><input type="radio" name="sort_type" value="krsort" /> Reverse key sort<br /></div>
      <div><input type="radio" name="sort_type" value="uksort" /> User-defined key sort<br /></div>
      <div><input type="radio" name="sort_type" value="asort" /> Value sort<br /></div>
      <div><input type="radio" name="sort_type" value="arsort" /> Reverse value sort<br /></div>
      <div><input type="radio" name="sort_type" value="uasort" /> User-defined value sort<br /></div>
    </div>

    <p align="center">
      <input type="submit" value="sort" name="submitted" />
    </p>

    <?php
    function user_sort($a, $b)
    {
      // smarts is all-important, so sort it first
      if ($b == 'smarts') {
        return 1;
      } else if ($a == 'smarts') {
        return -1;
      }

      return ($a == $b) ? 0 : (($a < $b) ? -1 : 1);
    }

    $values = array(
      'name' => 'Buzz Lightyear',
      'email_address' => 'buzz@starcommand.gal',
      'age' => 32,
      'smarts' => 'some'
    );

    $check_key_exist = 0;
    $sort_type = "";
    if (array_key_exists("sort_type", $_POST)) {
      $sort_type = $_POST["sort_type"];
      $check_key_exist = 1;
    }

    switch ($sort_type) {
      case 'usort':
        usort($values, 'user_sort');
        break;
      case 'asort':
        asort($values);
        break;
      case 'rsort':
        rsort($values);
        break;
      case 'ksort':
        ksort($values);
        break;
      case 'arsort':
        arsort($values);
        break;
      case 'krsort':
        krsort($values);
        break;
      default:
        # code...
        break;
    }

    ?>

    <p>
      Values <?php print $check_key_exist ? "sorted by $sort_type" : "unsorted"; ?>:
    </p>

    <ul>
      <?php
      foreach ($values as $key => $value) {
        echo "<li><b>$key</b>: $value</li>";
      }
      ?>
    </ul>
  </form>

</body>

</html>