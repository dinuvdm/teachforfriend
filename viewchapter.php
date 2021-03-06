<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

  <?php include "title.php"?>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- this is the sample comment -->
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <?php include "profilenavigation.php" ?>
<!-- this is the corosoul -->


    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4">teach for friend</h1>
 <ol class="breadcrumb">
   <li class="breadcrumb-item">
     <a href="home.php">Home</a>
   </li>
   <li class="breadcrumb-item active">my tutorials</li>
 </ol>

<?php
$chapterid = $_GET['chapterid'];
$query = "select chaptername from chapters where chapterid='$chapterid'";
$chaptername = (mysqli_fetch_assoc(mysqli_query($conn,$query)));
$chaptername = $chaptername['chaptername'];
?>


  <div class="row ">
    <div class="col-lg-4">
     <?php include "category.php"; ?>
    </div>
    <div class="col-lg-8 cards cards-primary">
      <div class="card-header"> <h2>Topics in <?php echo $chaptername;?></h2></div>
      <div class="card-body">
 <?php

 $sql = "SELECT * FROM topics where chapterid='$chapterid'";
 $result = mysqli_query($conn,$sql);
echo "<ul class='list-group list-unstyled'>";
if(mysqli_num_rows($result) > 0){

while ($row = mysqli_fetch_assoc($result)) {

echo " <p> <li class='list-item'>
<div class='alert alert-primary' role='alert'>
<a href='viewtutorial.php?topicid={$row['chapterid']}'><span class='text-responsive text-responsive'>".$row['topicname']."</span></b></a>
</div>  </li></p>";


 }
}
?>
</ul>
</div>
 </div>
</div>


    <!-- Footer -->
  <?php include "footer.php" ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
