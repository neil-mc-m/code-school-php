const searchForm = document.getElementById('search-input');
const searchResults = document.getElementById('search-results');

/**
 * @listens onkeyup
 */
searchForm.addEventListener('keyup', function(event) {
    event.preventDefault();
    searchResults.innerHTML = '';
    // let formData = new FormData(this);
    let searchTerm = this.value;
    search(searchTerm).then(function(recipes) {
        recipes.forEach(function(recipe) {
            createRecipeList(recipe);
        })
    });
})

/**
 * @param {string} searchTerm
 * @return Promise
 * @async
 */
async function search(searchTerm) {
    let response = await fetch(`http://localhost:8888/api/v1/search.php?q=${searchTerm}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        }
    });
    return await response.json();
}

/**
 * @param {Object} recipe
 */
function createRecipeList(recipe) {
    let listItem = document.createElement('li');
    let recipeName = document.createElement('a');
    recipeName.setAttribute('class', 'link-main');
    recipeName.setAttribute('href', `ingredients.php?id=${recipe.id}`);
    let newContent = document.createTextNode(recipe.name);
    recipeName.appendChild(newContent);
    listItem.appendChild(recipeName);
    searchResults.insertAdjacentElement("afterbegin", listItem);
}