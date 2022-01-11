<?php

use App\Models\Author;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::macro('resource', function (string $name, string $title) {
    // Home > Blog
    Breadcrumbs::for("{$name}.index", function (BreadcrumbTrail $trail) use ($name, $title) {
        $trail->parent('home');
        $trail->push($title, route("{$name}.index"));
    });

    // Home > Blog > Create
    Breadcrumbs::for("{$name}.create", function (BreadcrumbTrail $trail) use ($name, $title) {
        $trail->parent("{$name}.index");
        $trail->push('Create', route("{$name}.create"));
    });

    // Home > Blog > Post 123
    Breadcrumbs::for("{$name}.show", function (BreadcrumbTrail $trail, Author $model) use ($name) {
        $trail->parent("{$name}.index");
        $trail->push($model->name . ' ' . $model->surname, route("{$name}.show", $model));
    });

    // Home > Blog > Edit Post 123
    Breadcrumbs::for("{$name}.edit", function (BreadcrumbTrail $trail, Author $model) use ($name) {
        $trail->parent("{$name}.index", $model);
        $trail->push('Edit ' . $model->name . ' ' . $model->surname, route("{$name}.edit", $model));
    });
});

Breadcrumbs::resource('authors', 'Authors');
