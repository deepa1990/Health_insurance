<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Health Insurance</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
	

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">
	
	<!---carousel--->
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"></link>
        <script src="https://code.jquery.com/jquery-1.12.4.js">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js">
        </script>

  </head>
<body id="page-top">
<?php
	session_start();
	include 'config.php';
  $conn = mysqli_connect($servername, $username, $password, $database);
 if(!$conn){
die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['add'])){
	$sql1 = "INSERT INTO tbl_Add_Insurance(Student_Id,Register_Id,CoursesEnrolled,InsuranceTerm,InsuranceStartDate,InsuranceEndDate)VALUES('".$_POST["inputsId"]."','".$_SESSION['login_register_id']."','".$_POST["inputce"]."','".$_POST["inputIterm"]."','".$_POST["inputIStartDate"]."','".$_POST["InputIEndDate"]."')";
	$retval1 = mysqli_query($conn,$sql1);

if(!$retval1){
	echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);
   
} else{
     echo "Records inserted successfully.";
}

 }
mysqli_close($conn);
?>
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Student Health Insurance</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php">Home</a>
            </li>
				<li class="nav-item mx-0 mx-lg-1">
			<?Php
				if($_SESSION['First_Name'] != null){
				$name = $_SESSION['First_Name'];
				echo "<div class='collapse navbar-collapse' id='navbarResponsive'>
					  <ul class='navbar-nav ml-auto'>
						<li class='nav-item mx-0 mx-lg-1'>
						  <a class='nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger'>Hi ";
				echo $name.'  ';
				 echo "</a></li></ul></div>";
				}
			?>
			</li>
			<li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="StudentLogin.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
        <div class="panel panel-primary" style="width:750px;margin:0px auto">
              <div class="panel-heading">Please Add Insurance</div>
              <div class="panel-body">
                <form method="post" data-toggle="validator" role="form">
				
                    <div class="form-group">
                    <label for="inputsId" class="control-label">StudentID</label>
                    <input type="text" name="inputsId"  class="form-control" id="inputsId" placeholder="StudentId" data-error="Please enter StudentId." required autofocus>
					<div class="help-block with-errors"></div>
                    </div>
					<div class="form-group">
					<label for="inputce" class="control-label">CoursesEntrolled</label>
                    <input type="text" name="inputce" class="form-control" id="inputce" data-error="Please enter the course enrolled." placeholder="CoursesEnrolled" required autofocus>
                    <div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
					<label for="inputIterm" class="control-label">InsuranceTerm</label>
					<input type="text" name="inputIterm" class="form-control" id="inputIterm" data-error="Please enter Insurance Term." placeholder="InsuranceTerm" required autofocus>
					<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
					<label for="inputIStartDate" class="control-label">InsuranceStartDate</label>
					<input type="Date" name="inputIStartDate" class="form-control" id="inputIStartDate" data-error="Please enter Insurance start date." required>
					<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
					<label for="inputIEndDate" class="control-label">InsuranceEndDate</label>
					<input type="Date" name="InputIEndDate" class="form-control" id="InputIEndDate" data-error="Please enter Insurance end date." required>
					<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
					<button class="btn btn-success" type="submit" id="add" name="add">
					AddInsurance
					</button>
					</div>
            </form>
		</div>
	</div>
</div>
<!-- Footer -->
	<footer class="footer text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Location</h4>
            <p class="lead mb-0">2215 John Daniel Drive
              <br>Clark, MO 65243</p>
          </div>
          <div class="col-md-4">
            <h4 class="text-uppercase mb-4">Around the Web</h4>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fa fa-fw fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fa fa-fw fa-google-plus"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fa fa-fw fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fa fa-fw fa-linkedin"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fa fa-fw fa-dribbble"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Copyright &copy; Your Website 2018</small>
      </div>
    </div>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

	  <div id="registerMsg" style="visibility:hidden;color:Red">You Have successfully registered</div>
 
  

<script>
function submitForm(){
var register = document.getElementById('registerMsg');
register.style.visibility = 'visible';
}
</script>
<!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>



</body>
</html>
