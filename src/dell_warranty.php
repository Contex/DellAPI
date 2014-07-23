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
class DellWarranty
{
    private $data;

	public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getStartDate()
    {
        return $this->data['start_date'];
    }

    public function getEndDate()
    {
        return $this->data['end_date'];
    }

    public function getEntitlementType()
    {
        return $this->data['entitlement_type'];
    }

    public function getItemNumber()
    {
        return $this->data['item_number'];
    }

    public function getServiceLevelDescription()
    {
        return $this->data['service_level_description'];
    }

    public function getServiceLevelGroup()
    {
        return $this->data['service_level_group'];
    }

    public function getServiceProvider()
    {
        return $this->data['service_provider'];
    }
}
?>