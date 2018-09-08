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

	<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
</style>
	</head>
	<body bgcolor="#E6E6FA">
	<?php
 include 'config.php';
  $conn = mysqli_connect($servername, $username, $password, $database);
 if(!$conn){
die("Connection failed: " . mysqli_connect_error());
}else{
	$sql = "Select * from tbl_Add_Insurance";
		$result = mysqli_query($conn,$sql);
		}
mysqli_close($conn);
?>
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
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="AdminLogin.php">Logout</a>
            </li>
          </ul>
		  </div>
  </div>
    </nav>
  <div class="Container">
       <table  align="center" id="tbl">
                   <thead>
				   <tr>
				   <th scope="col">ApprovalStatus</th>
				   <th scope="col">Student_Id</th>
                   <th scope="col">CoursesEnrolled</th>
                   <th scope="col">InsuranceTerm</th>
                   <th scope="col">InsuranceStartDate</th>
                   <th scope="col">InsuranceEndDate</th>
                   </tr>
                   </thead>
				   <tbody>
				     <?Php
				   if($result!=null){
					   		   while($row = mysqli_fetch_array($result)){
						echo "<tr>
						<div class='form-check form-check-inline'>
					  <td><input type='checkbox' value ='' name='approveclaims' onchange='checking(this.checked)' class='form-check-input'></td>
					   <td>".$row['Student_Id']."</td>
						<td>".$row['CoursesEnrolled']."</td>
						<td>".$row['InsuranceTerm']."</td>
						<td>".$row['InsuranceStartDate']."</td>
						<td>".$row['InsuranceEndDate']."</td>
						</div>
						</tr>";
	}
				   }
		
	?>
    </tbody>     
</table>
      </div>
	  <script>
	     function checking(temp)
            {

                if(temp == true){
                    alert("Claims are Approved");
                }
                else
                {
                    alert("Claims not approved");
                }
            }
	  $('#tbl').find('input:checkbox[id$="chkDelete"]').click(function() {
    var isChecked = $(this).prop("checked");
    var $selectedRow = $(this).parent("td").parent("tr");

    if (isChecked) $selectedRow.css({
        "background-color": "#D4FFAA",
        "color": "GhostWhite"
    });
    else $selectedRow.css({
        "background-color": '',
        "color": "black"
    });
});
	  </script>
	  
	</body>
	</html>