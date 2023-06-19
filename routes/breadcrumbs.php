<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Inicio', route('home'));
});

// login
Breadcrumbs::for('login', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Login', route('login'));
});

// usuarios
Breadcrumbs::for('usuarios.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Usuarios', route('usuarios.index'));
});
Breadcrumbs::for('usuarios.create', function (BreadcrumbTrail $trail) {
    $trail->parent('usuarios.index');
    $trail->push('Nuevo', route('usuarios.create'));
});
Breadcrumbs::for('usuarios.edit', function (BreadcrumbTrail $trail,$user) {
    $trail->parent('usuarios.index');
    $trail->push('Editar', route('usuarios.edit',$user->id));
});

// tipos

Breadcrumbs::for('tipos.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Tipos', route('tipos.index'));
});
Breadcrumbs::for('tipos.create', function (BreadcrumbTrail $trail) {
    $trail->parent('tipos.index');
    $trail->push('Nuevo', route('tipos.create'));
});
Breadcrumbs::for('tipos.edit', function (BreadcrumbTrail $trail,$user) {
    $trail->parent('tipos.index');
    $trail->push('Editar', route('tipos.edit',$user->id));
});

// ubicaciones
Breadcrumbs::for('ubicaciones.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Ubicaciones', route('ubicaciones.index'));
});
Breadcrumbs::for('ubicaciones.create', function (BreadcrumbTrail $trail) {
    $trail->parent('ubicaciones.index');
    $trail->push('Nuevo', route('ubicaciones.create'));
});
Breadcrumbs::for('ubicaciones.edit', function (BreadcrumbTrail $trail,$user) {
    $trail->parent('ubicaciones.index');
    $trail->push('Editar', route('ubicaciones.edit',$user->id));
});

// registros
Breadcrumbs::for('registro.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Registro', route('registro.index'));
});
Breadcrumbs::for('registro.create', function (BreadcrumbTrail $trail) {
    $trail->parent('registro.index');
    $trail->push('Nuevo', route('registro.create'));
});
Breadcrumbs::for('registro.edit', function (BreadcrumbTrail $trail,$user) {
    $trail->parent('registro.index');
    $trail->push('Editar', route('registro.edit',$user->id));
});