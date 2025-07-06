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
			<h1  style="font-size: 20px; color: red;font-weight: bold;">Panel : <span  style="color: #216b77;">Admin</span></h1>
			    <hr>
				
				
				
			<a href="dashboard.php"><button class="btn btn-primary">Dashboard</button> </a> 
		
  
			
				
			<!--<a href="reg.php"><button class="btn btn-primary">Registration</button> </a> -->
		
			
			<a href="records.php"><button class="btn btn-primary">Records</button> </a>
			
			
			
			
			
  
			
				
				<div class="dropdown" style="display: inline-block;">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Requests
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
	 <li class="libtn"><a href="slip.php">Pay Request</a></li>
 
      <li class="libtn"><a href="pending.php">Pending Pay Request</a></li>
      <li class="libtn"><a href="concessionreq.php">Concession Request</a></li>
      <li class="libtn"><a href="refundreq.php">Refund Request</a></li>
	 <li class="libtn"><a href="leavereq.php">Holiday Request</a></li>
	 <li class="libtn"><a href="batchreq.php">Batch Request</a></li>

    </ul>
  </div>


			<a href="users.php"><button class="btn btn-primary">Users</button> </a>
			
			
	
				
				<div class="dropdown" style="display: inline-block;">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Manage
    <span class="caret"></span></button>
    <ul class="dropdown-menu">

      <li class="libtn"><a href="Batch.php"> Create Batch</a></li>
	      <li class="libtn"><a href="feepack.php">Fee Pack</a></li>

      <li class="libtn"><a href="mngpassord.php">Manage Password</a></li>
      <li class="libtn"><a href="filterreport.php">User Filter Report</a></li>
      <li class="libtn"><a href="allfilterreport.php">All Filter Report</a></li>
      <li class="libtn"><a href="disbalestu.php">Disable Student</a></li>

    </ul>
  </div>

		
		 
			<div class="dropdown"  style="display: inline-block;">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Reports
    <span class="caret"></span></button>
    <ul class="dropdown-menu">

      <!--<li class="libtn"><a href="regreport.php">Reg.Student</a></li>-->
      <li class="libtn"><a href="regreport.php">Reg.Students</a></li>
      <!--<li class="libtn"><a href="userreport.php">User Report</a></li>-->
      <li class="libtn"><a href="batchwiserep.php">Batch Wise Report</a></li>
      <li class="libtn"><a href="feerecreport.php">Full Received Report </a></li>
     <!-- <li class="libtn"><a href="exportrecreg.php">Full Received Report </a></li>-->
      <li class="libtn"><a href="pendingreport.php">Pending Report</a></li>
      <!--<li class="libtn"><a href="exportpenreg.php">Pending Report</a></li>-->
      <li class="libtn"><a href="refundrep.php">Refund Report</a></li>
     <!-- <li class="libtn"><a href="exportrefund.php">Refund Report</a></li>-->
      <!--<li class="libtn"><a href="exportconsesion.php">Concession Report</a></li>-->
      <li class="libtn"><a href="concessionrep.php">Concession Report</a></li>
	  <li class="libtn"><a href="disablereport.php">Disable Students</a></li>
     
  
  
    </ul>

		</div>

			<a href="" data-toggle="modal" data-target="#logoutModal">
                  
                  <button class="btn btn-primary">Log out</button>
                </a>
				
         
          
		  </div>
				</div>
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
  
 
