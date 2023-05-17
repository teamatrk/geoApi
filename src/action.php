<?php 
require_once('../config/config.php');
require_once('autoloader.php');


$address = isset($_REQUEST['address'])?Helper::cleanInput($_REQUEST['address']):"";
$apis = isset($_REQUEST['apis'])?Helper::cleanInput($_REQUEST['apis']):[];
$action = isset($_REQUEST['action'])?Helper::cleanInput($_REQUEST['action']):"";

$output = [];
$output['status'] = 0;
$output['message'] = FAILED_MSG;



switch($action)
{
  case 'coordinates' :
    $output = [];
    $output[STATUS] = FAILED;
    $output[MSG] = ADDRESS_NOT_VALID;

    if($address=="")
    {
      Helper::sendResponse($output , true);
    }
      $baseApi = new BaseApi();
      $result = $baseApi->getCoordinates($address , $apis);

    $output[STATUS] = OK;
    $output[MSG] = SUCCESS_MSG;
    $output['data'] = $result;
    Helper::sendResponse($output , true);
  break;

  default :
    Helper::sendResponse($output , true);
  break;
}

