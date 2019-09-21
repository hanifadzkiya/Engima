<?php
	require_once __DIR__ .'/vendor/autoload.php';
	use Engima\Model\Engima;
	use Engima\Model\User;
	use Engima\Model\Film;
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
?>