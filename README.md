# profile

## Platform

In this project, I use platform laragon (https://laragon.org/docs/install.html).

Here, clone the project in C:\laragon\www;

### Installing

```
git clone https://github.com/syafina182/profile.git
cd profile
```

This package ships with a **.env.example** file in the root of the project.

You must rename this file to just **.env**

**Note:** Make sure you have hidden files shown on your system.

Laravel project dependencies are managed through the [PHP Composer tool](http://getcomposer.org/). The first step is to install the depencencies by navigating into your project in terminal and typing this command:

```
composer install
```

In order to install the Javascript packages for frontend development, you will need the [Node Package Manager](https://www.npmjs.com/), and optionally the [Yarn Package Manager](https://code.facebook.com/posts/1840075619545360) by Facebook (Recommended)

If you only have NPM installed you have to run this command from the root of the project:

```
npm install
```

If you have Yarn installed, run this instead from the root of the project:

```
yarn
```

You must create your database on your server and on your **.env** file update the following lines:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=profile
DB_USERNAME=root
DB_PASSWORD=root

```

Change these lines to reflect your new database settings.

It's time to see if your database credentials are correct.

We are going to run the built in migrations to create the database tables:

```
php artisan migrate
```

You should see a message for each table migrated, if you don't and see errors, than your credentials are most likely not correct.

You can delete the other dummy users, but do not delete the administrator account or you will not be able to access the backend.

Now seed the database with:

```
php artisan db:seed
```

You should get a message for each file seeded, you should see the information in your database tables.

After your project is installed you must run this command to link your public storage folder for user avatar uploads:

```
php artisan storage:link
```


### Run localhost

Open laragon Dashboard:

 - Start Laragon

 - click Menu->www->choose profile.

### Credential

- Username = admin@admin.com
- Password  =  secret