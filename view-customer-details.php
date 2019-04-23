<?php include('header.php'); 
include('./database/config.php');
if(isset($_GET['cust_id'])){
$cust_id=$_GET['cust_id'];
$cust =mysqli_query($conn,"SELECT * FROM `customer_tbl` WHERE `cust_id`='$cust_id'");
while($res=mysqli_fetch_array($cust))
{
   $cust_id= $res['cust_id'];
    $customer_name=$res['customer_name'];
    $mobile_no=$res['mobile_no'];
    $al_mobile=$res['al_mobile'];
    $email=$res['email'];
   $city= $res['city'];
    $village=$res['village'];
    $pincode=$res['pincode'];
    $state=$res['state'];
    $address=$res['address'];
    $pending_payment =$res['pending_payment'];
   }
?>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Customer Profile</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Sejal Aqua</a></li>
            <li class="breadcrumb-item active" aria-current="page">Customer Profile</li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       <div class="btn-group float-sm-right">
        <button class="btn btn-outline-primary waves-effect waves-light" onclick="javascript:window.history.back(1);"><i class="fa fa-reply-all"></i> Go Back</button>
      </div>
     </div>
     </div>
     
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-2">
           
        </div>
        <div class="col-lg-8">
           <div class="card">
            <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active"><i class="icon-user"></i> <span class="hidden-xs">Customer Details</span></a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#order" data-toggle="pill" class="nav-link"><i class="icon-envelope-open"></i> <span class="hidden-xs">Orders</span></a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#transaction" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Payment Transaction</span></a>
                </li>
            </ul>
            <div class="tab-content p-3">
                <div class="tab-pane active" id="profile">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Cutomer Details</h6>
                            <p>Customer Id : <?php echo $cust_id; ?></p>
                            <p>Name : <?php echo $customer_name; ?></p>
                            <p>Mobile No : <?php echo $mobile_no.",".$al_mobile; ?></p>
                            <p>Email id : <?php echo $email; ?></p>
                            <h6>Address Details</h6>
                            <p>Address : <?php echo $address; ?></p>
                            <p>Town/Location : <?php echo $village; ?> </p>
                            <p>City : <?php echo $city; ?></p>
                            <p><?php echo $state."(".$pincode.")"; ?></p>

                          </div>
                        <div class="col-md-6">
                        
                             <h6>Pending Payment</h6>
                            <span class="badge badge-danger">Remaining ₹<?php echo $pending_payment; ?></span>
                            <hr>
                            <h6>Update Customer</h6>
            <a href="javascript:void();" data-toggle="modal" data-target="#" class="badge badge-success badge-pill" style="padding: 0.8em 0.5em;font-size: 12px;">Update Record</a>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <div class="tab-pane" id="order">
                    <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order Date</th>
                        <th>Order Id</th>
                        <th>No. Boxes</th>
                        <th>Box Rate</th>
						<th>Total Amount</th>
                        <th>Paid</th>
						<th>Remaining</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
                   $query="SELECT * FROM `order_tbl` WHERE `cust_id`='$cust_id'";
                   $result=mysqli_query($conn,$query);
                   while($row=mysqli_fetch_array($result)){?>
        			<tr>
                			<td><?php echo $row['order_date']; ?></td>
                			<td><?php echo $row['order_id']; ?></td>
							<td><?php echo $row['no_box']; ?></td>
                			<td><?php echo $row['box_rate']; ?></td>
							<td>₹ <?php echo $row['total_amt']; ?></td>
							<td>₹ <?php echo $row['paid_amt']; ?></td>
							<td><?php echo $row['unpaid_amt']; ?></td>
                		</tr>
				<?php } ?>   
                </tbody>
            </table>
                </div>
            </div>
          
                </div>
                <div class="tab-pane" id="transaction">
                    <div class="card-body">
                <h6 class="form-header text-uppercase">
                  <i class="fa fa-inr"></i>
               Payment Details
                </h6>
                <hr>
                <div class="table-responsive">
                 <table class="table table-bordered" id="example2">
                   <?php
$query =mysqli_query($conn,"SELECT * FROM `payment_tbl` WHERE `cust_id`='$cust_id'");
$rowcount=mysqli_num_rows($query);
		if($rowcount>0){?>
   <thead>
                    <tr>
                        <th>TXN Date</th>
                        <th>Paid Amount</th>
                        <th>Due Amount</th>
                        <th>Note</th>
                    </tr>
                   
                </thead>
               <tbody>
<?php while($row=mysqli_fetch_array($query)){
if($row['`order_id`']=='Paid'){
    $note="Balance Paid";
}
else{
        $note="New Order";
}
?>
        <tr>
			<td><?php echo $row['txn_date']; ?></td>
			<td><?php echo $row['paid_now']; ?></td>
			<td><?php echo $row['remaining']; ?></td>
			<td><?php echo $note; ?></td>

		</tr>
	<?php }?>
</tbody>
<?php }
else{
    echo "<h4>Transaction Record Not Available</h4>";
}
?>
</table>
</div>
                </div>
                </div>
                </div>
            </div>
        </div>
      </div>
      </div>
        
    </div>
    <div class="col-lg-2">
           
        </div>

    </div>
    <!-- End container-fluid-->
   </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
   
  </div><!--End wrapper-->
<!----Record Update Form---->
<div class="modal fade" id="updatemobile">
                  <div class="modal-dialog">
                    <div class="modal-content animated flipInX">
                      <div class="modal-header">
                        <h5 class="modal-title"><i class="fa fa-edit"></i>Update Record</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
					  <form id="umobile" method="post">
                            <div class="form-group">
                            <label for="input-2">Student Name</label>
                            <input type="text" class="form-control" id="studentName" name="studentName" value="<?php echo $student_name; ?>">
                            <input type="hidden" class="form-control" id="studentid" name="studentid" value="<?php echo $student_id; ?>">
                            </div>
                            <div class="form-group">
                            <label for="input-2">Parent Name</label>
                            <input type="text" class="form-control" id="parentname" name="parentname" value="<?php echo $parent_name; ?>">
                            </div>
                            <div class="form-group">
                            <label for="input-2">New Mobile</label>
                            <input type="text" class="form-control" id="newmob" name="newmob" value="<?php echo $mobile; ?>">
                            </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary shadow-primary px-5" id="newmob" ><i class="icon-lock"></i>Update</button>
                            </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"  data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                      </div>
                    </div>
                  </div>
    </div>
    <!----Update Alert----->
                <div class="modal fade" id="mobupdatealert">
                  <div class="modal-dialog">
                    <div class="modal-content animated flipInX">
                      <div class="modal-header">
                        <h5 class="modal-title"><i class="fa fa-paper-plane"></i>Record Update Alert</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <p>Student Record Updated Successfully !!!</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="javascript:window.history.back();" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                
         
  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
      <script>
      // Update Records
      $(document).ready(function(){

        $('#umobile').on('submit', function (e) {
		
			var newmob     	 = $('#newmob').val();
			
          e.preventDefault();
		if(newmob){
          $.ajax({
            type: 'post',
            url: './database/update-mobile.php',
            data: $('#umobile').serialize(),
            success: function (data) {
			  if(data==1){
			       $("#updatemobile").modal('hide');
				   $("#mobupdatealert").modal('show');
			  }
			   else{
				  alert("Something Is Went Wrong");
				}
            }
          });
		}else{
			alert("Please Check All Details... There is Something Missing !!!");
		}
		return false;
        });

      });

</script>	
  <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- waves effect js -->
  <script src="assets/js/waves.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
	<!--Data Tables js-->
  <script src="assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/jszip.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/pdfmake.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/vfs_fonts.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/buttons.html5.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/buttons.print.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js"></script>

    <script>
     $(document).ready(function() {
      //Default data table
       $('#default-datatable').DataTable();


       var table = $('#example').DataTable( {
        lengthChange: true,
        buttons: [ 'pdf', 'print']
      } );
 
     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      
      } );
  
</script>
<script>
     $(document).ready(function() {
      //Default data table
       $('#default-datatable').DataTable();


       var table = $('#example2').DataTable( {
        lengthChange: true,
        buttons: [ 'pdf', 'print']
      } );
 
     table.buttons().container()
        .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
      
      } );
  
</script>
</body>
</html>
<?php }
?>