angular.module('myApp', [])
.controller('myCtrl', function($scope) {
    $scope.firstName= "John";
    $scope.lastName= "Doe";
    console.log (localized.partials);
});

angular.module('wp', [])
.controller('Main', function() {
    console.log ("jasijd");
});