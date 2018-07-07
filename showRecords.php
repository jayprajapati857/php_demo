<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Datatable UI</title>
	<link rel='stylesheet' type='text/css' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' />
	<link rel='stylesheet' type='text/css' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css' />
	<link rel='stylesheet' type='text/css' href='https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css' />
    <!-- <link rel='stylesheet' type='text/css' href='http://www.trirand.com/blog/jqgrid/themes/ui.jqgrid.css' /> -->
	
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>	
	<script type='text/javascript' src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
	<script type='text/javascript' src='https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js'></script>
	<script type='text/javascript' src='https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js'></script>
	<script type='text/javascript' src='https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js'></script>
    
	
	<script>
	$(document).ready(function () {
		$("#list_records").DataTable({
			"processing": true,
			"serverSide": true,
			"jQueryUI": true,
			"ordering": true,
			"searching": true,
			"order": [[2, 'asc']],//set column 1 (time)
			"ajax": {
				url: "getGridData.php",
				type: 'POST',
				dataSrc: "data",
				error: function(){  // error handling
                    //$(".employee-grid-error").html("");
                    $("#list_records").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#list_records_processing").css("display","none"); 
                	}
				},		 
			"columns": [
				{ "title": "Profile Picture", "data":"profile_img_path", "orderable":false },
				{ "title": "User Name", "data":"profile_display_name" },
				{ "title": "First Name", "data":"first_name" },
				{ "title": "Last Name", "data":"last_name" },
				{ "title": "Address", "data":"user_address" },
				{ "title": "Email", "data":"user_email" },
				{ "title": "Phone Number", "data":"phone_number" },
				{ "title": "Blood Group", "data":"blood_group" },
				{ "title": "Available Time", "data":"available_time" },
				{ "title": "Type Of Service", "data":"type_of_service" }
			]				
		}); 	
	});
	</script>
</head>

<body style="padding:25px !important; ">
<table id="list_records" class="table table-bordered"></table> 
<div id="perpage"></div>
</body>
</html>