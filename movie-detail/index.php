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
            <div class="engi"><a href="../home"><b>Engi</b>ma</a></div>
            <div class="search-container">
                <form action="../search?keyword="+keyworc><!--GANTI NANTI-->
                    <input type="text" placeholder="Search Movie" name="keyword">
                    <button type="submit"><img id="search-icon" src="img/search-icon.svg"></button>
                </form>
            </div>
            <div class="link">
                <a href="../logout">Logout</a>
                <a href="../transaction">Transactions</a>
            </div>
        </div>
    </div>
    <div id="content">
        <div id="movie-container">
        </div>
        <div class="schedules-reviews">
            <div class="schedules-movie">
                <div class="schedules">
                    <h3>Schedules</h3>
                    <table>
                        <thead>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Available Seats</th>
                        </thead>
                        <tbody id="table-body">
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="reviews-movie">
                <div id="reviews">
                    <h3>Reviews</h3>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="app.js"></script>
</body>
</html>