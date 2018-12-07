//Angular Control for Recipe King app

var app = angular.module("recipeSearch", ["ngRoute"]);
app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "views/home.html",
        controller  : "recipeSearchCtrl"
    })
    .when("/about", {
        templateUrl : "views/about.html",
    })
    .when("/recipe", {
        templateUrl : "views/recipe.php",
        controller  : "recipePageController"
    });
});


app.controller("recipeSearchCtrl", function($scope, $http, $location, recipePassService, recipeKeepService, ingredientKeepService){

    $scope.ingredients = ingredientKeepService.get();

    $scope.recipes = recipeKeepService.get();

    $scope.message = "";

    if($scope.recipes === undefined || $scope.recipes.length == 0){
        $scope.showRecipeTable = false;
    }else {
        $scope.showRecipeTable =true;
    }
    $scope.showLoader = false;

    // Reference: https://www.w3schools.com/angular/default.asp , https://www.w3schools.com/angular/angular_application.asp
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
    $scope.selectedOrder = function(x){
        $scope.sortOrder = x;
    }

    $scope.removeIngredient = function (x) {

        $scope.ingredients.splice(x, 1);
        $scope.errorMsg = "";

    }

    $scope.recipeSearch = function() {
        $scope.showLoader = true;

        $http.post("test.php").then

        $http({

            method: 'POST',

            url: 'recipe_king.php',

            data: {

                'ingredients': $scope.ingredients

            },

            headers: { 'Content-Type': 'application/json' }

        }).then(function mySuccess(response) {
            $scope.showLoader = false;
            $scope.showRecipeTable = true;

            $scope.message = response.data;

            for(var i=0; i<response.data.hits.length; i++){

                $scope.recipes[i] = response.data.hits[i].recipe

            }

        }, function myError(response) {

            $scope.message = response.statusText;

        });
    }
    $scope.goToRecipe = function(x) {
        recipePassService.set(x);
        $location.path('/recipe');
    }



});
//service to pass recipe data between pages
app.factory('recipePassService', function() {
    var passedRecipe = {};
    function set(recipe) {
        passedRecipe = recipe;
    }
    function get() {
        return passedRecipe;
    }
    return {
        set : set,
        get : get
    }
});
//service to keep recipe table between pages
app.factory('recipeKeepService', function() {
    var keptRecipes = [];
    function set(recipes) {
        keptRecipes = recipes;
    }
    function get() {
        return keptRecipes;
    }
    return {
        set : set,
        get : get
    }
});
//service to keep ingredient list between pages
app.factory('ingredientKeepService', function() {
    var keptIngredients = [];
    function set(ingredients) {
        keptIngredients = ingredients;
    }
    function get() {
        return keptIngredients;
    }
    return {
        set : set,
        get : get
    }
});
app.controller('recipePageController', function($scope, recipePassService) {
    $scope.recipe = recipePassService.get();
});