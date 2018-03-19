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

      <h1 class="my-4">Welcome teach for friend <?php echo $_SESSION['givenName'].$_SESSION['familyName'] ?></h1>

 <ol class="breadcrumb">
   <li class="breadcrumb-item">
     <a href="index.php">Home</a>
   </li>
   <li class="breadcrumb-item active">edit tutorial</li>
 </ol>
 <div class="row">
   <h1>edit tutorial</h1>
</div>
<div class="row">
<?php
$topicid = $_GET['topicid'];
$query="select * from topics where topicid = '$topicid'";
$result = mysqli_query($conn,$query);
$r=mysqli_fetch_assoc($result);
$materialurl = $r['materialurl'];
$description = $r['description'];
$topicurl = $r['topicurl'];
$topicname=$r['topicname'];
?>
 <form class="col-md-10" action="edittutorialsubmit.php" method="post">
   <div class="form-item">
     <label for="userid">Email address</label>
     <input type="email" class="form-control" id="userid" name="userid" value="<?php echo $_SESSION['email'];?>" readonly>
     <input type="hidden" value="<?php echo $topicid;?>" name="topicid">
   </div>
<!-- this is to be connected to the databas-->
<div class="form-item" >
   <label for="subject">select an subject</label>
<select class='form-control' id="subject" name="subjectid">
  <option value=''>select an subject</option>
<?php
$email = $_SESSION['email'];
$sql = "SELECT * FROM subjects where userid='$email'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){

while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row['subjectid'] ."'>" . $row['subjectname'] ."</option>";
}
}
echo "</select>";
?>
<div class="form-control">
<a class="button-primary" href="editaddsubject.php?topicid='<?php echo $topicid?>'" >Add subject</a><span class="text-danger">If the subject is new?</span>
</div>
</div>
<div class="form-item">
   <label for="chapter">select an chapter</label>
<select class='form-control' id="chapter" name="chapterid">
  <option value=''>select an chapter</option>
<?php

$sql = "SELECT * FROM chapters where userid='$email'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){

while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row['chapterid'] ."'>" . $row['chaptername'] ."</option>";
}
}
echo "</select>";
?>

<div class="form-control ">
<a class="button-primary" href="editaddchapter.php?topicid='<?php echo $topicid  ;?>'" >Add chapter</a><span class="text-danger">If the subject is new?</span>
</div>
</div>

   <div class="form-control">
     <label for="tname">topic name:</label>
     <input type="text" class="form-control" id="tname"  name="topicname"  value="<?php echo $topicname;?>" placeholder="enter the topic name" required>
   </div>

   <div class="form-control">
     <label for="turl">Topic embed url:</label>
     <textarea row="5" class="form-control" id="turl"  name="topicurl"  placeholder="paste the topic embed url"><?php echo $topicurl;?></textarea>
   </div>
   <div class="form-item">
     <label for="description">description:</label>
     <textarea row="5" class="form-control" id="description"  name="description"  placeholder="enter the tutorial description" ><?php echo $description;?></textarea>
   </div>
   <div class="form-item">
     <label for="murl">material embed url:</label>
     <textarea row="5" class="form-control" id="turl"  name="materialurl"  placeholder="paste the material url"><?php echo $materialurl;?></textarea>
   </div>

   <button type="submit" class="btn btn-success">Submit</button>
 </form>


</div>





    <!-- Footer -->
  <?php include "footer.php" ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
