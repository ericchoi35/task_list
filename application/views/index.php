<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Task List</title>
	<!-- <link rel="stylesheet" type="text/css" href="assets/css/style.css"> -->
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>
	<style type="text/css">
		.edit, .checkbox, .task{
			display: inline-block;
		}
		.task{
			display: inline-block;
			margin-left: 10px;
			width: 300px;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){

			$(document).on('click', '.edit', function(){
				
				if($(this).siblings('.task').prop('readonly') == true){
					$(this).siblings('.task').prop('readonly', false);
					
				} else if($(this).siblings('.task').prop('readonly') == false){
	
					var info = {
						'id': $(this).siblings('.task_id').attr('value'),
						'name': $(this).siblings('.task').val()
					};

					$.post(
						$('form').attr('action'),
						info,
						function(data){
							$(this).parent().html(data);
						}
					);
					$(this).siblings('.task').prop('readonly', true);
				}
				return false;
			});	

			$(document).on('click', '.checkbox', function(){
				if($(this).siblings('.task').prop('disabled') == true){
					$(this).siblings('.task').prop('disabled', false);
				}else{
					$(this).siblings('.task').prop('disabled', true);
				}
			});	

			$(document).on('submit','.add_task', function(){
				$.post(
					$(this).attr('action'),
					$(this).serialize(),
					function(data){
						$('#task_list').append(data);
					}
				);
				$('#task_field').val('');
				return false;
			});


		});

	</script>
</head>
<body>
<div class="container">
	<h1>Task Manager</h1>
	<h3>List of tasks:</h3>
	<div class='row'>
		<div class='col-sm-6' id='task_list'>
			<form role='form' action="/tasks/update" method="post">
<?php 			foreach($tasks as $task)
				{	?>
				<div class="form-group">
					<button class='edit btn btn-primary'>edit</button>
					<input class='checkbox' type='checkbox' value="task 1">
					<input class='task_id' type='hidden' name='id' value="<?= $task['id'] ?>"/>
			  		<input class='task form-control' type="text" name="name" value="<?= $task['name'] ?>" readonly/>
				</div>
<?php			}	?>
			</form>
		</div>
		<form class='col-sm-6 add_task' role='form' action="/tasks/add_task" method="post">
			<h4>Create a new task:</h4>
			<div class="form-group">
		  		<input id='task_field' class='task form-control' type="text" name="task_name"/>
			</div>
			<button type='submit' class='btn btn-default'>Add Task</button>
		</form>
	</div>
</div>
</body>
</html>