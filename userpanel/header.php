


<style>

.btn-primary:hover {

    background-color: #048d34!important;
    border-color: #048d34!important;
}
	  .page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: black;
    border-color: white;
}
.col-md-2 {
    
    max-width: 11.66667%;
}
   #mainlink{
	   color:white;
	   font-size:20px;	   
   }
    #mainlink:hover{
	   color:white;
	   text-decoration:none;
	   color:blue;   
   }
   .bg-primary{
	      background-color:#2d7752!important;
	   
   }
   .btn-primary {
    color: #fff;
 background-color:black!important;
	    margin: 5px;
      width: 130px;

}
   .btn-success:hover {
    color: #fff;
    background-color:black;
    border-color: black;
}
.border-left-primary {
    border-left: .25rem solid #2d7752!important;
}
.border-left-success {
    border-left: .25rem solid #2d7752!important;
}
.text-success {
    color: black!important;
}
.p-5 {
    padding: 26px!important;
    background: white;
    margin-top: 20px;
    margin-bottom: 20px;
    border-radius: 20px;
}
label{
     font-weight:bold;
	 color:black;
}
.form-control{
border:solid 1px black;
}

.hidden {
            display: none;
        }
		.libtn{
			text-align: center;
			    height: 30px;
    line-height: 30px;
    border: solid 1px black;
			
		}
		.libtn > a{
			
			    font-size: 15px;
    display: block;
    text-decoration: none;
    font-weight: bold;
			
		}
		.libtn > a:hover{
			background-color:#216b77;
			    color: white;
				
			
		}
		.card-header {
        padding: 4px !important;
    margin-bottom: 26px !important;
	    margin-top: 10px;
 
}
   </style>
 

<div class="container-fluid  bggg" style="border-bottom: solid 2px #216b77;padding-bottom: 20px;">
        <div class="row">
       
	   
          <div class="col-xl-12 col-md-6 mb-12 centerr" style="text-align: center;">
            <img style="width: 80%;margin: auto;display: inherit;" src ="images/header.png">
			 <hr>
			<h1  style="font-size: 20px; color: red;font-weight: bold;">User : <span  style="color: #216b77;"><?php echo $_SESSION['user']?></span></h1>
			    <hr>
				
				
			<a href="dashboard.php"><button class="btn btn-primary">Dashboard</button> </a>

				
			<a href="index.php"><button class="btn btn-primary">Registration</button> </a>



			
			<div class="dropdown" style="display: inline-block;">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> Records
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
	
 
      <li class="libtn"><a href="records.php">Student Record</a></li>

      <li class="libtn"><a href="batchchng.php">Change Batch</a></li>
    </ul>
  </div>
			 
			<div class="dropdown"  style="display: inline-block;">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Pay Fee
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
	 <li class="libtn"><a href="slip.php">Pay / Print Slip</a></li>
 
      <li class="libtn"><a href="pending.php">Pending Pay</a></li>
      <li class="libtn"><a href="refund.php">Refund Fee</a></li>
    <li class="libtn"><a href="concession.php">Concession Fee</a></li>

    </ul>
  </div>
  
   <?php //if($_SESSION['rol']=="Gurkull Incharge"){?>
   
   
			<div class="dropdown" style="display: inline-block;">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> Leave
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
	 <li class="libtn"><a href="leave.php">Apply Leave</a></li>
 
      <li class="libtn"><a href="onleave.php">On Leave</a></li>
      

    </ul>
  </div>

   
   
   <?php// } ?>
   
    
  <a href="" data-toggle="modal" data-target="#logoutModal">
                  
                  <button class="btn btn-primary">Log out</button>
                </a>
          
          </div>
          
		  
        </div>
   

		
		
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-info" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div> 
  
  <div class="modal fade" id="slip" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Enter Master Password</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
		<form action="" method="post">
        <div class="modal-body">
        <label for="password">Enter Password:</label>
        <input type="password" id="password" class="form-control" name="password" required>
        
    </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
         <button type="submit" class="btn btn-success">Submit</button>
        </div>
		</form>
      </div>
    </div>
  </div> 
