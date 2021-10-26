<html>

<head>
  <title>File List</title>
</head>

<body>
  <br>
  <h4>Files's Information Unsort</h4>
  <?php
  $fileInfo = array();
  $fileInfo[0] = array("name" => 'Vip.txt', "type" => 'txt', "date" => '2020/04/12', "size" => 12);
  $fileInfo[1] = array("name" => 'Image.jpg', "type" => 'jpg', "date" => '2020/05/21', "size" => 0.4);
  $fileInfo[2] = array("name" => 'Text.odt', "type" => 'odt', "date" => '2019/10/1,',  "size" => 5.5);
  $fileInfo[3] = array("name" => 'OHOH.php', "type" => 'php', "date" => '2021/03/23',  "size" => 0.1);
  $fileInfo[4] = array("name" => 'Score.slxx', "type" => 'slxx', "date" => '2020/12/30', "size" => 2.2);
  $fileInfo[5] = array("name" => 'Hello.mp3', "type" => 'mp3', "date" => '2018/02/22', "size" => 3.4);
  $arrLength = count($fileInfo);
  ?>
  <table>
    <th>Name</th>
    <th>Type</th>
    <th>Date</th>
    <th>Size</th>

    <?php
    $category = array("name", "type", "date", "size");
    for ($i = 0; $i < $arrLength; $i++) {
      print '<tr>';
      for ($j = 0; $j < 4; $j++) {
        print '<td>' . $fileInfo[$i][$category[$j]] . '</td>';
      }
      print '</tr>';
    }
    ?>
  </table>

  <br>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
    <input type="radio" name="sort_type" value="name"> Sort By Name
    <input type="radio" name="sort_type" value="date"> Sort By Date
    <br>
    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
  </form>

  <table>
    <th>Name</th>
    <th>Type</th>
    <th>Date</th>
    <th>Size</th>

    <?php
    function sortByName($a, $b)
    {
      return strcmp($a["name"], $b["name"]);
    }
    function sortByDate($a, $b)
    {
      return strtotime($a["date"]) - strtotime($b["date"]);
    }

    $sort_type = "";
    if (array_key_exists("sort_type", $_GET)) {
      $sort_type = $_GET["sort_type"];
      if ($sort_type == "name") {
        usort($fileInfo, 'sortByName');
      }
      if ($sort_type == "date") {
        usort($fileInfo, 'sortByDate');
      }
    }

    for ($i = 0; $i < $arrLength; $i++) {
      print '<tr>';
      for ($j = 0; $j < 4; $j++) {
        print '<td>' . $fileInfo[$i][$category[$j]] . '</td>';
      }
      print '</tr>';
    }
    ?>
  </table>
</body>

</html>