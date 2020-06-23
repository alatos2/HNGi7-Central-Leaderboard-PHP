<?php
  // Check if the form was submitted
  if($_SERVER["REQUEST_METHOD"] == "POST"){
      // Check if file was uploaded without errors
      if(isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0){
        // get file name
        $filename = $_FILES["fileToUpload"]["name"];
          // check if json file exist
          if(file_exists("./data/" . $filename)){
              // replace json file
              unlink("./data/board.json");
              move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "./data/" . $filename);
              header("Location: index.php");
          } else{
              echo "File name must be board.json";
          }
      }
    }
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
        <h3>Upload JSON File</h3>
        <p>* Note: You can onlu upload json file | <a href="index.php"><< Back</a></p>
        <hr>
        <div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <label>Upload JSON File:</label>
            <input type="file" name="fileToUpload"  id="fileToUpload" required class="form-control" accept=".json"><br>
            <input type="submit" class="btn btn-success" value="Upload">
        </form>
    </div>
    </div>
</html>
