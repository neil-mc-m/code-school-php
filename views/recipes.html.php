
<div class="container">
    <h1>Recipe list</h1>
    <?php while ($recipe = $this->recipes->fetch_assoc()) {
        echo "<h1>" . $recipe['name'] . "</h1>";
        echo "<p>" . $recipe['directions'] . "</p>";
    } ?>
</div>

