var app = angular.module("recipeSearch", []);
app.controller("recipeSearchCtrl", function($scope){
    $scope.ingredients = [];
    $scope.recipes = [];
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
        //For testing UI layout:
        $scope.recipes = {
            "recipe1": {"label":"Mashed Potatoes","yield":2,"calories":530},
            "recipe2": {"label":"Potato Stew","yield":5,"calories":730},
            "recipe3": {"label":"Baked Potato","yield":1,"calories":450}
        }
    }
});