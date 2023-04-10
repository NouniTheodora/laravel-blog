## Execute the project
php artisan serve

## Start MYSQL service
mysql.server start

## Migrations
php artisan migrate -> first time
php artisan migrate:fresh -> drop & migrate from scratch

php arisan make:migration create_posts_table --> create a new migration file

## Eloquent Models
php artisan make:model Article

## Tinker
Use Tinker to create a new db record by using an Eloquent model (Active Record Pattern)

php artisan tinker

For example lets create a user:

1. $user = new App\Models\User;
2. $user->name = 'Test';
3. $user->password = bcrypt('!password');
4. $user->save();