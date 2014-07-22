<?php
/*
Ship Date: 2009-08-23T14:00:00
Order Number: 3916317853
object(DellAsset)#2 (1) {
  ["data":"DellAsset":private]=>
  array(11) {
    ["country_lookup_code"]=>
    int(1401)
    ["customer_number"]=>
    float(3913876098)
    ["is_duplicate"]=>
    string(5) "false"
    ["item_class_code"]=>
    string(5) "^#003"
    ["local_channel"]=>
    string(5) "00000"
    ["machine_description"]=>
    string(27) "LatE6500,P8600,CPEN,Maybach"
    ["order_number"]=>
    float(3916317853)
    ["parent_service_tag"]=>
    NULL
    ["service_tag"]=>
    string(7) "FFKN22S"
    ["ship_date"]=>
    string(19) "2009-08-23T14:00:00"
    ["warranties"]=>
    array(8) {
      [0]=>
      object(DellWarranty)#3 (1) {
        ["data":"DellWarranty":private]=>
        array(7) {
          ["end_date"]=>
          string(19) "2013-02-24T12:59:59"
          ["entitlement_type"]=>
          string(7) "INITIAL"
          ["item_number"]=>
          string(12) "WXSN111-LC-I"
          ["service_level_description"]=>
          string(26) "Next Business Day response"
          ["service_level_group"]=>
          int(99999)
          ["service_provider"]=>
          NULL
          ["start_date"]=>
          string(19) "2012-02-23T13:00:00"
        }
      }
      [1]=>
      object(DellWarranty)#4 (1) {
        ["data":"DellWarranty":private]=>
        array(7) {
          ["end_date"]=>
          string(19) "2013-02-24T12:59:59"
          ["entitlement_type"]=>
          string(7) "INITIAL"
          ["item_number"]=>
          string(12) "WXSP111-LC-I"
          ["service_level_description"]=>
          string(19) "Parts Only Warranty"
          ["service_level_group"]=>
          int(99999)
          ["service_provider"]=>
          NULL
          ["start_date"]=>
          string(19) "2012-02-23T13:00:00"
        }
      }
      [2]=>
      object(DellWarranty)#5 (1) {
        ["data":"DellWarranty":private]=>
        array(7) {
          ["end_date"]=>
          string(19) "2013-02-24T12:59:59"
          ["entitlement_type"]=>
          string(7) "INITIAL"
          ["item_number"]=>
          string(17) "WXCW296-LC(AUE)-I"
          ["service_level_description"]=>
          string(41) "Pro Support for IT Tech Support&Assistant"
          ["service_level_group"]=>
          int(99999)
          ["service_provider"]=>
          NULL
          ["start_date"]=>
          string(19) "2012-08-23T14:00:00"
        }
      }
      [3]=>
      object(DellWarranty)#6 (1) {
        ["data":"DellWarranty":private]=>
        array(7) {
          ["end_date"]=>
          string(19) "2012-08-24T13:59:59"
          ["entitlement_type"]=>
          string(7) "INITIAL"
          ["item_number"]=>
          string(12) "WXPW213-LC-I"
          ["service_level_description"]=>
          string(41) "Pro Support for IT Tech Support&Assistant"
          ["service_level_group"]=>
          int(99999)
          ["service_provider"]=>
          NULL
          ["start_date"]=>
          string(19) "2009-08-23T14:00:00"
        }
      }
      [4]=>
      object(DellWarranty)#7 (1) {
        ["data":"DellWarranty":private]=>
        array(7) {
          ["end_date"]=>
          string(19) "2012-02-24T12:59:59"
          ["entitlement_type"]=>
          string(7) "INITIAL"
          ["item_number"]=>
          string(17) "WXCN196-LC(AUE)-I"
          ["service_level_description"]=>
          string(26) "Next Business Day response"
          ["service_level_group"]=>
          int(99999)
          ["service_provider"]=>
          NULL
          ["start_date"]=>
          string(19) "2011-08-23T14:00:00"
        }
      }
      [5]=>
      object(DellWarranty)#8 (1) {
        ["data":"DellWarranty":private]=>
        array(7) {
          ["end_date"]=>
          string(19) "2012-02-24T12:59:59"
          ["entitlement_type"]=>
          string(7) "INITIAL"
          ["item_number"]=>
          string(17) "WXCP196-LC(AUE)-I"
          ["service_level_description"]=>
          string(19) "Parts Only Warranty"
          ["service_level_group"]=>
          int(99999)
          ["service_provider"]=>
          NULL
          ["start_date"]=>
          string(19) "2011-08-23T14:00:00"
        }
      }
      [6]=>
      object(DellWarranty)#9 (1) {
        ["data":"DellWarranty":private]=>
        array(7) {
          ["end_date"]=>
          string(19) "2011-08-24T13:59:59"
          ["entitlement_type"]=>
          string(7) "INITIAL"
          ["item_number"]=>
          string(12) "WXPN122-LC-I"
          ["service_level_description"]=>
          string(26) "Next Business Day response"
          ["service_level_group"]=>
          int(99999)
          ["service_provider"]=>
          NULL
          ["start_date"]=>
          string(19) "2009-08-23T14:00:00"
        }
      }
      [7]=>
      object(DellWarranty)#10 (1) {
        ["data":"DellWarranty":private]=>
        array(7) {
          ["end_date"]=>
          string(19) "2011-08-24T13:59:59"
          ["entitlement_type"]=>
          string(7) "INITIAL"
          ["item_number"]=>
          string(12) "WXPP122-LC-I"
          ["service_level_description"]=>
          string(19) "Parts Only Warranty"
          ["service_level_group"]=>
          int(99999)
          ["service_provider"]=>
          NULL
          ["start_date"]=>
          string(19) "2009-08-23T14:00:00"
        }
      }
    }
  }
}
*/
require_once 'src/dell_api.php';
$dell_api = new DellAPI('1adecee8a60444738f280aad1cd87d0e');
$warranties = $dell_api->getWarranties('FFKN22S');
echo 'Ship Date: ' . $warranties->getShipDate() . PHP_EOL;
echo 'Order Number: ' . $warranties->getOrderNumber() . PHP_EOL;
var_dump($warranties);
?>