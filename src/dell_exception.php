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