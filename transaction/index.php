<?php
require_once "../Cookie.php";

cekCookieOther();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Transaction - Engima</title>
        <link rel="stylesheet" type="text/css" href="css/transaction_style.css">
    </head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <body>
    <div class="nav">
        <div class="nav_content">
            <div class="engi"><a href="../home"><b>Engi</b>ma</a></div>
            <div class="search-container">
                <form action="../search?keyword="+keyword><!--GANTI NANTI-->
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

        <div class="content">
            <h3>Transaction History</h3>
            <div id="transaction_list">
            </div>
            
            <script type="text/javascript" src="transaction.js" one="<?php echo $_COOKIE['user_id'] ?>"></script>
        </div>
    </body>
</html>