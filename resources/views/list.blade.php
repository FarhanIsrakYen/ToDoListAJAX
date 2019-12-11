<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>To-Do List</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> <!-- bootstrap cdn -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> <!-- fontawsome cdn -->
</head>
<body>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-3 col-lg-6">
				

				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">ToDo list in AJAX<a href="#" data-toggle="modal" data-target="#myModal" class="pull-right"><i class="fa fa-plus" aria-hidden="true"></a></i></h3> <!-- pul right class took the "+" to the right -->
				  </div>
				  <div class="panel-body">
				    <ul class="list-group">
				      <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Cras justo odio</li> <!-- ourItem class created by user -->
				      <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Dapibus ac facilisis in</li>
				      <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Morbi leo risus</li>
				      <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Porta ac consectetur ac</li>
				      <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Vestibulum at eros</li>
				    </ul>
				  </div>
				</div>
			</div>
		</div>
	</div>

	<!-- modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="title">Add New Item</h4>
	      </div>
	      <div class="modal-body">
	        <p><input type="text" placeholder="Write Item Name" id="addItem" class="form-control"></p> <!-- form-control class increases the width of the input space -->
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal" id="remove" style="display: none;">Remove</button>
	        <button type="button" class="btn btn-success" id="savechanges" style="display: none;">Save Changes</button>
	        <button type="button" class="btn btn-primary" id="addBtn">Add Item</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	  crossorigin="anonymous"></script>	<!-- jquery cdn -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <!-- bootstrap script cdn -->
  	<script type="text/javascript">
  		$('#myModal').on('shown.bs.modal', function () {
  		  $('#myInput').focus()
  		})
  	</script>
  	<script type="text/javascript">
  		$(document).ready(function() {
  			$('.ourItem').each(function(){
  				$(this).click(function(event){
  					var text = $(this).text();
  					$('#title').text('Edit Item');
  					$('#remove').show('400');
  					$('#savechanges').show('400');
  					$('#addItem').val(text);
  					$('#addBtn').hide('400');
  					console.log(text);
  				});
  			});
  			
  		});
  	</script>
</body>
</html>