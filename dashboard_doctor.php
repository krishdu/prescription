<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; ?>
<link rel="stylesheet" type="text/css" href="./media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="./media/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="./media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="./media/css/buttons.dataTables.min.css">
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
          <a class="navbar-brand" href="#">Prescription</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="visit_list.php">Visit List</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="logout.php">Logout</a></li>
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
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="reports.php">Reports</a></li>
            <li><a href="master.php">Master data</a></li>
            <li><a href="visit_list.php">Visit List</a></li>
          </ul>
         
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
          </div>

          
          <div class="row">
        		<div class="col-md-6">
        		<h2 class="sub-header">Day Wise Visit report</h2>
        		<table id="visit_list_table" class="table table-bordered">
		              <thead>
							<tr>
								<th>Total Visit</th>
								
								<th>Day</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Total Visit</th>
								
								<th>Day</th>
							</tr>
						</tfoot>
		              </tbody>
            	</table>
        		</div>
        		<div class="col-md-6">
        		<h2 class="sub-header">Month Wise Visit report</h2>
        		<table id="visit_list_table_monthly" class="table table-bordered">
		              <thead>
							<tr>
								<th>Total Visit</th>
								
								<th>Month</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Total Visit</th>
								
								<th>Month</th>
							</tr>
						</tfoot>
		              </tbody>
            	</table>
        		</div>
          </div>
          <div class="row">
          <div class="col-md-12">
        		<h2 class="sub-header">Comprehensive Visit report</h2>
        		
        		<table id="visit_list_all" class="table table-striped">
		              <thead>
							<tr>
								<th>Visit ID</th>
								
								<th>Patient ID</th>
								<th>Visited</th>
								<th>First Name</th>
								
								<th>Last Name</th>
								<th>Mobile</th>
								
								<th>Visit date</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Visit ID</th>
								
								<th>Patient ID</th>
								<th>Visited</th>
								<th>First Name</th>
								
								<th>Last Name</th>
								<th>Mobile</th>
								
								<th>Visit date</th>
							</tr>
						</tfoot>
		              </tbody>
            	</table>
        		</div>
          </div>
          
            
          
        </div>
      </div>
    </div>

   <?php include_once './inc/footer.php';?>
  </body>
</html>
