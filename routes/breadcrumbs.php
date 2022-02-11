<?php

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::macro('resource', function (string $name, string $title) {
    Breadcrumbs::for("{$name}.index", function (BreadcrumbTrail $trail) use ($name, $title) {
        $trail->parent('home');
        $trail->push($title, route("{$name}.index"));
    });

    Breadcrumbs::for("{$name}.create", function (BreadcrumbTrail $trail) use ($name, $title) {
        $trail->parent("{$name}.index");
        $trail->push('Create', route("{$name}.create"));
    });

    if ($name == 'authors') {
        Breadcrumbs::for("{$name}.show", function (BreadcrumbTrail $trail, Author $model) use ($name) {
            $trail->parent("{$name}.index");
            $trail->push($model->name . ' ' . $model->surname, route("{$name}.show", $model));
        });

        Breadcrumbs::for("{$name}.edit", function (BreadcrumbTrail $trail, Author $model) use ($name) {
            $trail->parent("{$name}.index", $model);
            $trail->push('Edit ' . $model->name . ' ' . $model->surname, route("{$name}.edit", $model));
        });
    }

    if ($name == 'books') {
        Breadcrumbs::for("{$name}.show", function (BreadcrumbTrail $trail, Book $model) use ($name) {
            $trail->parent("{$name}.index");
            $trail->push($model->name, route("{$name}.show", $model));
        });

        Breadcrumbs::for("{$name}.edit", function (BreadcrumbTrail $trail, Book $model) use ($name) {
            $trail->parent("{$name}.index", $model);
            $trail->push('Edit ' . $model->name, route("{$name}.edit", $model));
        });
    }

    if ($name == 'genres') {
        Breadcrumbs::for("{$name}.show", function (BreadcrumbTrail $trail, Genre $model) use ($name) {
            $trail->parent("{$name}.index");
            $trail->push($model->name, route("{$name}.show", $model));
        });

        Breadcrumbs::for("{$name}.edit", function (BreadcrumbTrail $trail, Genre $model) use ($name) {
            $trail->parent("{$name}.index", $model);
            $trail->push('Edit ' . $model->name, route("{$name}.edit", $model));
        });
    }
});

Breadcrumbs::resource('authors', 'Authors');
Breadcrumbs::resource('books', 'Books');
Breadcrumbs::resource('genres', 'Genres');
