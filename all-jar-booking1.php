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
            <li class="breadcrumb-item"><a href="javaScript:void();">Sejal Aqua Savda</a></li>
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
						<th>Delivery Date</th>
						<th>View Details</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
                   $query="SELECT * FROM `jar_booking1` WHERE `status`='Processing' ORDER BY `jar_booking1`.`delivery_date` ASC";
                   $res=mysqli_query($conn,$query);
                   while($row=mysqli_fetch_array($res)){?>
        			<tr>
                			<td><?php echo $row['booking_id']; ?></td>
                			<td><?php echo $row['customer_name']; ?></td>
							<td><?php echo $row['mobile_no']; ?></td>
                			<td><?php echo $row['city']; ?></td>
							<td><?php echo $row['no_jar']; ?></td>
							<td><?php echo date("d/m/Y", strtotime($row['delivery_date'])); ?></td>
							<td><button type="button" value="<?php echo $row['booking_id']; ?>" class="btn btn-info btn-sm btn-round waves-effect waves-light m-1" onclick="viewOrder(this.value)">View</button></td>
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
                        <input type="button" onclick="printDiv('orderDetails')" value="Print" />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
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
function viewOrder(val) {
$.ajax({
type: "POST",
url: "./database/get_jar_order_details1.php",
data:'booking_id='+val,
success: function(data){
 $("#orderDetails").html(data);
 $("#viewDetails").modal('show');
	}
});      
}
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}
</script>
</body>
</html>
