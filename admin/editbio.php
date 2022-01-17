<?php
  session_start();
  if(isset($_SESSION["Roles_idRoles"]) && $_SESSION["Roles_idRoles"] == 1)
  {
    
  
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/style.css"/>  
    <link rel="stylesheet" type="text" href="../fonts/"></link>


    <!-- Custom styles for this template -->
    <link href="../assets/css/dashboard.css" rel="stylesheet">

  </head>

  <body>

			    <nav class="navbar navbar-inverse navbar-fixed-top">
			      <div class="container-fluid">
			        <div class="navbar-header">
			          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			          </button>
			          <a class="navbar-brand" href="#">Student </a>
			        </div>
			        <div id="navbar" class="navbar-collapse collapse">
			          <ul class="nav navbar-nav navbar-right">
			            <li><a href="#">Dashboard</a></li>
			            <li><a href="#">Settings</a></li>
			            <li><a href="#">Profile</a></li>
			            <li class="active"><a href="logout.php">
			            <span class="glyphicon glyphicon-logout" aria-hidden="true"></span>logout</a></li>
			          </ul>
			          <form class="navbar-form navbar-right">
			            <input type="text" class="form-control" placeholder="Search...">
			          </form>
			        </div>
			      </div>
			    </nav>

			    <div class="container-fluid">
			      <div class="row">
			        <div class="col-sm-3 col-md-2 sidebar">
			          <ul class="nav nav-sidebar">
			            <li class="active"><a href="#">Content Manager <span class="sr-only">(current)</span></a></li>
			            <li><a href="#">Add Article</a></li>
			            <li><a href="#">priview Articles</a></li>
			          </ul>
			          <ul class="nav nav-sidebar">
			            <li class="active"><a href="">Income/Expense Manager <span class="sr-only">(current)</span></a></li>
			            <li><a href="../income-expense/IEmanager.php">Update Record</a></li>
			            <li><a href="">Preview Record</a></li>
			          </ul>
			          <ul class="nav nav-sidebar">
			            <li class="active"><a href="">Students <span class="sr-only">(current)</span></a></li>
			            <li><a href="">View all Students</a></li>
			          </ul>
			          <ul class="nav nav-sidebar">
			            <li class="active"><a href="">Staff <span class="sr-only">(current)</span></a></li>
			            <li><a href="">View all staff</a></li>
			          </ul>

			          <div>
						<!-- Site footer -->
					<footer class="footer">
				        <p>&copy; 2015 Company, Inc.</p>
				      </footer><!-- /container -->
					</div>
			        </div>
			        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			          <h1 class="page-header">Dashboard</h1>

			          <div class="container">
					

					<form class="col-md-10" role="form" action="#" method="Post" autocomplete="off">
						<fieldset>			        		
						    <legend><h2 class="form-heading"> Fill the Admision form below</h2></legend>

						    <div>
						    
						    <div class="col-md-4">
				        		<label> first name</label>
				        		<input type="text"  class="form-control" name="username" Placeholder="first name ">
				        	</div>
						    <div class="col-md-4">
				        		<label> last name</label>
				        		<input type="text"  class="form-control" name="username" Placeholder="last name">
				        	</div>

				        	<div class="col-md-3">
						    	<label class="radio-inline">
								  	<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="male"> Male
								</label>
								<label class="radio-inline">
								  	<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="female"> Female
								</label>
						    </div><br/>

			        		<div class="col-md-5">
			        			<label>Date of birth</label>
			        			<input type="Date" class="form-control" name="date of birth" Placeholder="Date of birth">
			        		</div><br/>

			        		<div class="col-md-5">
			        			<label >Phone Number</label>
			        			<input type="text" class="form-control" name="Phone number" Placeholder="phone number"><br/>
			        		</div><br/>

			        		</div class="form-group"><br/>


						    <div class="col-md-10">
				        		<label>Address</label>
				        		<textarea class="form-control" rows="5" placeholder="Address Here!" name="Address"></textarea><br/>
			        		</div class="form-group"><br/>

			        		<div class="col-md-10">
			        			<label>Email</label>
			        			<input type="email" class="form-control" name="email" Placeholder="email">
			        		</div class="form-group"><br/><br/>
			        		
			        		
			        		<div class="col-md-5" >
			        			<label>Fathers Name</label>
			        			<input type="text" class="form-control" name="father name " Placeholder="fathers name">
			        		</div class="form-group"><br/>

			        		<div class="col-md-5">
			        			<label>Mothers Name</label>
			        			<input type="text" class="form-control" name="Mothers name " Placeholder="Mothers name">
			        		</div class="form-group"><br/>

			        		<div class="col-md-5" >
			        			<label>State of Origin</label>
			        			<input type="text" class="form-control" name="SO_Origin " Placeholder="State of Origin">
			        		</div class="form-group"><br/>

			        		<div class="col-md-5" >
			        			<label>Local Gov.</label>
			        			<input type="text" class="form-control" name="LGA " Placeholder="Local Gov.">
			        		</div class="form-group"><br/>

				        		<div class="form-group">
				        			<div class="col-md-4">
				       					<label for="exampleInputFile">Upload Image here!!</label>
								    	<input type="file" id="image">
								    	<p class="help-block">image should be atlest 2kb.</p>
				        			</div>

								 </div>

						    <div class="col-md-10"><button type="submit" class="btn">Submit</button> </div>

						  </fieldset>
						
					</form>	

					

					</div>

			        </div>
			      </div>
				      
				    </div> 				  


				    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
				    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
		</body>
		</html>
		<?php
  }
    else{
  header('location: ../login.php');
    }
?>