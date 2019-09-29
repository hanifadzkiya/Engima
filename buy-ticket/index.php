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
                <form action="/action_page.php"><!--GANTI NANTI-->
                    <input type="text" placeholder="Search Movie" name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="link">
                <a href="#">Logout</a>
                <a href="#">Transactions</a>
            </div>
        </div>
    </div>
<div id="content">
		<div id="movie">
			<img id="back" src="img/chevron-left.svg" onclick="back()">
		</div>
		<div class="row">
		  <div class="column seat">
				<ul id="seat-board">
					
				</ul>
				<div id="screen" >
					Screen
				</div>
		  </div>
		  <div class="column summary">
				<h3 id="summary-title">Booking Summary</h3>
				<p id="not-select-message">You haven't selected any seat yeat. Please click on one of the seat provided.</p>
		  </div>
		</div>
	</div>
    <div class="modal">
        <div class="modal-content">
            <h2 id="payment-success">Payment Success</h2>
            <p>Thank you for purchasing! You can view your purchase now.</p>
            <div class="button"><a href="../transaction" id="history">Go To Transaction History</a></div>
        </div>
    </div>
	<script type="text/javascript" src="app.js"></script>
</body>
<style type="text/css">

</style>
</html>