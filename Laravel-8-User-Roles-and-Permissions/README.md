## Laravel 8 User Roles and Permissions

## step 1: clone project from git
   git clone https://github.com/daduon/Laravel-8-User-Roles-and-Permissions.git
## step 2: update composer
    run => composer update
## step 3: generate table
    run => php artisan migrate
## step 4: insert all route name into table permission
    run => php artisan permission:create-permission-routes
## step 5: seeder default user
    run => php artisan db:seed --class=CreateAdminUserSeeder
## step 6: run project in local brawser 
    run => php artisan serve