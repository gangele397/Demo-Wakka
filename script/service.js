/**
 * 
 */

angular.module("randomApp")
.service("RandomService", ["$resource", function($resource) {
	return $resource("/", {}, {

		getSuggestions: {url:"/suggestions.php", method:"GET", isArray:true},
		getResults:{url:"/php_files/company_name.php", method:"GET"},
		fetchFacets: {url:"/facets.php", method:"GET", isArray:true},
		fetchInfo: {url:"/info.php", method:"GET"},
		fetchTopic: {url:"/php_files/SearchArticleWithCompanyIDandTopic.php", method:"GET"}
/*
		getSuggestions: {url:"/suggestios/:term", method:"GET", isArray:true},
		getResults:{url:"/results/:term", method:"GET", isArray:true},
		fetchFacets: {url:"/facets", method:"GET", isArray:true},
		fetchInfo: {url:"/info/:id", method:"GET"}
*/
	});
}]);
