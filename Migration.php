<?php
    require_once __DIR__ .'/Model/Engima.php';
    require_once __DIR__ .'/Model/User.php';
    require_once __DIR__ .'/Model/Film.php';
    require_once __DIR__ .'/Model/Review.php';
    require_once __DIR__ .'/Model/Jadwal.php';
    require_once __DIR__ .'/Model/Kursi.php';
    require_once __DIR__ .'/Model/Genre.php';
    require_once __DIR__ .'/Model/FilmGenre.php';
    require_once __DIR__ .'/Model/AccessToken.php';
    
    print("--create database engima--\n");
    $engima = new Engima();
    $engima->connect();
    $engima->create();
    print("--create table user--\n");
    $user = new User();
    $user->createTable();
    print("--create table film--\n");
    $film = new Film();
    $film->createTable();
    print("--create table review--\n");
    $review = new Review();
    $review->createTable();
    print("--create table jadwal--\n");
    $jadwal = new Jadwal();
    $jadwal->createTable();
    print("--create table kursi--\n");
    $kursi = new Kursi();
    $kursi->createTable();
    print("--create table genre--\n");
    $genre = new Genre();
    $genre->createTable();
    print("--create table film_genre--\n");
    $film_genre = new FilmGenre();
    $film_genre->createTable();
    print("--create table access_token__\n");
    $access_token = new AccessToken();
    $access_token->createTable();
?>