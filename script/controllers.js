/**
 * 
 */

angular.module("randomApp")
.controller("SearchController", ["$scope", "RandomService", "$state", function($scope, RandomService, $state) {
	$scope.search = "";
	$scope.error = null;
	$scope.suggestions = null;
	$scope.$watch("search", function(value) {
		$scope.error = null;
		if(value.length > 0)
		$scope.suggestions = RandomService.getSuggestions({term:value});
	});
	$scope.performSearch = function() {
		if($scope.search.length < 1) {
			$scope.error = "Search term can not be blank";
			return;
		}
		$state.go("result", {query:$scope.search});
	};
}])
.controller("ResultsController", ["$scope", "RandomService", "$state", function($scope, RandomService, $state) {
	$scope.query = $state.params.query;
	$scope.results = RandomService.getResults({query:$scope.query});
	$scope.facets = RandomService.fetchFacets();
	$scope.showInfo = function(result) {
		$state.go("info", {id:result.id});
	};
	$scope.addFilter = function(facet) {
		
	};
	$scope.removeFilter = function(facet) {
		
	};
}])
.controller("InfoController", ["$scope", "RandomService", "$state", function($scope, RandomService, $state) {
	$scope.id = $state.params;
	$scope.info = RandomService.fetchInfo({id:$scope.query});
}])
.directive('ngEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if(event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.ngEnter);
                });

                event.preventDefault();
            }
        });
    };
});
