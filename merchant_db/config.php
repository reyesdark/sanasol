<?php
	
	$host = "localhost";
	$dbname = "san";
	$user = "root";
	$pass = "root";
	
	require("class.db.php");
	require("Paginator.class.php");
	$db = new db("mysql:host={$host};dbname={$dbname}", $user, $pass);  
	$db->setErrorCallbackFunction("print_r", "text");
	
	function refine_lvl($refine)
	{
		if($refine > 0)
		{
			return '+'.$refine;
		}
		else
		{
			return '-';
		}
	}
	
	function get_item_name($id)
	{
		global $db;
		if($id>255)
		{
			$item = $db->select("item_db","id='{$id}'", "", "name_japanese, slots");
			$slots = ($item[0]->slots > 0) ? "[{$item[0]->slots}]":""; 
			return $item[0]->name_japanese.$slots;
		}
		else
		{
			return "-";
		}
	}
?>