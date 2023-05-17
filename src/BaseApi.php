<?php 
class BaseApi
{

  /*

    @method getCoordinates 
    @params String $address
    Array $apis - Array containing Geo Aapis ClassName(s) Names Must Match With Config - GEO_APIS. If empty BaseApi will give results from all APIS.


  */
  public function getCoordinates(string $address , $apis = [])
  {

    $useApis = [];
    if(!empty($apis))
    {
        foreach(GEO_APIS as $k=>$v)
        {
          if(in_array($v['className'] , $apis))
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
        $output[$v['className']] = $result;
    }
    return $output;
  }
}