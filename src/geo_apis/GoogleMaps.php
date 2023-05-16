<?php 

class GoogleMaps implements GeoApi
{
	public $address = null;
	private $api_key = 'XXXXXXXXXXXXXXX';
	private $endPoint = 'https://maps.googleapis.com/maps/api/geocode/json';
	public function __construct()
	{

	}

	public function getCoordinates(string $address):array
	{
		$this->address  =$address;
		$data = $this->getEndPointAndData();
		$endPoint = $data['endPoint'];
		$postData = isset($data['post'])?$data['post']:[];
		$authourizationHeader = isset($data['auth'])?$data['auth']:[];
		$response = Helper::curlFetch($endPoint , $postData);
		if($response['status']==OK)
		{
			$result = $this->extractResult($response);
		}
		
		return $result;
	}

	public function getEndPointAndData():array
	{
		$endPoint = $this->endPoint.'?address='.urlencode($this->address).'&key='.$this->api_key;
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