<?php
class cURLException extends Exception
{
	public function __construct($curl_error, $curl_info, $curl_result)
	{
		$this->curl_error = $curl_error;
		$this->curl_info = $curl_info;
		$this->curl_result = $curl_result;
	}

	public function getcURLError()
	{
		return $this->curl_error;
	}

	public function getcURLInfo()
	{
		return $this->curl_info;
	}

	public function getcURLResult()
	{
		return $this->curl_result;
	}
}
?>