<?php
require_once 'dell_warranty.php';
require_once 'dell_asset_part.php';

class DellAsset
{
    private $data;

	public function __construct($data)
    {
        $this->data = $data;
        if (array_key_exists('asset_parts', $data)) {
            foreach ($this->data['asset_parts'] as &$asset_part) {
                $asset_part = new DellAssetPart(array(
                    'part_description' => DellAPI::decodeValue($asset_part, 'PartDescription'),
                    'part_number'      => DellAPI::decodeValue($asset_part, 'PartNumber'),
                    'quantity'         => DellAPI::decodeValue($asset_part, 'Quantity'),
                    'sku_number'       => DellAPI::decodeValue($asset_part, 'SkuNumber')
                ));
            }
        }
        if (array_key_exists('warranties', $data)) {
            foreach ($this->data['warranties'] as &$warranty) {
                $warranty = new DellWarranty(array(
                    'end_date'                  => DellAPI::decodeValue($warranty, 'EndDate'),
                    'entitlement_type'          => DellAPI::decodeValue($warranty, 'EntitlementType'),
                    'item_number'               => DellAPI::decodeValue($warranty, 'ItemNumber'),
                    'service_level_description' => DellAPI::decodeValue($warranty, 'ServiceLevelDescription'),
                    'service_level_group'       => DellAPI::decodeValue($warranty, 'ServiceLevelGroup'),
                    'service_provider'          => DellAPI::decodeValue($warranty, 'ServiceProvider'),
                    'start_date'                => DellAPI::decodeValue($warranty, 'StartDate')
                ));
            }
        }
    }

    public function mergeWithAsset($asset)
    {
        if (array_key_exists('asset_parts', $asset->getData())) {
            $this->data['asset_parts'] = $asset->getAssetParts();
        }
        if (array_key_exists('warranties', $asset->getData())) {
            $this->data['warranties'] = $asset->getWarranties();
        }
    }

    public function getData()
    {
        $data = $this->data;
        if (array_key_exists('asset_parts', $this->data)) {
            $data['asset_parts'] = array();
            foreach ($this->getAssetParts() as $asset_part) {
                $data['asset_parts'][] = $asset_part->getData();
            }
        }
        if (array_key_exists('warranties', $this->data)) {
            $data['warranties'] = array();
            foreach ($this->getWarranties() as $warranty) {
                $data['warranties'][] = $warranty->getData();
            }
        }
        return $data;
    }

    public function getAssetParts()
    {
        return array_key_exists('asset_parts', $this->data) ? $this->data['asset_parts'] : NULL;
    }

    public function getCountryLookupCode()
    {
        return $this->data['country_lookup_code'];
    }

    public function getCustomerNumber()
    {
        return $this->data['customer_number'];
    }

    public function isDuplicate()
    {
        return $this->data['is_duplicate'] == 'true';
    }

    public function getItemClassCode()
    {
        return $this->data['item_class_code'];
    }

    public function getLocalChannel()
    {
        return $this->data['local_channel'];
    }

    public function getMachineDescription()
    {
        return $this->data['machine_description'];
    }

    public function getOrderNumber()
    {
        return $this->data['order_number'];
    }

    public function getParentServiceTag()
    {
        return $this->data['parent_service_tag'];
    }

    public function getServiceTag()
    {
        return $this->data['service_tag'];
    }

    public function getShipDate()
    {
        return $this->data['ship_date'];
    }

    public function getWarranties()
    {
        return array_key_exists('warranties', $this->data) ? $this->data['warranties'] : NULL;
    }
}
?>