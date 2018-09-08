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
	$sql2 = "SELECT Insurance_Id,Student_Id FROM tbl_Add_Insurance WHERE Student_Id = '".$_POST["sid"]."'";
     $result = mysqli_query($conn,$sql2);
      $row = mysqli_fetch_array($result);
	    if($row['Insurance_Id']==null){
			echo "You have not added Insurance or Student Id does not match";
	   }
	else{
			$sql1 = "INSERT INTO tbl_Claims(Student_Id,Insurance_Id,TreatmentDate,DiseaseCategory,TypesOfService,Hospital,TotalAmount,AmountPaid)VALUES('".$_POST["sid"]."','".$row['Insurance_Id']."','".$_POST["td"]."','".$_POST["dc"]."','".$_POST["ts"]."','".$_POST["hc"]."','".$_POST["ta"]."','".$_POST["pp"]."')";
	$retval1 = mysqli_query($conn,$sql1);

if(!$retval1){
	echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);
   
} else{
     echo "Records inserted successfully.";
}
 }
 
	}
			$sql3 = "Select * from tbl_Claims WHERE (select Insurance_Id from tbl_Add_Insurance where Register_Id = '".$_SESSION['login_register_id']."')";
		$result1 = mysqli_query($conn,$sql3);
		if(! $conn ) {
		   die('Could not connect: ' . mysqli_error());
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
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#claim">ClaimDetails</a>
            </li>
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
      </div>
    </nav>
    <div class="container">
        <div class="panel panel-primary" style="width:750px;margin:0px auto">
              <div class="panel-heading">Please Add Claims</div>
              <div class="panel-body">
                <form action="claims.php" method="post" data-toggle="validator" role="form">
				
						<div class="form-group">
                        <label class="control-label" for="sid">Student Id</label>
                        <input type="text" name="sid" class="form-control" id="sid" placeholder="StudentId" required autofocus>
						<div class="help-block with-errors"></div>
                        </div>
						<div class="form-group">
                        <label class="control-label" for="td">TreatmentDate</label>
                        <input type="Date" name="td" class="form-control" id="td" required autofocus>
						<div class="help-block with-errors"></div>
                        </div>
						<div class="form-group">
						<label class="control-label"  for="dc">DiseaseCategory</label>
						<input type="text" name="dc" class="form-control" id="dc" placeholder="DiseaseCategory" required autofocus>
						<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">            
						<label class="control-label"  for="ts">TypesOfService</label>
						<input type="text" name="ts" class="form-control" id="ts" placeholder="TypesOfService" required autofocus>
						<div class="help-block with-errors"></div>
						</div>
                    
			<div class="form-group"> 
               <label class="control-label"  for="hc">Hospital/clinic</label>
                <input type="text" name="hc" class="form-control" id="hc" placeholder="Hospital/clinic" required autofocus>
                        <div class="help-block with-errors"></div>
						</div>
                   
			<div class="form-group">			
            <label class="control-label" for="ta">Total Amount</label>
             <input type="text" name="ta" class="form-control" id="ta" placeholder="Total Amount" required autofocus>
                        <div class="help-block with-errors"></div>
						</div>
			<div class="form-group">            
			<label class="control-label"  for="pp">Patient Paid</label>
            <input type="text" name="pp" class="form-control" id="pp" placeholder="Patient Paid" required autofocus>
            <div class="help-block with-errors"></div>
			</div>
			<div class="form-group">
             <button class="btn btn-success" type="submit" id="add" name="add">
			  AddClaims
			  </button>
             </div>
            </form>
			</div>
		</div>
      </div>
	  <!-- Portfolio Grid Section -->
    <section class="portfolio" id="claim">
      <div class="container">
       <table id="mytable" class="table table-dark">
                   <thead>
				   <tr>
				   <th scope="col">Student_Id</th>
                   <th scope="col">TreatmentDate</th>
                   <th scope="col">DiseaseCategory</th>
                   <th scope="col">TypesOfService</th>
                   <th scope="col">Hospital</th>
                   <th scope="col">TotalAmount</th>
				   <th scope="col">AmountPaid</th>
                   </tr>
                   </thead>
				   <tbody>
				   <?Php
				   if($result1!=null){
					   		   while($row = mysqli_fetch_array($result1)){
									   echo "<tr>
						<td>".$row['Student_Id']."</td>
						<td>".$row['TreatmentDate']."</td>
						<td>".$row['DiseaseCategory']."</td>
						<td>".$row['TypesOfService']."</td>
						<td>".$row['Hospital']."</td>
						<td>".$row['TotalAmount']."</td>
						<td>".$row['AmountPaid']."</td>
						</tr>";
	}
				   }
		
	?>
    </tbody>     
</table>
      </div>
    </section>

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
