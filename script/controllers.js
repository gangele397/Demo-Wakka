/**
 * 
 */

angular.module("randomApp")
.controller("SearchController", ["$scope", "RandomService", "$state", function($scope, RandomService, $state) {
	$scope.ui = {};
	$scope.ui.search = "";
	$scope.error = null;
	$scope.suggestions = null;
	$scope.$watch("ui.search", function(value) {
		$scope.error = null;
		if(value.length > 0)
		$scope.suggestions = RandomService.getSuggestions({term:value});
	});
	$scope.performSearch = function() {
		if($scope.ui.search.length < 1) {
			$scope.error = "Search term can not be blank";
			return;
		}
		$state.go("result", {query:$scope.ui.search});
	};
}])
.controller("ResultsController", ["$scope", "RandomService", "$state", function($scope, RandomService, $state) {
	$scope.ui = {};
	$scope.ui.search = "";
	$scope.error = null;
	$scope.suggestions = null;
	$scope.$watch("ui.search", function(value) {
		$scope.error = null;
		if(value.length > 0)
		$scope.suggestions = RandomService.getSuggestions({term:value});
	});
	$scope.performSearch = function() {
		if($scope.ui.search.length < 1) {
			$scope.error = "Search term can not be blank";
			return;
		}
		$state.go("result", {query:$scope.ui.search});
	};

	$scope.query = $state.params.query;
	if($scope.query) $scope.results = RandomService.getResults({query:$scope.query});
	else $scope.results = null;

	$scope.showInfo = function(result) {
		$state.go("info", {id:result.id});
	};
	$scope.addFilter = function(facet) {
		
	};
	$scope.removeFilter = function(facet) {
		
	};
}])
.controller("InfoController", ["$scope", "RandomService", "$state", function($scope, RandomService, $state) {
	//$scope.id = $state.params;
	$scope.info = RandomService.fetchInfo($state.params);
}])
.controller("TopicController", ["$scope", "RandomService", "$state", function($scope, RandomService, $state) {
	//$scope.id = $state.params;
	$scope.info = RandomService.fetchTopic($state.params);
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
