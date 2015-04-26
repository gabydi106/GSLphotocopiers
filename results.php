
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GSL - Home</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/shop-homepage.css" rel="stylesheet">
	
	<link href="css/jquery.dataTables.css" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><span class="glyphicon glyphicon-home"></span></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="about.html">About</a>
                    </li>
                    <li><a href="services.html">Services</a>
                    </li>
                    <li><a href="contact.html">Contact</a>
                    </li>
                </ul>
            <form class="navbar-form navbar-right" role="search" method="post" action="results.php">
                <div class="form-group">
                    <input type="text" name="query" class="form-control" placeholder="Search products...">
                </div>
                <button id="submitSearch" type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>
                </button>
            </form>
            </div>
            <!-- /.navbar-collapse -->
         

        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <img src="logo.jpg">
                 <center><h5>Serving Your Document Needs</h5></center>
                 <br><br><br><br><br><br><br><br>
                <div class="list-group">
                    <span class="glyphicon glyphicon-phone-alt"></span>  &nbsp;+44 020 3174 8056 <br> <br>
                    <span class="glyphicon glyphicon-print"></span>  &nbsp;+44 020 3174 8057 <br> <br>
                    <span class="glyphicon glyphicon-envelope"></span>  &nbsp;info@gslphotocopiers.org.uk <br> <br>
                    <span class="glyphicon glyphicon-lock"></span>
                   &nbsp;Golden Crescent Industrial Estate, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Golden Crescent, Hayes
                    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Middlesex, UB3 1AQ
            </div>
               
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

        

                </div>

                <div class="row">
	                Viewing results for: <b>  <?php  if (isset($_POST)) { echo $_POST['query']; } ?> </b>	<br> 

	                <?php

	                	if (isset($_POST)) {
							$q = $_POST['query'];

							$con = mysqli_connect('localhost','root','password','gsl');
							if (!$con) {
							  die('Could not connect: ' . mysqli_error($con));
							}

							mysqli_select_db($con,"gsl");
							$sql="SELECT * FROM products WHERE ProductName LIKE '%$q' or ProductName LIKE '$q%' or ProductName LIKE '% $q %'";
							$result = mysqli_query($con,$sql);

							if (!$result) {
							    printf("Error: %s\n", mysqli_error($con));
							    exit();
							}
							echo "<div class='table-responsive'>";
							echo "<table class='table' id='example'>
							<thead>
							<tr>
							<th>Product Name</th>
							<th>Features</th>
							<th>Picture</th>
							</thead>
							</tr>";
							echo "<tbody>";
							while($row = mysqli_fetch_array($result)) {
							  echo "<tr>";
							  echo "<td>" . $row['ProductName'] . "</td>";
							  echo "<td>" . $row['ProductDesc'] . "</td>";
							  echo "<td>" . $row['ProductImgPath'] . "</td>";
							  echo "</tr>";
							}
							echo "</tbody>";
							echo "</table>";
							echo "</div>";		
							mysqli_close($con);
						}
					?>

           		</div>


            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Glebe Services Ltd. 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- JavaScript -->
   
	<script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.js"></script>
	<script>
		$(document).ready(function() {
		$('#example').dataTable();
		} );
	</script>
</body>

</html>
