
<div class="recipePageDisplay">



    
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6 order-2 order-lg-1">
            <h5 class="display-4" id="recipeName">{{recipe.label}}</h5>
            <form method="POST" action="../printreview.php" id="nameform">
            <input type="hidden" value="document.getElementById('exampleModalLabel').innerHTML">
            </form>
        </div>
        <div class="col-12 col-lg-6 order-1 order-lg-2">
        <div class="card">
                <img ng-src="{{recipe.image}}" class="card-img-bottom">
        </div>
        </div>
    </div>
    <div class="row">
    <div class="col-12 nutritionBox text-center">
            <span>Serving size: {{recipe.yield}}    |    </span>
            <span>Calories: {{recipe.calories | number : 0}}</span>
    </div>
    </div>
    <div class="row recipePageContent">
        <div class="col-12 col-lg-8">
                <h4>Ingredients:</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" ng-repeat="ingredient in recipe.ingredients">{{ingredient.text}}</li>
                </ul>
                
            <h6>Reviews: </h6>
            
                <script>document.getElementById("nameform").submit();</script>
                    
                
        </div>
    </div>

</div>
<a class="btn recipeSearchBtn" role="button" href="#/!" title="Back">Back</a>
</div>