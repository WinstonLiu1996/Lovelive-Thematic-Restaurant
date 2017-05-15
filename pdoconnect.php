<?php

function dbconnect(){
	$dbh = new PDO('mysql:host=localhost:8889;dbname=Restaurant', 'root', 'root');
	$dbh->beginTransaction();

	return $dbh;
}

function dbcommit(PDO &$dbh){
	$dbh->commit();
	$dbh=Null;
}

function dberror(&$dbh, $e){
	print "Error!: " . $e->getMessage() . "<br/>";
	$dbh=Null;
	die();
}
?>