<?php
    $conn = new mysqli("localhost", "root", "", "engima");
    $res = $conn>query("SELECT user_id FROM transaksi WHERE id_transaksi=".$_GET['id_transaksi'].";");  
    if ($res->fetch_assoc()['username'] != $_COOKIE['user']) {
        header('Location:history.php');
        die();
    }
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
		<h2 id="movie-name">
			<img src="buy-ticket_img_chevron-left.svg">
			The Avengers
		</h2>
		<div id="user-review-container">
            <form name="reviewform" action="#" method="POST">
                <div class="user-review-column">
                    <div class="form-label">
                        <h3>Add Rating</h3>
                    </div>
                    <div class="form">
                        <div class="rating">
                            <input type="radio" id="star10" name="rate" value="10" />
                            <label for="star10" title="10 stars"></label>
                            <input type="radio" id="star9" name="rate" value="9" />
                            <label for="star9" title="9 stars"></label>
                            <input type="radio" id="star8" name="rate" value="8" />
                            <label for="star8" title="8 stars"></label>
                            <input type="radio" id="star7" name="rate" value="7" />
                            <label for="star7" title="7 stars"></label>
                            <input type="radio" id="star6" name="rate" value="6" />
                            <label for="star6" title="6 stars"></label>
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="5 stars"></label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="4 stars"></label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="3 stars"></label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="2 stars"></label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="1 star"></label>
                        </div>
                    </div>
                </div>
                <div class="user-review-column">
                    <div class="form-label">
                        <h3>Add Review</h3>
                    </div>
                    <div class="form">
                        <textarea id="review" type="text"></textarea>
                        <input type="submit" name="submit" id="submit" required>
                        <button href="/../film/index.php" id="cancel">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
	</div>
</body>
</html>
