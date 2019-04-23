<?php include('header.php'); 
include('./database/config.php');
?>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">All Zone</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Agroshopee</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">All Zone</a></li>
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
                        <th>Zone Id</th>
                        <th>Zone Name</th>
						<th>Contact To</th>
                        <th>Mobile No</th>
						<th>Email</th>
						<th>State</th>
                        <th>City</th>
                        <th></th>
                    </tr>
                </thead>
	 <tbody>
				<?php 
                   $query="SELECT * FROM `zone_tbl` ORDER BY `zone_tbl`.`city` ASC";
                   $res=mysqli_query($conn,$query);
                   while($row=mysqli_fetch_array($res)){?>
        			<tr>
                			<td><?php echo $row['zone_id']; ?></td>
                			<td><?php echo $row['city']; ?></td>
							<td><?php echo $row['owner_name']; ?></td>
                			<td><?php echo $row['mobile']; ?></td>
                			<td><?php echo $row['co_email']; ?></td>
							<td><?php echo $row['state']; ?></td>
                			<td>
							<a href="zone-view.php?zone_id=<?php echo $row['zone_id']; ?>"><button class="btn-tbl btn-warning"><i class="fa fa-eye" aria-hidden="true"></button></i></a>
							<a href="zone-edit.php?zone_id=<?php echo $row['zone_id']; ?>"><button class="btn-tbl btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></button></i></a>
							<a href="#"><button class="btn-tbl btn-danger"><i class="fa fa-trash" aria-hidden="true"></button></i></a>
							</td>

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
