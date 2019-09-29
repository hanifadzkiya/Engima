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
		<h2>Showing search result for keyword "Captain"</h2>
		<h4>54 result available</h4>
		<div class="movie-container">
			<div class="movie-image">
				<img class="cover-movie" width="110px" height="150px;" src="img/captain-marvel.jpg">
			</div>
			<div class="movie-description">
				<h3>Captain Marvel</h3>
				<div>
					<img class="star-icon" width="15px" height="15px" src="img/star-icon.svg">
					<p class="rating">4.75</p>
				</div>
				<p class="movie-sinopsis">Captain Marvel is an extraterrestrial Kree warrior who finds herself caught in the middle of an intergalactic battle between her people and the Skrulls. Living on Earth in 1995, she keeps having recurring memories of another life as U.S. Air Force pilot Carol Danvers.</p>
			</div>
			<div class="movie-detail">
				<a><p>View Details <img src="img/detail-icon.png" width="14px" height="14px"></p></a>
			</div>
		</div>
		<div id="pagination">
			<a class="inactive">Back</a>
			<a class="inactive number">1</a>
			<a class="active number">2</a>
			<a class="active number">3</a>
			<a class="active">Next</a>
		</div>
	</div>
</body>
</html>