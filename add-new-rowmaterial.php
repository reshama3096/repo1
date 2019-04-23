<?php include('header.php');
?>
<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Row Materials</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Demo</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Add New Row Materials</a></li>
         </ol>
	   </div>
     </div>
    <!-- End Breadcrumb-->
	<!---Stock Update Form--->
	<div class="row">
      <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
             <form>
               <h4 class="form-header text-uppercase">
				<i class="fa fa-address-book-o"></i>
				Row Materials Stock Update
			  </h4>
              <div class="form-group row">
				<div class="col-sm-3">
					<label for="input-3">Product Type</label>
					<select class="form-control" name="product" id="product">
						<option disabled selected value="">Select Product Type</option>
						<option  value="Preform">Preform</option>
						<option  value="Precap">Precap</option>
						<option  value="Labels">Labels</option>
						<option  value="Boxes">Boxes</option>
						<option  value="Seal">Seal</option>
					</select>
				</div>
				<div class="col-sm-2">
					<label for="input-3">Total Stock</label>
					<input type="number" min="0" class="form-control" name="totStock" id="totStock" >
				</div>
				<div class="col-sm-2">
					<label for="input-3">Damage Stock</label>
					<input type="number" min="0"  class="form-control" name="damStock" id="damStock" >
				</div>
				<div class="col-sm-2">
					<label for="input-3">Good Stock</label>
					<input type="number" class="form-control" min="0"  name="goodStock" id="goodStock" readonly>
				</div>
				<div class="col-sm-2">
				  <label for="input-3">Add</label>
				  <button type="button" class=" btn btn-warning form-control" id="addstock"> Add Stock </button>
				</div>
				<div class="col-sm-1">
				</div>
			</div>
			</form>
			<form role="form" action="#" class="form-horizontal "id="stockupdate" method="POST">			
			<div class="table-responsive">
				<table class="table table-bordered" id="datatable">
					<tr>
						<th>Remove</th>
						<th>Product Type</th>
						<th>Total Stock</th>
						<th>Damage Stock</th>
						<th>Good Stock</th>
					</tr>
					  <input type="hidden" name="count" id="count" readonly>   
					<div class="form-footer">
						<button type="button" id="removerow" class="btn btn-danger pull-right" style="padding: 8px;margin-bottom: 10px;margin-left: 10px;">Remove Row</button>
						<button type="submit" class="btn btn-primary pull-right" name="save" id="save" style="padding: 8px;" disabled>Submit Data</button>
					</div>
				</table>
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
                        <h5 class="modal-title"><i class="fa fa-camera-retro"></i> Row Materials Alert</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
					  
                       <p>Row Materials Added In Stock Successfully !!<br>Thank You</p>
                        
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
<script type="text/javascript">
    $(document).ready(function(){
		var count=0;
        $("#addstock").click(function(){
			count++;
			var product = $("#product").val();
            var totStock = $("#totStock").val();
            var damStock = $("#damStock").val();
			var goodStock = $("#goodStock").val();
            var markup = "<tr><td><input type='checkbox' name='record'></td><td><input type='text' class='form-control' name='product"+count+"' value='"+product+"' readonly></td><td><input type='text' class='form-control' name='totStock"+count+"' value='"+totStock+"' readonly></td><td><input type='text' class='form-control' name='damStock"+count+"' value='"+damStock+"' readonly></td><td><input type='text' class='form-control' name='goodStock"+count+"' value='"+goodStock+"' readonly></td></tr>";
            $("table tbody").append(markup);
			$('#save').attr("disabled", false);
			$("#count").val(count);
			$("#product").val("");
            $("#totStock").val("");
            $("#damStock").val("");
			$("#goodStock").val("");
        });
        // Find and remove selected table rows
        $("#removerow").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
 });
  $("#totStock,#damStock").keyup(function(){
	   var totStock = $("#totStock").val();
       var damStock = $("#damStock").val();
	   var goodStock=parseInt(totStock)-parseInt(damStock);
	   $("#goodStock").val(goodStock);
});
</script>
<script>
$(document).ready(function(){
        $('#stockupdate').on('submit', function (e) {
        $('#save').attr("disabled", true);
          $.ajax({
            type: 'post',
            url: './database/insert-rowmaterial.php',
            data: $('#stockupdate').serialize(),
            success: function (data) {
			  if(data==0){
				alert("Oops Something Is Went Wrong..");
			  }
			  if(data==1){
			  $("#datatable tr:gt(0)").remove();
			  $('#save').attr("disabled", false);
              $("#prod_submit").modal('show');
			  }
           }
         });
		return false;
        });

      });

</script>	
</body>
</html>
