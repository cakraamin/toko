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
    $breadcrumbs->push('Konfirmasi');
});

// Home > Blog
Breadcrumbs::register('blog', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::register('category', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Page]
Breadcrumbs::register('page', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('category', $page->category);
    $breadcrumbs->push($page->title, route('page', $page->id));
});