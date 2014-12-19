<div class="form-group">
	<button class='edit btn btn-primary'>edit</button>
	<input class='checkbox' type='checkbox' value="task 1">
	<input class='task_id' type='hidden' name='id' value="<?= $task['id'] ?>"/>
		<input class='task form-control' type="text" name="name" value="<?= $task['name'] ?>" readonly/>
</div>