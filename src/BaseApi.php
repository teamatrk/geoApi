<?php 
class BaseApi
{
  public function getCoordinates($address , $apis = [])
  {

    $useApis = [];
    if(!empty($apis))
    {
        foreach(GEO_APIS as $k=>$v)
        {
          if(in_array($v , $apis))
          {
            $useApis[$k] = $v;
          }
        }
    }
    else
    {
      $useApis = GEO_APIS;
    }
    foreach($useApis as $k=>$v)
    {
        $obj = null;
        $obj = new $v['className']();
        $result = $obj->getCoordinates($address);
        $result['api_name'] = $v['name'];
        $output[$v['name']] = $result;
    }
    return $output;
  }
}