<?php 
interface GeoApi
{
  public function getCoordinates(string $address):array;
  public function getEndPointAndData():array;
  public function extractResult($result):array;
}