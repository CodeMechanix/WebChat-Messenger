<?php
	include_once "classes/chatbox.php";
	include_once "lib/Database.php";

	$chtbox = new chatbox();
	$getData = $chtbox->getAllData();

	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		if ($getData)
		{
			$d = "";

			while ($data = $getData->fetch_assoc())
			{
				$d .= "<li><span>". $data['time']."</span> - <b>". $data['name'] ." "."</b>".$data['body']."</li>";
			}
		}
		echo $d;
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$chatboxdata = $chtbox->insertData($_POST);
		echo "success";
	}
?>