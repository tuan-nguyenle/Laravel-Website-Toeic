<?php // routes/breadcrumbs.php

use App\Models\News;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
// Home
Breadcrumbs::for('Home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('ListNews', function (BreadcrumbTrail $trail) {
    $trail->parent('Home');
    $trail->push('News', route('news'));
});

Breadcrumbs::for('NewsDetail', function (BreadcrumbTrail $trail, News $news) {
    $trail->parent('ListNews');
    $trail->push($news->title, route('news', $news));
});
