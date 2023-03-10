<?php

function createNavbarLinks($links)
{
    foreach ($links as $name => $href) {
        echo "<li><a href='".$href."'>$name</a></li>";
    }
}