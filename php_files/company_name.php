
<?php
error_reporting(~E_ALL );

	function getCompanyInfodata($company_name){

	$url = "http://ec2-54-242-13-110.compute-1.amazonaws.com:8080/solr/select?q=title:".$company_name."&fq=idx_type:companies&facet=true&facet.mincount=2&facet.field=topics&wt=json&indent=true";
	//echo $url;
	//echo "\n";
	$json = file_get_contents ( $url );
	//echo $json;
	//var_dump($json);
	$jsonArr = json_decode($json, TRUE);
	
	$companyData = array();
	foreach($jsonArr['response']['docs'] as $k=>$ele){
		
	//print $item['companyDescription'][0];
	$companyData["id"] = $ele['id'];
	$companyData["title"] = $ele['title'];
	$companyData["topics"] = $ele['topics'];
	
	$companyData["idx_type"] = $ele['idx_type'];
	
	return $companyData;
	
		
	}
}
	$companyData= getCompanyInfodata($_GET["name"]);
	echo $jsonformat=json_encode($companyData);
	//foreach($companyData as $x => $x_value) {
	//	echo $x."=".$x_value;
	//}
	

?>
