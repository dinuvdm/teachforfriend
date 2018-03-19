<?php
	session_start();

	if (!isset($_SESSION['access_token'])) {
		header('Location: signin.php');
		exit();
	}
	$uid=$_SESSION['id'];
  $givenName=$_SESSION['givenName'];
  $familyName=$_SESSION['familyName'];
  $email=$_SESSION['email'];
  $gender=$_SESSION['gender'];

?>
<?php include "dbcon.php"?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="home.php">teach for friend</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
				<form action="searchresult.php" method="POST" class="form-inline">
        <li class="nav-item">

          <input type="text"  placeholder="Search your friend" id="search" name="search" class="form-control" required>

        </li>
		<!--		<li class="nav-item">
					<select name="searchtype" class="form-control" required>
          <option value="">searchtype</option>
					<option value="username">email</option>
					<option value="givenName">first</option>
						<option value="familyName">last</option>
					<option "subjectname">subject</option>
						<option value="chaptername">chapter</option>
							<option value="topicname">topic</option>
        </select>
				</li>
			-->
        <li class="nav-item">
        <button type="submit" name="searchfriend" value="search" class="btn-success form-control"><i class="fa fa-search"></i></button>
        </li>
          </form>
        <li class="nav-item">
          <a class="nav-link" href="home.php">Home</a>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span id="username"><?php echo $_SESSION['givenName'].$_SESSION['familyName']?></span>
            <img class="img-fluid rounded-circle" width="30" height="30" src="<?php echo $_SESSION['picture']; ?>">
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
            <a class="dropdown-item" href="profile.php">profile</a>
            <a class="dropdown-item" href="mytutorials.php">my tutorials</a>
            <a class="dropdown-item" href="addtutorial.php">Add tutorials</a>
					  <a class="dropdown-item" href="about.php">about</a>
					  <a class="dropdown-item" href="signout.php">SignOut</a>
          </div>
        </li>
				<li class="nav-item">
					<a class="nav-link" href="help.php">Help</a>
				</li>


      </ul>
    </div>
  </div>
</nav>
