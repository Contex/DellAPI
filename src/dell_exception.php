<?php
class DellException extends Exception
{
	public function __construct($data)
	{
		$this->data = $data;
	}

	public function getDellCode()
	{
		return $this->data['code'];
	}

	public function getDellURL()
	{
		return $this->data['url'];
	}

	public function getDellMessage()
	{
		return $this->data['message'];
	}

	public function getDellReason()
	{
		return $this->data['reason'];
	}

	public function getDellSource()
	{
		return $this->data['source'];
	}

	public function getDellStackTrace()
	{
		return $this->data['stack_trace'];
	}
}
?>