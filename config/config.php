<?php
define('BASE_URL' , 'http://localhost/geo/');
define('ACTION_URL' , BASE_URL.'src/action.php');

$geo_apis = [
  'GoogleMaps' => ['className' => 'GoogleMaps' , 'name' => 'Google Maps'] ,
   'OSM' => ['className' => 'OSM' , 'name' => 'Open Street Maps']];

define('GEO_APIS' , $geo_apis);

define('OK' , 1);
define('FAILED' , 0);
define("STATUS" , 'status');
define("MSG" , 'message');


define('SUCCESS_MSG' , 'Success');
define('FAILED_MSG' , 'Failed');
define('ADDRESS_NOT_VALID' , 'Address is not valid');
define('DATA_FETCH_ERROR' , 'Data Fetching Failed');