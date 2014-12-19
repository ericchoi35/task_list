<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tasks extends CI_Controller {

	public function index()
	{
		$tasks = $this->Task->get_all_tasks();

		$this->load->view('index', array('tasks' => $tasks));
	}

	public function add_task()
	{
		if(trim($this->input->post('task_name')) != '')
		{
			$this->Task->add_task($this->input->post('task_name'));
		}
		$this->last_task_partial_html();
	}

	public function last_task_partial_html()
	{
		$task =	$this->Task->get_last_task();

		$this->load->view('last_task_partial', array('task' => $task));
	}
	public function partial_html()
	{
		$tasks = $this->Task->get_all_tasks();
		$this->load->view('partial_html', array('tasks' => $tasks));
	}

	public function update()
	{
		$task_info = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name')
			);

		$this->Task->update_task($task_info);

		$this->partial_html();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */