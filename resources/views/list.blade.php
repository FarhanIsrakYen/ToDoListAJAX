<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>To-Do List</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> <!-- bootstrap cdn -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> <!-- fontawsome cdn -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha256-rByPlHULObEjJ6XQxW/flG2r+22R5dKiAoef+aXWfik=" crossorigin="anonymous"> <!-- jquery ui cdn --> 
</head>
<body>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-3 col-lg-6">
				

				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">ToDo list in AJAX<a href="#" id="addNew" data-toggle="modal" data-target="#myModal" class="pull-right"><i class="fa fa-plus" aria-hidden="true"></a></i></h3> <!-- pul right class took the "+" to the right -->
				  </div>
				  <div class="panel-body" id="items">
				    <ul class="list-group">
				    	@foreach ($items as $item)
				    		<li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">{{$item->item}}
				    			<input type="hidden" id="itemId" value="{{$item->id}}">
				    		</li> <!-- ourItem class created by user -->		
				    	@endforeach 
				      
				      
				    </ul>
				  </div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-offset-5 col-lg-2">
		<input type="text" class="form-control" name="searchItem" id="searchItem" placeholder="Search Item">
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
	      	<input type="hidden" id="id">
	        <p><input type="text" placeholder="Write Item Name" id="addItem" class="form-control"></p> <!-- form-control class increases the width of the input space -->
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal" id="remove" style="display: none;">Remove</button>
	        <button type="button" class="btn btn-success" data-dismiss="modal" id="savechanges" style="display: none;">Save Changes</button>
	        <button type="button" class="btn btn-primary" data-dismiss="modal" id="addBtn">Add Item</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	  crossorigin="anonymous"></script>	<!-- jquery cdn -->
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script> <!-- jquery ui cdn -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <!-- bootstrap script cdn -->
@csrf
  	<script type="text/javascript">
  		$('#myModal').on('shown.bs.modal', function () {
  		  $('#myInput').focus()
  		})
  	</script>
  	<script type="text/javascript">
  		$(document).ready(function() {
  			$(document).on('click','.ourItem',function(event){
  				
  					var text = $(this).text();
  					var id = $(this).find('#itemId').val();
  					$('#title').text('Edit Item');
  					$('#remove').show('400');
  					$('#savechanges').show('400');
  					$('#addItem').val(text);
  					$('#addBtn').hide('400');
  					$('#id').val(id);
  			});


  				$(document).on('click','#addNew',function(event){
  					var text = $(this).text();
  					$('#title').text('Add New Item');
  					$('#remove').hide('400');
  					$('#savechanges').hide('400');
  					$('#addItem').val("");
  					$('#addBtn').show('400');
  				});

  				$('#remove').click(function(event){
  					var id=$("#id").val();
  					$.post('delete', {'id': id,'_token':$('input[name=_token]').val()}, function(data){
  					   
  					   $('#items').load(location.href + "#items");
  					  });
  					
  				});

  				$('#addBtn').click(function(event){
  					var text = $('#addItem').val();
  					$.post('list', {'text': text,'_token':$('input[name=_token]').val()}, function(data){
  					   
  					   $('#items').load(location.href + "#items");
  					  });
  					
  				});

  				$('#savechanges').click(function(event){
  					var id=$("#id").val();
  					var text = $('#addItem').val();
  					$.post('update', {'id':id,'text': text,'_token':$('input[name=_token]').val()}, function(data){
  					   
  					   $('#items').load(location.href + "#items");
  					  });
  					
  				});

  			$( function() {
  			    
  			    $( "#searchItem" ).autocomplete({
  			      source: 'http://localhost:8000/search'
  			    });
  			  } );		
  			
  		});

  		
  	</script>
</body>
</html>