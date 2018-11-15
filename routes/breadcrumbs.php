<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Inicio
Breadcrumbs::for('administracion', function ($trail) {
    $trail->push('Administración', route('administrador.index'));
});

Breadcrumbs::for('marcas', function ($trail) {
    $trail->parent('administracion');
    $trail->push('Marcas', route('administrador.marca.index'));
});

Breadcrumbs::for('categorias', function ($trail) {
    $trail->parent('administracion');
    $trail->push('Categorias', route('administrador.categorias.index'));
});

Breadcrumbs::for('subcategorias', function ($trail) {
    $trail->parent('administracion');
    $trail->push('Sub-Categorias', route('administrador.subCategorias.index'));
});

Breadcrumbs::for('proveedores', function ($trail) {
    $trail->parent('administracion');
    $trail->push('Proveedores', route('administrador.proveedor.index'));
});

Breadcrumbs::for('proveedores-edit', function ($trail,$dato) {
    $trail->parent('proveedores');
    $trail->push($dato, route('administrador.proveedor.edit',$dato));
});

Breadcrumbs::for('proveedores-show', function ($trail,$dato) {
    $trail->parent('proveedores');
    $trail->push($dato, route('administrador.proveedor.show',$dato));
});

Breadcrumbs::for('productos', function ($trail) {
    $trail->parent('administracion');
    $trail->push('Productos', route('administrador.proveedor.index'));
});

Breadcrumbs::for('colores', function ($trail) {
    $trail->parent('administracion');
    $trail->push('Colores', route('administrador.colores.index'));
});

Breadcrumbs::for('configuracion', function ($trail) {
    $trail->parent('administracion');
    $trail->push('Configuración', route('administrador.datos.show'));
});

Breadcrumbs::for('usuarios', function ($trail) {
    $trail->parent('administracion');
    $trail->push('Usuarios', route('seguridad.user.index'));
});

Breadcrumbs::for('roles', function ($trail) {
    $trail->parent('administracion');
    $trail->push('Roles', route('seguridad.roles.index'));
});

Breadcrumbs::for('roles-show', function ($trail,$rol) {
    $trail->parent('roles');
    $trail->push($rol, route('seguridad.roles.show',$rol));
});

Breadcrumbs::for('roles-edit', function ($trail,$rol) {
    $trail->parent('roles');
    $trail->push($rol, route('seguridad.roles.edit',$rol));
});



Breadcrumbs::for('permisos', function ($trail) {
    $trail->parent('administracion');
    $trail->push('Permisos', route('seguridad.permisos.index'));
});

Breadcrumbs::for('proveedor', function ($trail) {
    $trail->push('Proveedor', route('proveedor.principal'));
});

Breadcrumbs::for('productos_proveedor', function ($trail) {
    $trail->parent('proveedor');
    $trail->push('Productos', route('proveedor.index'));
});

Breadcrumbs::for('configuracion_proveedor', function ($trail) {
    $trail->parent('proveedor');
    $trail->push('Configuración', route('proveedor.configuracion'));
});
/*
/*


// Inicio > Generos > [Genero]
Breadcrumbs::for('genre', function ($trail, $genre) {
    $trail->parent('genres');
    $trail->push($genre->name, route('genres.show', $genre));
});

// Inicio > Generos > [Genero] > [Pelicula]
Breadcrumbs::for('movie', function ($trail, $movie) {
    $trail->parent('genre', $movie->genre);
    $trail->push($movie->name, route('movies.show', $movie));
}); */