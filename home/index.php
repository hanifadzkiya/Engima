<?php
    require_once("../Cookie.php");

    cekCookieOther();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home - Engima</title>
        <link rel="stylesheet" type="text/css" href="css/index_style.css">
    </head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <body>
    <div class="nav">
        <div class="nav_content">
            <div class="engi"><a href="../home"><b>Engi</b>ma</a></div>
            <div class="search-container">
                <form action="../search?keyword="+keyworc><!--GANTI NANTI-->
                    <input type="text" placeholder="Search Movie" name="keyword">
                    <button type="submit"><img id="search-icon" src="search/img/search-icon.svg"></button>
                </form>
            </div>
            <div class="link">
                <a href="../logout">Logout</a>
                <a href="../transaction">Transactions</a>
            </div>
        </div>
    </div>
        <div class="content">
            <div class="head">
                <h1>Hello, <div id="name" class="name"></div></h1> 
                <br>
                <p>Now Playing</p>
            </div>
    
            <div id="movie_list">
            </div>

            <script type="text/javascript" src="home.js"></script>
        </div>
        
    </body>
</html>