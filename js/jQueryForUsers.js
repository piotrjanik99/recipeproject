/* AJAX for Add User Recipe */
$(document).ready(function() {
    $("#addRecipeUserForm").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "addRecipe.php",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(responseText) {
                if(responseText == 0) {
                    $("#SuccessAddRecipe").fadeIn();
                    $("#SuccessAddRecipe").text('Dodano pomyślnie!');
                    $("#addRecipeUserForm")[0].reset();
                    $("#SuccessAddRecipe").delay(4000).fadeOut();
                }
                else if(responseText == 1) {
                    $("#errorAddRecipe").fadeIn();
                    $("#errorAddRecipe").text('Wystąpił błąd!');
                    $("#errorAddRecipe").delay(4000).fadeOut();
                }
            }
        });
    });
});

/* PRZYCISK POKAZANIA PRZEPISÓW */
$("#recipes").click(function(){
    $("#addRecipeUserForm").toggle();
});

$("#recipes").click(function(){
    $("#userRecipes").toggle();
});

$("#recipes").click(function(){
    $("#recipeAdd").toggle();
});

$("#recipes").click(function(){
    $("#recipes").toggle();
});

/* PRZYCISK DODANIA PRZEPISÓW */
$("#recipeAdd").click(function(){
    $("#userRecipes").toggle();
});

$("#recipeAdd").click(function(){
    $("#addRecipeUserForm").toggle();
});

$("#recipeAdd").click(function(){
    $("#recipes").toggle();
});

$("#recipeAdd").click(function(){
    $("#recipeAdd").toggle();
});