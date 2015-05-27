<?php
class TopicInformationData{
	
		public function getCurlResult($url){
		echo $url."\n";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_REFERER, "http://dev.insideview.com");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
		$output = curl_exec($ch);

		curl_close($ch);
		return $output;
	}
	public function getarticleContent($articleId){
		$json = file_get_contents("http://ec2-54-242-13-110.compute-1.amazonaws.com:8080/solr/select?q=id:".$articleId."&wt=json&indent=on");
		$jsonArr = json_decode($json, TRUE);
		echo "<pre>".print_r($jsonArr,true)."</pre>";
		foreach($jsonArr['response'] as $k=>$ele){
		// $item=$ele['fields'];
		 return $item['content'][0]
			
	}
	public function getAllArticlesForGivenCompnayTopic($compnay_id,topic_id){
		
	}
	
	
	
	
}