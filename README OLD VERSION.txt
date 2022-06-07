HOW TO RUN THE PROGRAM?

1. Open terminal and type cd blogproject. 
3. Then, type cp .env.example .env in teriminal.
3. Go to phpmyadmin, add a new database.
4. After create the database , go to env file and change the DB_DATABASE name according to     the database that created just now.
5. In terminal, type npm install(if got other information,just ignore), then type npm run      dev
6. Type composer update --no-scripts 
6. In terminal again, type php artisan migrate.
7. In teriminal, type php artisan key:generate
8. Start the server with typing php artisan serv
9. After started the server, you can only asset the backed, frontend will have error. The    way to solve it is go to the route eg: localhost:8000/admin/dashboard(backend), in the    navigation bar, find Settings, then set the data. (don't forget click the submit button)
10. In your editor, go to app->Providers->AppServiceProvider.php (shortcut -> CTRL+p for        searching)
    In the public function boot(), put these codes inside the method

  $setting=\App\Models\Setting::first();
        Paginator::defaultView('my-paginate');
        View::share('recent_posts',\App\Models\Post::orderBy('id','desc')->limit($setting->recent_limit)->get());
        View::share('popular_posts',\App\Models\Post::orderBy('views','desc')->limit($setting->popular_limit)->get());

--------Dove everything now! You can access backend and frontend with no error!!!-------- 