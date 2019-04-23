<?php include('header.php'); 
include('./database/config.php');
?>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">All Customers</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Sejal Aqua</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">All Customers</a></li>
         </ol>
	   </div>
     </div>
    <!-- End Breadcrumb-->
   <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Customer Id</th>
                        <th>Customer Name</th>
                        <th>Mobile No</th>
                        <th>City</th>
                        <th>Route</th>
                        <th>View</th>
                        <th>Edit</th>
                    </tr>
                </thead>
	 <tbody>
				<?php 
                   $query="SELECT * FROM `customer_tbl` ORDER BY `customer_tbl`.`customer_name` ASC";
                   $res=mysqli_query($conn,$query);
                   while($row=mysqli_fetch_array($res)){?>
        			<tr>
                			<td><?php echo $row['cust_id']; ?></td>
                			<td><?php echo $row['customer_name']; ?></td>
							<td><?php echo $row['mobile_no']; ?></td>
                			<td><?php echo $row['village']; ?></td>
                			<td><?php echo $row['city']; ?></td>
                			<td><a href="view-customer-details.php?cust_id=<?php echo $row['cust_id']; ?>"><button type="button" class="btn btn-warning btn-sm btn-round waves-effect waves-light m-1">View</button></a></td>
							<td><a href="customer-edit.php?cust_id=<?php echo $row['cust_id']; ?>"><button type="button" class="btn btn-info btn-sm btn-round waves-effect waves-light m-1">Edit</button></a></td>
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
	<?php include('footer.php') ?>
	<!--End footer-->
   
  </div><!--End wrapper-->


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
	
</body>
</html>
