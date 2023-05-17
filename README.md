# geoApi Overview

Simple and basic tool to get coordinates (lat/long) from provided address.

Get Coordinates from GoolgeMaps And OpenStreet Maps.

# Initialization 

Create a new instance of BaseApi 

      $baseApi = new BaseApi();

Call GetCoordinates Function

      $result = $baseApi->getCoordinates($address);


# Add Additional Apis 

1) Create a class in src/geo_apis directory implementing the GeoApi.
2) Add ClassName in config file (Append Array GEO_APIS)

