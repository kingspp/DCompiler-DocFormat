<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Sortable - Portlets</title>   
  <link href="../css/sort.css" rel="stylesheet">
  <link href="../css/jq-ui.css" rel="stylesheet"> 
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/grayscale.css" rel="stylesheet">
  <link href="../css/main.css" rel="stylesheet">	
  <link href="../fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body> 
	
	<!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i>  <span class="light">Start</span> DocuMat
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	<div class="container" style="padding-top:50px;">
		<div class="row">
			<div class="col-md-4">
				<div class="column" id="insert"></div> 
			</div>
			
			<div class="col-md-2" style="padding-top:60px;">
				<button type="button" id="reload" class="btn btn-default btn-sg" onclick="window.location='/php/sort.php';">Reload</button>	
				<button type="button" id="finish" class="btn btn-default btn-sg pull-right">Finish</button>	
			</div>
		</div>
	</div>
	
	 <!-- Footer -->
   <footer class="footer"><div class="container" id="footer"></div></footer>
	
	<script src="../js/jquery.js"></script>  
	<script src="../js/jq-ui.js"></script> 
	<script src="../js/bootstrap.min.js"></script>	
	<script src="../js/sort.js"></script> 
 	<script src="../js/grayscale.js"></script>	
	<script src="../js/db.js"></script>
	<script src="../js/main.js"></script> 
</body>
</html>