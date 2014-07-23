<?php
/*
 * This file is part of DellAPI <https://github.com/Contex/DellAPI>.
 *
 * DellAPI is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * DellAPI is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
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