<?php
session_start();
require_once 'db_handler.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $title = $_POST['title'];
  $commented = $_POST['commented'];
  $created_by = $_SESSION['email'];
  $date = date('Y-m-d H:i:s');
  $result = createNewPost($title, $created_by, $date, $commented);
}

$allposts = getAllPosts();


?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles-homepage.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

  <div class="header">
    <img src="fcit.png" alt="" class="headerimg">
  </div>

  <div class="navbar">
    <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a>
    <a id="" href=""><i class="fa fa-fw fa-user"></i>My Profile</a>
  </div>

  <div class="row">
    <div class="leftcolumn">
      <?php
      if (!empty($allposts)) {
        foreach ($allposts as $post) {
      ?>
          <div class="card">
            <h2><?= $post['title'] ?></h2>
            <h5><?= date(' Y/m/d h:i a', strtotime($post['date'])) ?></h5>
            <p><?= $post['commented'] ?></p>
            <h6>Posted By: <?= $post['name'] ?></h6>
          </div>
      <?php
        }
      } else {
        echo "";
      }
      ?>

      <div id="text_area">
        <form method="POST">
          <input type="text" name="title" id="title" placeholder="title" required />
          <br>
          <textarea name="commented" id="" cols="130" rows="10" placeholder="Please write your post here"></textarea>
          <br>
          <input type="submit" value="Create new Post">
          <input type="reset" value="Clear">
        </form>
      </div>
    </div>

    <?php
    if (isset($_SESSION['name'])) {
    ?>
      <div class="rightcolumn">
        <div class="card">
          <br><br>
        <img class="hsimg" src="images/profile.png" alt="Profile Picture">
          <h2>About Me</h2>
          
          <h3>
            <?php
            echo $_SESSION['name'];
            ?>
          </h3>
          
        </div>
      <?php
    }
      ?>

      </div>
  </div>

  <div class="footer">
    <h3>Copyright © 2021 FCIT Blog. All rights reserved.</h3>
  </div>

</body>

</html>