<?php
class Manager{
	function databaseConnect(){
	$host_name = 'localhost';
	$database = 'blog_alaska';
	$user_name = 'root';
	$password = '';
	$db = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
	return $db;
	}
}
