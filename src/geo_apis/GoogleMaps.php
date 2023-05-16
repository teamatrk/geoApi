<?php 
// https://maps.googleapis.com/maps/api/geocode/json?address=Washington&key=YOUR_API_KEY
// https://developers.google.com/maps/documentation/geocoding/requests-geocoding#results
// https://nominatim.openstreetmap.org/search?q=135+pilkington+avenue,+birmingham&format=json&polygon=1&addressdetails=1

class GoogleMaps implements GeoApi
{
	public $address = null;
	private $api_key = 'XXXXXXXXXXXXXXX';
	public function __construct()
	{

	}

	public function getCoordinates(string $address):array
	{
		$this->address  =$address;
		$data = $this->getEndPointAndData();
		$endPoint = $data['endPoint'];
		$postData = $data['post'];
		$response = Helper::curlFetch($endPoint , $postData);
		if($response['status']==OK)
		{
			$result = $this->extractResult($response);
		}
		
		return $result;
	}

	public function getEndPointAndData():array
	{
		$endPoint = 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($this->address).'&key='.$this->api_key;
		return ['endPoint' => $endPoint , 'post' => []];
	}
	public function extractResult($raw):array
	{
		$output = [];
		$output[STATUS] = OK;
		$output[MSG] = SUCCESS_MSG;
		$raw['result'] = json_decode($raw['result']);
		$result = $raw['result']->results;
		if(!isset($result)||empty($result))
		{
			$output[STATUS] = FAILED;
			$output[MSG] = $raw['result']->error_message;
			return $output;
		}

		foreach($result as $k=>$v)
		{
			$coordinates['lat'] = $v->geometry->location->lat;
			$coordinates['lng'] = $v->geometry->location->lng;
			break;
		}
		$output['coordinates'] = $coordinates;
		return $output;
	}
}