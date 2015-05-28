<?php
error_reporting(~E_ALL );
class companyDataInfo{
	public function getCompanyInfodata($companyId){
		echo $companyId;
		$json = file_get_contents("http://ec2-54-224-240-20.compute-1.amazonaws.com:9200/entity/company/_search?q=companyId:".$companyId."&sort=companyPopularity:desc&fields=city,compDesig,companyDescription,companyDomain,companyName,companyId,companyPopularity,companyType,country,employees,isCompanyActive,revenueRangeUSD,state,tickerExchange,contactInfo,companyPhone,ccPhone&pretty=true");
	var_dump($json);
	$jsonArr = json_decode($json, TRUE);
	echo "<pre>".print_r($jsonArr,true)."</pre>";
	$companyData = array();
	foreach($jsonArr['hits']['hits'] as $k=>$ele){
		$item=$ele['fields'];
	//print $item['companyDescription'][0];
	array_push($companyData,$item['companyDescription'][0]);
	array_push($companyData,$item['compDesig'][0]);
	array_push($companyData,$item['state'][0]);
	array_push($companyData,$item['isCompanyActive'][0]);
	array_push($companyData,$item['city'][0]);
	array_push($companyData,$item['country'][0]);
	array_push($companyData,$item['companyPopularity'][0]);
	array_push($companyData,$item['tickerExchange'][0]);
	array_push($companyData,$item['companyType'][0]);
	array_push($companyData,$item['companyId'][0]);
	array_push($companyData,$item['companyDomain'][0]);
	array_push($companyData,$item['employees'][0]);
		
	echo "<pre>".print_r($companyData)."</pre>";
	
		
	}
}


}
 $companyObj = new companyDataInfo();
 $companyObj->getCompanyInfodata("726263");



?>