## Execute the project
php artisan serve

## Migrations
php artisan migrate -> first time
php artisan migrate:fresh -> drop & migrate from scratch

## Tinker
Use Tinker to create a new db record by using an Eloquent model (Active Record Pattern)

php artisan tinker

For example lets create a user:

1. $user = new App\Models\User;
2. $user->name = 'Test';
3. $user->password = bcrypt('!password');
4. $user->save();