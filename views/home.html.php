<main class="container flex-shrink-0">
    <?php while ($recipe = $this->recipes->fetch_assoc()) {
        echo "<h1>" . $recipe['name'] . "</h1>";
        echo "<p>" . $recipe['directions'] . "</p>";
    } ?>
</main>
