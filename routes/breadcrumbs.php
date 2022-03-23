<?php 
// routes/breadcrumbs.php
// melakukan routes untuk breadcrumbs
use App\Models\Pengguna;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dasbor', function ($trail) {
    $trail->push('Dasbor', route('dasbor'));
});

// penggunas
Breadcrumbs::for('pengguna.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dasbor');
    $trail->push('Pengguna', route('pengguna.index'));
});

// penggunas > Upload pengguna
Breadcrumbs::for('pengguna.create', function (BreadcrumbTrail $trail) {
    $trail->parent('pengguna.index');
    $trail->push('Tambah', route('pengguna.create'));
});

// penggunas > [pengguna Name]
Breadcrumbs::for('pengguna.show', function (BreadcrumbTrail $trail, Pengguna $pengguna) {
    $trail->parent('pengguna.index');
    $trail->push($pengguna->user_id, route('pengguna.show', $pengguna));
});

// penggunas > [pengguna Name] > Edit pengguna
Breadcrumbs::for('pengguna.edit', function (BreadcrumbTrail $trail, Pengguna $pengguna) {
    $trail->parent('pengguna.show', $pengguna);
    $trail->push('Edit', route('pengguna.edit', $pengguna));
});