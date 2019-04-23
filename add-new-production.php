<?php include('header.php');
?>
<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Production Update</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Demo</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Production Stock</a></li>
         </ol>
	   </div>
     </div>
    <!-- End Breadcrumb-->
	<!---Stock Update Form--->
		<div class="row" ng-app="myApp" ng-controller="myController">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
			<form role="form" action="#" class="form-horizontal" id="production" method="POST">			
                <h4 class="form-header text-uppercase">
                  <i class="fa fa-address-book-o"></i>
              Add New Production Stock
                </h4>
                <div class="form-group row">
				<div class="col-sm-2">
					</div>
				  <div class="col-sm-3">
				   <label for="input-3">Product Type</label>
					<select class="form-control" name="stockname" id="stockname">
						<option disabled selected value="">Select Product Type</option>
						<option value="Boxes">Boxes</option>
					</select>
				  </div>
				  <div class="col-sm-2">
					<label for="input-3">Total Boxes</label>
					<input type="number" min="0" class="form-control" name="totalbox" id="totalbox">
				  </div>
				  <div class="col-sm-2">
				  <label for="input-3">Add</label>
				  <button type="submit" class="form-control btn btn-warning" id="save" name="save"> Add Stock </button>
				  </div>
				</div>
              </form>
            </div>
          </div>
        </div>
      </div><!--End Row-->
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
  <div class="modal fade" id="prod_submit">
                  <div class="modal-dialog">
                    <div class="modal-content animated flipInX">
                      <div class="modal-header">
                        <h5 class="modal-title"><i class="fa fa-camera-retro"></i> Production Update Alert</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
					  
                       <p>Production Added In Stock Successfully !!<br>Thank You</p>
                        
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
<!--The Controller-->
<script>
$(document).ready(function(){
        $('#production').on('submit', function (e) {
            $('#save').attr("disabled", true);
			var stockname    = $('#stockname').val();
			var totalbox    	= $('#totalbox').val();
          e.preventDefault();
		if(stockname && totalbox){
          $.ajax({
            type: 'post',
            url: './database/insert-production.php',
            data: $('#production').serialize(),
            success: function (data) {
			  if(data==0){
				alert("Oops Something Is Went Wrong..");
			  }
			  if(data==1){
			    $('#stockname').val("");
			    $('#totalbox').val("");
              $("#prod_submit").modal('show');
			  }
           }
         });
		}
		else{
			alert("Please Check All Details... There is Something Missing !!!");
		}
		return false;
        });

      });

</script>	
</body>
</html>
