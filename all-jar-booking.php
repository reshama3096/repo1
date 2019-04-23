<?php 
include("header.php");
include('./database/config.php');
?>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">All Water Jar Booking</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Sejal Aqua</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">All Bookings</a></li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       <div class="btn-group float-sm-right">
        <a href="water-jar-booking.php"><button class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-cart-plus"></i> New Booking</button></a>
      </div>
     </div>
     </div>
    <!-- End Breadcrumb-->
  <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i>All Booking</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Booking Id</th>
                        <th>Customer Name</th>
                        <th>Mobile No</th>
                        <th>City/Village</th>
                        <th>No. Jar</th>
						<th>Total Amount</th>
						<th>Delivery Date</th>
						<th>View</th>
						<th>Add</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
                   $query="SELECT jar_order.*,jar_booking.*, SUM(`no_jar`) as jar , SUM(`subtotal`) as total FROM `jar_order` INNER JOIN jar_booking on jar_order.booking_id=jar_booking.booking_id GROUP BY jar_order.`booking_id`";
                   $res=mysqli_query($conn,$query);
                   while($row=mysqli_fetch_array($res)){
					   $booking_id=$row['booking_id'];
					   ?>
        			<tr>
                			<td><?php echo $row['booking_id']; ?></td>
                			<td><?php echo $row['customer_name']; ?></td>
							<td><?php echo $row['mobile_no']; ?></td>
                			<td><?php echo $row['city']; ?></td>
							<td><?php echo $row['jar']; ?></td>
							<td>₹ <?php echo $row['total']; ?></td>
							<td><?php echo date("d/m/Y", strtotime($row['delivery_date'])); ?></td>
							<td><button type="button" value="<?php echo $row['booking_id']; ?>" onclick="viewOrder(this.value)"><i class="fa fa-eye"></i></button></td>
							<td><button type="button" value="<?php echo $row['booking_id']; ?>" onclick="addJar(this.value)"><i class="fa fa-plus"></i></button></td>
						</tr>
				<?php } ?>  
                </tbody>
            </table>
            </div>
            </div>
          </div>
        </div>
      </div><!-- End Row-->

    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
<?php include('footer.php'); ?>
	<!--End footer-->
   
  </div><!--End wrapper-->
  <!---View Orderdetails Alert--->
   <div class="modal fade" id="viewDetails">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
					  <div class="modal-body">
						<div class="card-body">
                  <!-- Main content -->
						<section class="invoice" id="orderDetails">
					    </section><!-- /.content -->
						</div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="button" class="btn btn-warning btn-secondary" id="bookingid" onclick="printBill(this.value)"><i class="fa fa-print"></i> Print Bill</button>

					  </div>
                    </div>
                  </div>
                </div>
				<!---Add New Extra Jar---->
				<!---Interest Letter---->
     <div class="modal fade" id="addjarform">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title"><i class="fa fa-hourglass-half"></i> Add New Jar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
					   <div class="card">
			     <div class="card-body">
				    <form id="newjar" method="POST">
				     <div class="form-group row">
					 <div class="col-sm-6">
					  <label for="input-2">Booking No</label>
					  <input type="text" class="form-control" id="bookingNo" name="bookingNo" readonly>
					 </div>
					 <div class="col-sm-6">
						   <label for="input-3">Delivery Date</label>
							<input type="date" class="form-control" id="delivery" name="delivery" >
					</div>
					 </div>
					 <div class="form-group row">
						  <div class="col-sm-4">
						   <label for="input-3">No Of Jar</label>
							<input type="number" min="0" class="form-control" id="nojar" name="nojar" >
						  </div>
						  <div class="col-sm-4">
						   <label for="input-3">Rate Per Jar</label>
							<input type="number" min="0" class="form-control" id="ratepjar" name="ratepjar" >
						  </div>
						   <div class="col-sm-4">
						   <label for="input-3">Total Amount</label>
							<input type="number" min="0" class="form-control" id="totamount" name="totamount" readonly>
						  </div>
					</div>
					<div class="form-group row">
						  <div class="col-sm-6">
						   <label for="input-3">Advance Payment</label>
							<input type="number" min="0" class="form-control" id="paid" name="paid" >
						  </div>
						  <div class="col-sm-6">
						   <label for="input-3">Remaining Payment</label>
							<input type="number" min="0" class="form-control" id="unpaid" name="unpaid" readonly>
						  </div>
						</div>
					 <div class="form-group">
					  <button type="submit" class="btn btn-primary pull-right shadow-primary px-5"><i class="icon-lock"></i> Save</button>
					</div>
					</form>
				 </div>
			   </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                      </div>
                    </div>
                  </div>
                </div>
			<!----Jar Alert--->
				<div class="modal fade" id="newjarAlert">
                  <div class="modal-dialog">
                    <div class="modal-content animated fadeInUp">
                      <div class="modal-header">
                        <h5 class="modal-title" style="color:#00c2ff;"><i class="fa fa-user"></i>Interest Alert</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                       <div class="modal-body">
					  
                       <p>Extra Jar Added Successfully Thank You !</p>
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="javaScript:location.reload();" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                      </div>
                    </div>
                  </div>
                </div>	
  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
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
        buttons: [ 'copy', 'excel', 'pdf', 'print']
      } );
 
     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      
      } );
  
</script>
<script>
// View Details
function viewOrder(val) {
$("#bookingid").val(val);
$.ajax({
type: "POST",
url: "./database/get_jar_order_details.php",
data:'booking_id='+val,
success: function(data){
 $("#orderDetails").html(data);
 $("#viewDetails").modal('show');
	}
});      
}
// Add New Jar
function addJar(val) {
        $('#bookingNo').val(val);
       $("#addjarform").modal('show');
}
// print Bill
function printBill(val) {
	//window.location.href = "jar-invoice.php?booking_id="+val;
   window.open('jar-invoice.php?booking_id='+val,'_blank');
}
</script>
<script>
$("#nojar,#ratepjar").keyup(function(){
	   var nojar = $("#nojar").val();
       var ratepjar = $("#ratepjar").val();
	   var totamount=parseInt(nojar)*parseInt(ratepjar);
	   $("#totamount").val(totamount);
	  
	   var paid = $("#paid").val();
	   var unpaid=parseInt(totamount)-parseInt(paid);
	   $("#unpaid").val(unpaid);
	  
});
$("#paid").keyup(function(){
	   var paid = $("#paid").val();
       var totamount = $("#totamount").val();
	   var unpaid=parseInt(totamount)-parseInt(paid);
	   $("#unpaid").val(unpaid);
});
</script>	
<script>
      // Update Records
      $(document).ready(function(){
        $('#newjar').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: './database/update-jarOrder.php',
            data: $('#newjar').serialize(),
            success: function (data) {
			  if(data==1){
			       $("#addjarform").modal('hide');
				   $("#newjarAlert").modal('show');
			  }
			   else{
				  alert("Something Is Went Wrong");
				}
            }
          });
		return false;
        });

      });
</script>	
</body>
</html>
