<?php
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