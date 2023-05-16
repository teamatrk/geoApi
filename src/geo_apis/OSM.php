<?php 
class OSM implements GeoApi
{

	private $endPoint = 'https://nominatim.openstreetmap.org/search';
	public function __construct()
	{

	}



	public function getCoordinates($address):array
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
		$endPoint = $this->endPoint.'?q='.urlencode($this->address).'&format=json&polygon=1&addressdetails=1';
		return ['endPoint' => $endPoint , 'post' => []];
	}
	public function extractResult($res):array
	{
		$output = [];
		$output[STATUS] = OK;
		$output[MSG] = SUCCESS_MSG;
		$result = json_decode($res['result']);
		if(!is_array($result)||empty($result))
		{
			$output[STATUS] = FAILED;
			$output[MSG] = FAILED_MSG;
			return $output;
		}

		foreach($result as $k=>$v)
		{
			$coordinates['lat'] = $v->lat;
			$coordinates['lng'] = $v->lon;
			break;
		}
		$output['coordinates'] = $coordinates;
		return $output;
	}



}