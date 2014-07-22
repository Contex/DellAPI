<?php
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