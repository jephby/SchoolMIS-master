<?php
	session_start();
	include_once('../../includes/connection.php');
	include_once('../../includes/IncomeExpense.php');
	
	$transaction = new Transaction;
	$transactions = $transaction->fetch_all();
	//start session
	if(isset($_SESSION["Roles_idRoles"]) && $_SESSION["Roles_idRoles"] == 1)
  {
  //print_r($_POST) ;
  //die();
		//display index
		
		if(isset($_POST['Person_That_logged'], $_POST['Amount'], $_POST['Description'])){
			$Person_That_logged = $_POST['Person_That_logged'];
			$Amount = $_POST['Amount'];
			$Description = $_POST['Description'];

      //
      if(isset($_POST['is_expense'])){
        $Amount = 0 - $_POST['Amount'];
      }

			if(empty($Person_That_logged) or empty($Amount) or empty($Description) ){
				$error = 'All fields are required!';


			} else{
      //die("asdfghjk");

				$query = $pdo->prepare('INSERT INTO transaction (DateTime, Person_That_logged, Amount, Description) VALUES
				(?, ?, ?, ?) ');
				$query->bindValue(1, time());
				$query->bindValue(2, $Person_That_logged);
				$query->bindValue(3, $Amount);
        $query->bindValue(4, $Description);

				$query->execute();

				header('Location: IEmanager.php');


			}
		}
		?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/style.css"/>  
    <link rel="stylesheet" type="text/css" href="../../fonts/">


    <!-- Custom styles for this template -->
    <link href="../../assets/css/dashboard.css" rel="stylesheet">

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
          <a class="navbar-brand" href="#">HCAM ADMIN</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li class="active"><a href="../logout.php">
            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
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
                  <li><a href="../News/edit.php">Add Article</a></li>
                  <li><a href="../News/article.php">priview Articles</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                  <li class="active"><a href="">Income/Expense Manager <span class="sr-only">(current)</span></a></li>
                  <li><a href="../income-expense/IEmanager.php">Update Record</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                  <li class="active"><a href="">Students <span class="sr-only">(current)</span></a></li>
                  <li><a href="../student/newuser.php">View all Students</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                  <li class="active"><a href="">Staff <span class="sr-only">(current)</span></a></li>
                  <li><a href="../staff/newuser.php">View all staff</a></li>
                </ul>

                
            <!-- Site footer -->
          <footer class="footer">
                <p>&copy; 2015 Company, Inc.</p>
              </footer><!-- /container -->
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>
          <div class="container-fluid">
            <div class="col-md-5">
              <form class="form-horizontal" action="IEmanager.php" method="Post" autocomplete="off">
                <div class="form-group" >
                  
                  <div class="input-group">
                    <div class="input-group-addon">#</div>
                    <input type="text" class="form-control" name="Amount" placeholder="Amount">
                    <div class="input-group-addon">.00</div>
                  </div>
                </div><br/>
                <div class="form-group">
                  <input type="integer" name="Person_That_logged" class="form-control" placeholder="Logged By">
                </div><br/>
                <div class="form-group">
                  <input type="text" name="Description" class="form-control" placeholder="Income Discription">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form><br/>
              </div>

              <div class="col-md-5 col-md-offset-1">
              <form class="form-horizontal" action="IEmanager.php" method="Post" autocomplete="off">
                <div class="form-group" >
                  
                  <div class="input-group">
                    <div class="input-group-addon">#</div>
                    <input type="text" class="form-control" name="Amount" placeholder="Amount">
                    <div class="input-group-addon">.00</div>
                  </div>
                </div><br/>
                <div class="form-group">
                  <input type="integer" name="Person_That_logged" class="form-control" placeholder="Logged By">
                </div><br/>
                <div class="form-group">
                  <input type="text" name="Description" class="form-control" placeholder="Expense Discription">
                  <input type="hidden" name="is_expense" value="1">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form><br/>
              </div>

            
            </div>    

            

          <table class="table">
                  <caption>list of students</caption>
                  <thead>
              <tr>
                    <th>#</th>
                    <th>DateTime</th>
                    <th>Logged By</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Amount</th>

                  </tr>
                  </thead>
                  <tbody>

                  <?php foreach ($transactions as $transaction) { ?>
                  
                  <tr>
                    <th scope="row"><?php echo $transaction['idTransaction'];?></th>
                    <td><?php echo date('l jS F Y', $transaction['DateTime']); ?></td>
                    <td><?php echo $transaction['Person_That_logged']; ?></td>
                    <td><?php if ($transaction['Amount'] < 0 ) {
                      echo "Expenditure";
                    } else{
                      echo "Income";
                      } ?></td>
                    <td><?php echo $transaction['Description']; ?></td>
                    <td><?php echo $transaction['Amount']; ?></td>
                  </tr>
                  
                  <?php } ?>
              </tbody>
             </table>

             <?php 
                $sum = "SELECT DateTime as Month, SUM(Amount) AS Amount FROM transaction GROUP BY MONTH(DateTime)"; 
                $total= $pdo->prepare($sum);
                $total->execute();
                while($group = $total->fetch()){
                  $month = date("F Y", $group['Month']);
                  $Amount = $group['Amount'];
  

              
                }
                ?>

             <table class="table">
               <tread> 
                  <tr> 
                  <th>month</th>
                  <th>Total income</th>
                  </tr>
               </tread>
               <tbody>
                 <td><?php echo $month.' to date';?></td>
                 <td><?php echo '#'.$Amount;?></td>
               </tbody>
             </table>

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    
  </body>
</html>
<?php 
	}
    else{
  header('location: ../login.php');
    }
?>