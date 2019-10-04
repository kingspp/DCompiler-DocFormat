<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>DocuMat</title>   
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
                <a class="navbar-brand page-scroll" href="/">
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
			<h4 style="padding-top:35px;">Step 1 : Arrange</h4>
				<div class="column" id="insert"></div> 
			</div>
			
			<div class= "col-md-4">
				<div class="row">		
					<h4 style="padding-top:35px;">Step 2 : Select</h4>
					<div>
					<div class="col-md-3">
						<button type="button" id="ieeeF" class="btn btn-default btn-sg" onclick="" style="padding:20px;"> &nbsp IEEE &nbsp</button>	
					</div>
					<div class="col-md-3">
						<button type="button" id="customF" class="btn btn-default btn-sg" onclick="" style="padding:20px;">Custom</button>	
					</div>
					</div>
				</div>
				<div id="customForm"  style="padding-top:25px">
					<form id="form-content" action="php/db/insert.php" method="POST" accept-charset="UTF-8"
						enctype="application/x-www-form-urlencoded"  validate>
							<p id="fStyle" style="padding-top:10px; color:#42dca3;">Font Style <i id="icn_plusFont" class="fa fa-plus-circle" style="font-size:25px; padding-left:20px;"></i></p>
							<div class="form-group" id="fontStyle" style="display:none;">
								<div id="title" style="color:#42dca3;">
									<a><b>Title:</b></a>
									<input type="text" class="form-control" id="fontName" name="fontName" placeholder="Font Name, Font Size" required>
									<input type="checkbox" name="Bold" value="True">Bold
									<input type="checkbox" name="Italic" value="True">Italic
									<input type="checkbox" name="Caps" value="True">All Caps
								</div>
								<div id="abstract" style="padding-top:10px; color:#42dca3;">
									<a><b>Abstract:</b></a>
									<input type="text" class="form-control" id="fontName" name="fontName" placeholder="Font Name, Font Size" required>
									<input type="checkbox" name="Bold" value="True">Bold
									<input type="checkbox" name="Italic" value="True">Italic
									<input type="checkbox" name="Caps" value="True">All Caps
								</div>
								<div id="normal" style="padding-top:10px; color:#42dca3;">
									<a><b>Normal:</b></a>
									<input type="text" class="form-control" id="fontName" name="fontName" placeholder="Font Name, Font Size" required>
									<input type="checkbox" name="Bold" value="True">Bold
									<input type="checkbox" name="Italic" value="True">Italic
									<input type="checkbox" name="Caps" value="True">All Caps
								</div>
							</div>						
							
							<p id="tStyle" style="color:#42dca3;">Table Style <i id="icn_plusTable" class="fa fa-plus-circle" style="font-size:25px; padding-left:20px;"></i></p>
							<div class="form-group" id="tableStyle" style="display:none;">
								<div id="title" style="color:#42dca3;">
									<a><b>Title:</b></a>
									<input type="text" class="form-control" id="fontName" name="fontName" placeholder="Font Name, Font Size" required>
									<input type="checkbox" name="Bold" value="True">Bold
									<input type="checkbox" name="Italic" value="True">Italic
									<input type="checkbox" name="Caps" value="True">All Caps
								</div>
								<div id="abstract" style="padding-top:10px; color:#42dca3;">
									<a><b>Abstract:</b></a>
									<input type="text" class="form-control" id="fontName" name="fontName" placeholder="Font Name, Font Size" required>
									<input type="checkbox" name="Bold" value="True">Bold
									<input type="checkbox" name="Italic" value="True">Italic
									<input type="checkbox" name="Caps" value="True">All Caps
								</div>
								<div id="normal" style="padding-top:10px; color:#42dca3;">
									<a><b>Normal:</b></a>
									<input type="text" class="form-control" id="fontName" name="fontName" placeholder="Font Name, Font Size" required>
									<input type="checkbox" name="Bold" value="True">Bold
									<input type="checkbox" name="Italic" value="True">Italic
									<input type="checkbox" name="Caps" value="True">All Caps
								</div>
							</div>						
							
							
							<p id="pStyle" style="color:#42dca3;">Paragraph Style <i id="icn_plusPara" class="fa fa-plus-circle" style="font-size:25px; padding-left:20px;"></i></p>
							<div class="form-group" id="paraStyle" style="display:none;">
								<div id="title" style="color:#42dca3;">
									<a><b>Title:</b></a>
									<input type="text" class="form-control" id="fontName" name="fontName" placeholder="Font Name, Font Size" required>
									<input type="checkbox" name="Bold" value="True">Bold
									<input type="checkbox" name="Italic" value="True">Italic
									<input type="checkbox" name="Caps" value="True">All Caps
								</div>
								<div id="abstract" style="padding-top:10px; color:#42dca3;">
									<a><b>Abstract:</b></a>
									<input type="text" class="form-control" id="fontName" name="fontName" placeholder="Font Name, Font Size" required>
									<input type="checkbox" name="Bold" value="True">Bold
									<input type="checkbox" name="Italic" value="True">Italic
									<input type="checkbox" name="Caps" value="True">All Caps
								</div>
								<div id="normal" style="padding-top:10px; color:#42dca3;">
									<a><b>Normal:</b></a>
									<input type="text" class="form-control" id="fontName" name="fontName" placeholder="Font Name, Font Size" required>
									<input type="checkbox" name="Bold" value="True">Bold
									<input type="checkbox" name="Italic" value="True">Italic
									<input type="checkbox" name="Caps" value="True">All Caps
								</div>
							</div>						
							
							
							
							
							<input type="submit" class="btn btn-default btn-lg pull-right" value="Save">
							<!--<button id="save" onclick="save();return false;" class="btn btn-default btn-lg pull-right">Save</button>-->
						</form>
				</div>
			</div>
			
			<div class="col-md-2">
				<h4 style="padding-top:35px;">Step 3 : Finish</h4>
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