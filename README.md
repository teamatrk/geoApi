# geoApi Overview

Simple and basic tool to get coordinates (lat/long) from provided address.

Get Coordinates from GoolgeMaps And OpenStreet Maps.

# Initialization 

Create a new instance of BaseApi 

      $baseApi = new BaseApi();

Call GetCoordinates Function

      $result = $baseApi->getCoordinates($address);

# Use Direct Api

Place the entire code in your project directory

End Point - http://yourwebsite.com/projectDirectory/src/action.php

Api - coordinates

Request Body => {address: "Janakpuri, New Delhi" , action: "coordinates"}

      1) (string)  address 
      
      2) (array) apis -> className of apis to include in the result set, leave blank to include all integrated apis 
Response Body => 
      { data
: 
{GoogleMaps: {status: 0, message: "The provided API key is invalid. ", api_name: "Google Maps"},…}
GoogleMaps
: 
{status: 0, message: "The provided API key is invalid. ", api_name: "Google Maps"}
api_name
: 
"Google Maps"
message
: 
"The provided API key is invalid. "
status
: 
0
OSM
: 
{status: 1, message: "Success", coordinates: {lat: "28.6517178", lng: "77.2219388"},…}
api_name
: 
"Open Street Maps"
coordinates
: 
{lat: "28.6517178", lng: "77.2219388"}
message
: 
"Success"
status
: 
1
message
: 
"Success"
status
: 
1 }
      
      
# Add Additional Apis 

1) Create a class in src/geo_apis directory implementing the GeoApi.
2) Add ClassName in config file (Append Array GEO_APIS)

