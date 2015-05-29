<?php
error_reporting(~E_ALL );

	 function getCompanyInfodata($companyId){
	 $url ="http://ec2-54-224-240-20.compute-1.amazonaws.com:9200/entity/company/_search?q=companyId:".$companyId."&sort=companyPopularity:desc&fields=city,compDesig,companyDescription,companyDomain,companyName,companyId,companyPopularity,companyType,country,employees,isCompanyActive,revenueRangeUSD,state,tickerExchange,contactInfo,companyPhone,ccPhone&pretty=true";
	 
	 $json = file_get_contents($url);
	//var_dump($json);
	$jsonArr = json_decode($json, TRUE);
	$companyData = array();
	foreach($jsonArr['hits']['hits'] as $k=>$ele){
		$item=$ele['fields'];
	//print $item['companyDescription'][0];
	$companyData["companyDescription"] = $item['companyDescription'][0];
	$companyData["compDesig"] = $item['compDesig'][0];
	$companyData["state"] = $item['state'][0];
	$companyData["isCompanyActive"] = $item['isCompanyActive'][0];
	$companyData["city"] = $item['city'][0];
	$companyData["country"] = $item['country'][0];
	$companyData["companyPopularity"] = $item['companyPopularity'][0];
	$companyData["tickerExchange"] = $item['tickerExchange'][0];
	$companyData["companyId"] = $item['companyId'][0];
	$companyData["companyDomain"] = $item['companyDomain'][0];
	$companyData["employees"] = $item['employees'][0];

	
	
		
	}
	return $companyData;
}
	$companyData= getCompanyInfodata("726263");
	echo $jsonformat=json_encode($companyData);
	//foreach($companyData as $x => $x_value) {
	//	echo $x."=".$x_value;
	//}
	

?>