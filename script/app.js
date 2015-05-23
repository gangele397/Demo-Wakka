/**
 * 
 */

angular.module("randomApp", ["ui.router", "ngResource", /*"ngAnimate",*/ "ui.bootstrap"])
.config(["$stateProvider", "$urlRouterProvider", function($stateProvider, $urlRouterProvider){

	$urlRouterProvider.otherwise("/search");
	$stateProvider.state("search", {
		url: "/search",
		templateUrl: "views/search.html"
	})
	.state("result", {
		url: "/result/:query",
		templateUrl: "views/results.html"
	})
	.state("info", {
		url: "/info/:id",
		templateUrl: "views/info.html"
	})
}]);
