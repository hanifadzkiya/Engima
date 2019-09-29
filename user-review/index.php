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
	<div id="content">
		<h2 id="movie-name">
			<img src="../images/chevron-left.svg"  onclick="back()">
			
		</h2>
		<div id="user-review-container">
			<div class="user-review-column">
				<div class="form-label">
					<h3>Add Rating</h3>
				</div>
				<div class="form">
					  <div class="rating">
					    <input type="radio" id="star10" name="rate" value="10" />
					    <label for="star10" title="text">10 stars</label>
					    <input type="radio" id="star9" name="rate" value="9" />
					    <label for="star9" title="text">9 stars</label>
					    <input type="radio" id="star8" name="rate" value="8" />
					    <label for="star8" title="text">8 stars</label>
					    <input type="radio" id="star7" name="rate" value="7" />
					    <label for="star7" title="text">7 stars</label>
					    <input type="radio" id="star6" name="rate" value="6" />
					    <label for="star6" title="text">6 star</label>
					    <input type="radio" id="star5" name="rate" value="5" />
					    <label for="star5" title="text">5 stars</label>
					    <input type="radio" id="star4" name="rate" value="4" />
					    <label for="star4" title="text">4 stars</label>
					    <input type="radio" id="star3" name="rate" value="3" />
					    <label for="star3" title="text">3 stars</label>
					    <input type="radio" id="star2" name="rate" value="2" />
					    <label for="star2" title="text">2 stars</label>
					    <input type="radio" id="star1" name="rate" value="1" />
					    <label for="star1" title="text">1 star</label>
					  </div>
				</div>
			</div>
			<div class="user-review-column">
				<div class="form-label">
					<h3>Add Review</h3>
				</div>
				<div class="form">
					<textarea id="review" type="text"></textarea>
					<button id="submit" onclick="submit()">Submit</button>
					<button id="cancel">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="app.js"></script>
</body>
</html>