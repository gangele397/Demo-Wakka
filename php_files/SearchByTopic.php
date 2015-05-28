<?php
error_reporting(~E_ALL );

	 function getDataWhenSearchhWithTopic($topicName){
		 $url ="http://ec2-54-242-13-110.compute-1.amazonaws.com:8080/solr/select?q=topics:".$topicName."&fq=idx_type:companies&facet=true&facet.mincount=2&facet.field=topics&wt=json&indent=true";
		 echo $url;
	 
	 $json = file_get_contents($url);
	// var_dump($json);
	
	 echo "<pre>".print_r($json,true)."</pre>";
	$jsonArr = json_decode($json, TRUE);
	$TopicData = array();
	foreach($jsonArr['response']['docs'] as $k=>$ele){
	}
	print $ele['id'];
	$TopicData["id"] =$ele['id'];
	$TopicData["title"] =$ele['title'];
	$TopicData["topics"] =$ele['topics'];
	$TopicData["idx_type"] =$ele['idx_type'];
	
	return $TopicData;
	
		
	
}
	$TopicData= getDataWhenSearchhWithTopic("finland");
	echo $jsonformat=json_encode($TopicData);
	//foreach($companyData as $x => $x_value) {
	//	echo $x."=".$x_value;
	//}
	

?>