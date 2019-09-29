<?php
require_once("../Cookie.php");

cekCookieOther();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="nav">
        <div class="nav_content">
            <div class="engi"><b>Engi</b>ma</div>
            <div class="search-container">
                <form action="/search?"+search><!--GANTI NANTI-->
                    <input type="text" placeholder="Search Movie" name="keyword">
                    <button type="submit"><img id="search-icon" src="search/img/search-icon.svg"></button>
                </form>
            </div>
            <div class="link">
                <a href="#">Logout</a>
                <a href="#">Transactions</a>
            </div>
        </div>
    </div>
	<div id="content">
        
	</div>
	<script type="text/javascript" src="app.js"></script>
</body>
</html>