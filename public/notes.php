<?php

git steps:

# Step 1: Start from master and update it
git checkout master
git pull origin master  # Pull latest changes from GitHub

# Step 2: Create a new feature branch
git checkout -b feature/user-auth

# Step 3: Work on your feature, then add and commit changes
git add .
git commit -m "Add user authentication feature"

# Step 4: Push the feature branch to remote
git push origin feature/user-auth

# Step 5: Create a Pull Request (PR) on GitHub (or use GitHub CLI)
gh pr create --base master --head feature/user-auth --title "Add user authentication" --body "This PR adds user authentication."

# Step 6: Merge the PR via GitHub UI or CLI
gh pr merge --merge

# Step 7: Switch back to master and pull the latest changes
git checkout master
git pull origin master

# Step 8: Delete the feature branch locally and remotely
git branch -d feature/user-auth
git push origin --delete feature/user-auth


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
