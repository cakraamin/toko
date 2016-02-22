<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home',route('home'));
});

// Home > Tentang Kami
Breadcrumbs::register('kami', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Tentang Kami');
});

// Home > Testimoni
Breadcrumbs::register('testimoni', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Testimoni');
});

// Home > Testimoni
Breadcrumbs::register('konfirmasi', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Konfirmasi Pembayaran');
});

// Home > Brand > [Brand]
Breadcrumbs::register('brand', function($breadcrumbs, $brand)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($brand, route('home'));
});

// Home > Product
Breadcrumbs::register('product', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Product');
});

// Home > Blog > [Category] > [Page]
Breadcrumbs::register('page', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('category', $page->category);
    $breadcrumbs->push($page->title, route('page', $page->id));
});