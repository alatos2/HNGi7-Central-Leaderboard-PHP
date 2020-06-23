<?php
  // get json file
  $r = file_get_contents('./data/board.json');
  $boards = json_decode($r, true);

  // sort points by desc order
  function sortByOrder($a, $b) {
    return $b['points'] - $a['points'];
  }
  usort($boards, 'sortByOrder');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./assets/style.css">
    <title>Leaderboard</title>
</head>
<body>
    <div class="container">
    <h2>HNGi7 Central Leaderboard (Sorted)</h2>
    <p style="text-align:center"><a href="upload.php">Upload file in json format</a></p>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
          <?php
            foreach ($boards as $board_name => $board_val) {
                echo '<tr>';
                echo '<td><b>' . $board_val['fullname'] . '</b></td>';
                echo '<td>' . $board_val['username'] . '</td>';
                echo '<td>' . $board_val['email'] . '</td>';
                echo '<td>' . $board_val['points'] . '</td>';
                echo '<td><a href="#">share position on facebook</a></td>';
                echo '</tr>';
            }
          ?>
        </tbody>
        </table>
    <hr>
    <div style="text-align: center;">&copy; 2020</div>
    </div>
    </body>
</html>
<script src="./assets/main.js"></script>
