var app = angular.module("recipeSearch", []);
app.controller("recipeSearchCtrl", function($scope, $http){
    $scope.ingredients = [];
    $scope.recipes = [];
    $scope.message = "";
    $scope.showRecipeTable =false;
    $scope.addIngredient = function() {
        if(!$scope.addIn){
            return;
        }
        if ($scope.ingredients.indexOf($scope.addIn) == -1){
            $scope.ingredients.push($scope.addIn);
            $scope.addIn = "";
        }else {
            $scope.errorMsg = "Ingredient already added.";
        }
    }
    $scope.removeIngredient = function (x) {
        $scope.errorMsg = "";
        $scope.ingredients.splice(x, 1);
    }
    $scope.recipeSearch = function() {
        $scope.showRecipeTable = true;
        //Need to add Ajax call to PHP, send ingredients[], receive JSON -> display
        $http.post("test.php").then
        $http({
            method: 'POST',
            url: 'recipe_king.php',
            data: $scope.ingredients,
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).then(function mySuccess(response) {
            $scope.message = response.data;
        }, function myError(response) {
            $scope.message = response.statusText;
        });
    }
});