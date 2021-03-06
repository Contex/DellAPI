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
class DellAssetPart
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

    public function getPartDescription()
    {
        return $this->data['part_description'];
    }

    public function getPartNumber()
    {
        return $this->data['part_number'];
    }

    public function getQuantity()
    {
        return $this->data['quantity'];
    }

    public function getSkuNumber()
    {
        return $this->data['sku_number'];
    }
}
?>