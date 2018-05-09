<?php

$factory('Azure\User', [
    'name' => $faker->name,
    'email' => $faker->email,
    'password' => $faker->word,
]);


$factory('Azure\Post', [
    'user_id' => 'factory:Azure\User',
    'title' => $faker->sentence,
    'body' => $faker->paragraph,
]);