<?php include('header.php');
?>
<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Expenses Update</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Sejal Aqua</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Add Expenses</a></li>
         </ol>
	   </div>
     </div>
    <!-- End Breadcrumb-->
	<!---Stock Update Form--->
		<div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
			<form role="form" action="#" class="form-horizontal" id="expensesForm" method="POST">			
                <h4 class="form-header text-uppercase">
                  <i class="fa fa-address-book-o"></i>
              Add Expenses
                </h4>
                <div class="form-group row">
				<div class="col-sm-2">
					</div>
				  <div class="col-sm-3">
				   <label for="input-3">Reason For Expense</label>
<input type="text" class="form-control" list="reasonfor" name="reason" id="reason">
						<datalist id=reasonfor>
						  <option value="State Bank Of India">
						  <option value="Punjab National Bank">
						  <option value="RTGS">
						</datalist>
				  </div>
				  <div class="col-sm-2">
					<label for="input-3">Amount</label>
					<input type="number" min="0" class="form-control" name="amount" id="amount">
				  </div>
				  <div class="col-sm-2">
				  <label for="input-3">Add</label>
				  <button type="submit" class="form-control btn btn-info" id="save" name="save">Add Expense</button>
				  </div>
				</div>
              </form>
            </div>
          </div>
        </div>
      </div><!--End Row-->
	   <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i>Todays Expenses</div>
            <div class="card-body">
				<div class="table-responsive" id="expensesTbl">
             
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
  <div class="modal fade" id="expensesAlert">
                  <div class="modal-dialog">
                    <div class="modal-content animated flipInX">
                      <div class="modal-header">
                        <h5 class="modal-title"><i class="fa fa-inr"></i> Expense Alert</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
					  
                       <p>Expenses Added Successfully !!<br>Thank You</p>
                        
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
	expensesData();
        $('#expensesForm').on('submit', function (e) {
			$('#save').attr('disabled',true);
			var reason    = $('#reason').val();
			var amount    	= $('#amount').val();
          e.preventDefault();
		if(reason && amount){
          $.ajax({
            type: 'post',
            url: './database/insert-expensesForm.php',
            data: $('#expensesForm').serialize(),
            success: function (data) {
				 if(data==2){
				alert("Sorry You Have Low Balance Than Expenses..");
				$('#reason').val("");
			    $('#amount').val("");
			  }
			  if(data==3){
				alert("Sorry You Have No Balance Today Please Check..");
				$('#reason').val("");
			    $('#amount').val("");
			  }
			  if(data==1){
			    $('#reason').val("");
			    $('#amount').val("");
				$('#save').attr('disabled',false);
				expensesData();
              $("#expensesAlert").modal('show');
			  }
           }
         });
		}
		else{
			alert("Please Check All Details... There is Something Missing !!!");
			$('#save').attr('disabled',false);
		}
		return false;
        });

      });
	  
function expensesData() {
	var val="Lokesh";
		$.ajax({
		type: "POST",
		url: "./database/expenses-report.php",
		data:'expense='+val,
		success: function(data){
		$("#expensesTbl").html(data);
		}
	});
}
</script>	
</body>
</html>
