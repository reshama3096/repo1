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
		    <h4 class="page-title">All Orders</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Sejal Aqua</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">All  Orders</a></li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       <div class="btn-group float-sm-right">
        <a href="new-order.php"><button class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-cart-plus"></i> New Order</button></a>
      </div>
     </div>
     </div>
    <!-- End Breadcrumb-->
  <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i>All  Orders</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Customer Name</th>
                        <th>Mobile No</th>
                        <th>No. Boxes</th>
						<th>Total Amount</th>
                        <th>Status</th>
						<th>Edit</th>
						<th>View Details</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
                   $query="SELECT order_tbl.*, customer_tbl.customer_name FROM order_tbl INNER JOIN customer_tbl ON order_tbl.cust_id=customer_tbl.cust_id";
                   $res=mysqli_query($conn,$query);
                   while($row=mysqli_fetch_array($res)){?>
        			<tr>
                			<td><?php echo $row['order_id']; ?></td>
                			<td><?php echo $row['customer_name']; ?></td>
							<td><?php echo $row['mobile']; ?></td>
                			<td><?php echo $row['no_box']; ?></td>
							<td>₹ <?php echo $row['total_amt']; ?></td>
							<td><?php echo $row['status']; ?></td>
							<td><a href="order-edit.php?orderid=<?php echo $row['order_id'];?>" class="btn btn-success btn-sm btn-round waves-effect waves-light m-1">Edit</a></td>
							<td><button type="button" value="<?php echo $row['order_id']; ?>" class="btn btn-info btn-sm btn-round waves-effect waves-light m-1" onclick="viewOrder(this.value)">View</button></td>
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
url: "./database/get_order_details.php",
data:'pen_order_id='+val,
success: function(data){
 $("#orderDetails").html(data);
 $("#viewDetails").modal('show');
	}
});      
}
</script>
</body>
</html>
