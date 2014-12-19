<?php 

class Task extends CI_Model{

	function get_all_tasks()
	{
		return $this->db->query("SELECT * from tasks")->result_array();
	}

	function add_task($task)
	{
		$query = "INSERT INTO tasks (name, created_at, updated_at) VALUES (?, NOW(), NOW())";
		$values = array($task);
		return $this->db->query($query, $values);
	}

	function update_task($task)
	{
		$query = "UPDATE tasks SET name = ? WHERE id = ?";
		$values = array($task['name'], $task['id']);
		return $this->db->query($query, $values);
	}

	function get_last_task()
	{
		return $this->db->query("SELECT * FROM tasks ORDER BY id DESC LIMIT 1")->row_array();
	}
}