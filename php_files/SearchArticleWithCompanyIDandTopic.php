<?php
error_reporting(~E_ALL );

	 function getArticleData($companyId,$topicName){
		 $url = "http://ec2-54-242-13-110.compute-1.amazonaws.com:8080/solr/select?q=topics:".$topicName."&fq=company_ids:".$companyId."&wt=json&indent=true";
		
	 
	 $json = file_get_contents($url);
	//echo $json;
	$jsonArr = json_decode($json, TRUE);
	$articleData = array();
	foreach($jsonArr['response'] as $k=>$ele){
		//print_r($ele);
		 foreach ($ele as $entry) {
			 //echo $entry['title'];
			 $articleData[$entry['title']] =$entry['content'];
			 
        
    }
	}
	
	return $articleData;
	
		
	}
	$articleData= getArticleData($_GET["id"], $_GET["topic"]);
	echo $jsonformat=json_encode($articleData);
	//foreach($articleData as $x => $x_value) {
	//	echo $x."=".$x_value;
	//}
	

?>