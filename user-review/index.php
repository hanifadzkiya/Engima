<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="user-review/style.css">
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
			<img src="buy-ticket/img/chevron-left.svg">
			The Avengers
		</h2>
		<div id="user-review-container">
			<div class="user-review-column">
				<div class="form-label">
					<h3>Add Rating</h3>
				</div>
				<div class="form">
					  <div class="rating">
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
					<button id="submit">Submit</button>
					<button id="cancel">Cancel</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>