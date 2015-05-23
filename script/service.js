/**
 * 
 */

angular.module("randomApp")
.service("RandomService", ["$resource", function($resource) {
	return $resource("/", {}, {

		getSuggestions: {url:"/suggestios.php", method:"GET", isArray:true},
		getResults:{url:"/results.php", method:"GET", isArray:true},
		fetchFacets: {url:"/facets.php", method:"GET", isArray:true},
		fetchInfo: {url:"/info.php", method:"GET"}

		/*getSuggestions: {url:"/suggestios/:term", method:"GET", isArray:true},
		getResults:{url:"/results/:term", method:"GET", isArray:true},
		fetchFacets: {url:"/facets", method:"GET", isArray:true},
		fetchInfo: {url:"/info/:id", method:"GET"}*/

	});
}]);
