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
 include 'config.php';
  $conn = mysqli_connect($servername, $username, $password, $database);
 if(!$conn){
die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['login'])) {
	 $myemail = mysqli_real_escape_string($conn,$_POST['inputEmail']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['inputPassword']); 
	  
	  $sql = "SELECT Admin_Id,FirstName,LastName FROM tbl_Admin WHERE Email = '$myemail' and AdminPassword = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);
      
      $count = mysqli_num_rows($result);
	  
	   if($count==1) {
	   if($row['Admin_Id']!=null){
		    	 header("location: AdminPage.php");

	   }else{
		  header("location: AdminLogin.php"); 
	   }

}else{
  echo "<div class='container'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Your Login Name or Password is invalid</div></div>";

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
      </div>
    </nav>
<div class="container">
        <div class="panel panel-primary" style="width:750px;margin:0px auto">
              <div class="panel-heading">Admin Login</div>
              <div class="panel-body">
                <form data-toggle="validator" role="form" method="post" action="<?php $_PHP_SELF ?>" name="login" id="login">
              <div class="form-group">
                    <label for="inputEmail" class="control-label">Email</label>
                    <input type="email" name="inputEmail" class="form-control" id="inputEmail" placeholder="Email" required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="control-label">Password</label>
                      <input type="password" name="inputPassword" data-minlength="5" class="form-control" id="inputPassword" data-error="must enter minimum of 5 characters" placeholder="Password" required>
                      <div class="help-block with-errors"></div>
                    </div>
             <div class="form-group">
					<button type="submit" class="btn btn-success" name="login" id="login"><i class="fa fa-sign-in"></i>Login</button>
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

	
    
<div id="registerMsg" style="visibility:hidden;color:Red">You Have successfully LoggedIn</div>

<script language="javascript">
function submitForm(){
var email = document.getElementById("email");
var password = document.getElementById("password");
if (emailValidation(email, "* Please enter a valid email address *")) {
if (passwordValidation(password, "* Please enter a valid password *")){
return true;
}
}
return false;
}
function emailValidation(inputtext, alertMsg) {
var emailExp =  /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;;
if (inputtext.value.match(emailExp)) {
return true;
} else {
document.getElementById('p3').innerText = alertMsg; // This segment displays the validation rule for email.
inputtext.focus();
return false;
}
}
function passwordValidation(inputtext, alertMsg){
var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
if (inputtext.value.match(re)) {
return true;
} else {
document.getElementById('p4').innerText = alertMsg; // This segment displays the validation rule for password.
inputtext.focus();
return false;
}
}
function relocate_home(){
var SignUp = document.getElementById('signUp');
window.location.href = "AdminPage.php";
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