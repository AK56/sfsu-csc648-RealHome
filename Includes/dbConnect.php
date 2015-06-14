<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define("ROOT_PATH", "/home/f14g21/public_html" . "/");
define("BASE_URL", "/");
define("DB_HOST", "localhost");
define("DB_NAME", "student_f14g21");
define("DB_PORT", "8889"); // default: 3306
define("DB_USER", "f14g21");
define("DB_PASS", "21mgrs2014");

     try {
	$db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME .";port=" . DB_PORT,DB_USER,DB_PASS);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
	echo "Could not connect to the database. function get_entries_seach 1";
	exit;

    } 

