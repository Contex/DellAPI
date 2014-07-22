<?php
require_once 'curl_exception.php';
require_once 'dell_exception.php';
require_once 'dell_asset.php';

class DellAPI
{
    const API_URL = 'https://api.dell.com/support/';

    private $api_key = NULL,  
            $method,
            $inner_method = 'tags';

    private static function getURL($url, $timeout = 30)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
        if (curl_errno($ch) || $info['http_code'] != 200) {
            $error_number = curl_errno($ch);
            curl_close($ch);
            throw new cURLException($error_number, $info, $result);
        } else {
            curl_close($ch);
            return $result;
        }
    }

    public function __construct($api_key = NULL)
    {
        $this->api_key = $api_key;
    }

    public function getAPIURL()
    {
        return self::API_URL . 'v2/'
                             . 'assetinfo/' 
                             . $this->getMethod() . '/'
                             . $this->getInnerMethod()
                             . '.json?apikey=' . $this->getAPIKey()
                             . '&' . http_build_query($this->getParameters());
    }

    public static function decodeValue($value, $key = NULL)
    {
        if ($key == NULL) {
            return is_array($value) && array_key_exists('@nil', $value) ? NULL : $value;
        } else if (array_key_exists($key, $value)) {
            return is_array($value[$key]) && array_key_exists('@nil', $value[$key]) ? NULL : $value[$key];
        } else {
            return NULL;
        }
    }

    public static function decodeError($error)
    {
        $xml = simplexml_load_string($error);
        $json = json_encode($xml);
        $array = json_decode($json, TRUE);
        return array(
            'code'        => $array['Code'],
            'url'         => $array['Url'],
            'message'     => $array['Message'],
            'reason'      => $array['Reason'],
            'source'      => $array['Source'],
            'stack_trace' => $array['StackTrace']
        );
    }

    private function execute($url = NULL)
    {
        if ($url === NULL) {
            $url = $this->getAPIURL();
        }
        $this->response = self::getURL($url);
    }

    private function getAPIKey()
    {
        return $this->api_key;
    }

    private function getResponse($format = 'json', $url = NULL)
    {
        $this->execute($url);
        switch (strtolower($format)) {
            case 'json':
                return json_decode($this->response, TRUE);
            case 'xml':
                $xml = simplexml_load_string($this->response);
                $json = json_encode($xml);
                return json_decode($json, TRUE);
            default:
                return $this->response;
        }
    }

    public function getMethod()
    {
        return $this->method;
    }

    private function setMethod($method)
    {
        $this->method = $method;
    }

    public function getInnerMethod()
    {
        return $this->inner_method;
    }

    private function setInnerMethod($inner_method)
    {
        $this->inner_method = $inner_method;
    }

    public function getVersion()
    {
        return $this->version;
    }

    private function setVersion($version)
    {
        $this->version = $version;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    private function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    public function getAsset($service_tag)
    {
        $details = $this->getDetails($service_tag);
        $warranties = $this->getWarranties($service_tag);
        $details->mergeWithAsset($warranties);
        return $details;
    }

    public function getDetails($service_tag)
    {
        $this->setMethod('detail');
        $this->setParameters(array(
            'svctags' => $service_tag
        ));
        try {
            $response = $this->getResponse();
        } catch (cURLException $e) {
            if ($e->getcURLResult() === NULL) {
                throw $e;
            } else {
                throw new DellException(self::decodeError($e->getcURLResult()));
            }
        }
        $response = $response['GetAssetDetailResponse']['GetAssetDetailResult']['Response']['DellAsset'];
        return new DellAsset(array(
            'asset_parts'         => self::decodeValue($response['AssetParts']['AssetPart']),
            'country_lookup_code' => self::decodeValue($response, 'CountryLookupCode'),
            'customer_number'     => self::decodeValue($response, 'CustomerNumber'),
            'is_duplicate'        => self::decodeValue($response, 'IsDuplicate'),
            'item_class_code'     => self::decodeValue($response, 'ItemClassCode'),
            'local_channel'       => self::decodeValue($response, 'LocalChannel'),
            'machine_description' => self::decodeValue($response, 'MachineDescription'),
            'order_number'        => self::decodeValue($response, 'OrderNumber'),
            'parent_service_tag'  => self::decodeValue($response, 'ParentServiceTag'),
            'service_tag'         => self::decodeValue($response, 'ServiceTag'),
            'ship_date'           => self::decodeValue($response, 'ShipDate')
        ));
    }

    public function getWarranties($service_tag)
    {
        $this->setMethod('warranty');
        $this->setParameters(array(
            'svctags' => $service_tag
        ));
        try {
            $response = $this->getResponse();
        } catch (cURLException $e) {
            if ($e->getcURLResult() === NULL) {
                throw $e;
            } else {
                throw new DellException(self::decodeError($e->getcURLResult()));
            }
        }
        $response = $response['GetAssetWarrantyResponse']['GetAssetWarrantyResult']['Response']['DellAsset'];
        return new DellAsset(array(
            'country_lookup_code' => self::decodeValue($response, 'CountryLookupCode'),
            'customer_number'     => self::decodeValue($response, 'CustomerNumber'),
            'is_duplicate'        => self::decodeValue($response, 'IsDuplicate'),
            'item_class_code'     => self::decodeValue($response, 'ItemClassCode'),
            'local_channel'       => self::decodeValue($response, 'LocalChannel'),
            'machine_description' => self::decodeValue($response, 'MachineDescription'),
            'order_number'        => self::decodeValue($response, 'OrderNumber'),
            'parent_service_tag'  => self::decodeValue($response, 'ParentServiceTag'),
            'service_tag'         => self::decodeValue($response, 'ServiceTag'),
            'ship_date'           => self::decodeValue($response, 'ShipDate'),
            'warranties'          => self::decodeValue($response['Warranties']['Warranty'])
        ));
    }
}
?>