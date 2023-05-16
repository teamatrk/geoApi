<?php


interface GeoApi
{



  public function getCoordinates(string $address):array;


  /*
    
    This function must give the endpoint url as well as data to be posted and authourization headers if required.
    return ['endPoint' => 'https://example.com/api/search' , 'post' => []]

  */
  public function getEndPointAndData():array;


  /*
    
    Create logic for extracting the coordinates from the response

  */
  public function extractResult($result):array;

}