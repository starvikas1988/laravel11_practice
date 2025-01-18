<?php

1. Use toSql()
The toSql() method shows the raw SQL query generated, but it doesn’t include bindings (parameters). Modify the query to inspect the SQL:

Code:
php
Copy code
$query = User::has('address')->with('address');
dd($query->toSql());

Relationship:
1 one-one  users and addresses table .
 ---------------------------

Step 5: Apply Middleware to Specific Resource Methods
If you want to apply the middleware to specific methods in the resource, 

use the only or except methods:

Apply Middleware to Specific Methods:
php
Copy code

Route::resource('category', CategoryController::class)
    ->only(['create', 'edit', 'store', 'update', 'destroy'])
    ->middleware('checkRole');


    
Exclude Middleware for Specific Methods:
php
Copy code
Route::resource('category', CategoryController::class)
    ->except(['index', 'show'])
    ->middleware('checkRole');


Advanced: Grouping with Middleware
If you have multiple resource routes requiring the same middleware, use a route group:

php
Copy code
Route::middleware('checkRole')->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
});
