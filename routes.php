<?php

use App\Home;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::get('/', [Home::class, 'home']);

SimpleRouter::get('/faq', [Home::class, 'faq']);

SimpleRouter::post('/login', [Home::class, 'login']);

SimpleRouter::get('/recipes', [Home::class, 'recipeList']);

SimpleRouter::get('/product/{id}', [Home::class, 'productById']);
