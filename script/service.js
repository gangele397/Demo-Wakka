/**
 * 
 */

angular.module("randomApp")
.service("RandomService", ["$resource", function($resource) {
	return $resource("/", {}, {
		getSuggestions: {url:"/suggestios/:term", method:"GET", isArray:true},
		getResults:{url:"/results/:term", method:"GET", isArray:true},
		fetchFacets: {url:"/facets", method:"GET", isArray:true},
		fetchInfo: {url:"/info/:id", method:"GET"}
	})
}]);