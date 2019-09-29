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
    	<div class="movie-container">
			<div class="movie-image">
				<img class="cover-movie"src="img/bean.jpeg">
			</div>
			<div class="movie-description">
				<h3>Captain Marvel</h3>
				<p id="movie-genre">Drama, Fantasy, Adventure | 187 mins</p>
				<p id="release-date">Release date: April 17, 2019</p>
				<div>
					<img class="star-icon" src="img/star-icon.svg">
					<p class="rating">4.75 / 10</p>
				</div>
				<p class="movie-sinopsis">Captain Marvel is an extraterrestrial Kree warrior who finds herself caught in the middle of an intergalactic battle between her people and the Skrulls. Living on Earth in 1995, she keeps having recurring memories of another life as U.S. Air Force pilot Carol Danvers.</p>
			</div>
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
                        <tbody>
                            <tr>
                                <td>September 5, 2019</td>
                                <td>06.30 PM</td>
                                <td>10 seats</td>
                                <td class="not-available">Not Available</td>
                            </tr>
                            <tr>
                                <td>September 5, 2019</td>
                                <td>06.30 PM</td>
                                <td>10 seats</td>
                                <td class="available">Book Now</td>
                            </tr>
                            <tr>
                                <td>September 5, 2019</td>
                                <td>06.30 PM</td>
                                <td>10 seats</td>
                                <td class="not-available">Not Available</td>
                            </tr>
                            <tr>
                                <td>September 5, 2019</td>
                                <td>06.30 PM</td>
                                <td>10 seats</td>
                                <td class="available">Book Now</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="reviews-movie">
                <div>
                    <h3>Reviews</h3>
                    <div class="review">
                        <div class="profil-image">
                            <img src="img/jokowi.jpeg">
                        </div>
                        <div class="review-detail">
                            <p>Jokowi</p>
                            <img class="star-icon" width="10px" height="10px" src="img/star-icon.svg">
                            <p>8/10</p>
                            <p>Sangat menyenangkan menjadi presiden sembari menonton film. Seru.</p>
                        </div>
                    </div>
                    <div class="review">
                        <div class="profil-image">
                            <img src="img/jokowi.jpeg">
                        </div>
                        <div class="review-detail">
                            <p>Jokowi</p>
                            <img class="star-icon-2" width="10px" height="10px" src="img/star-icon.svg">
                            <p>8/10</p>
                            <p>Sangat menyenangkan menjadi presiden sembari menonton film. Seru.</p>
                        </div>
                    </div>
                    <div class="review">
                        <div class="profil-image">
                            <img src="img/jokowi.jpeg">
                        </div>
                        <div class="review-detail">
                            <p>Jokowi</p>
                            <img class="star-icon" width="10px" height="10px" src="img/star-icon.svg">
                            <p>8/10</p>
                            <p>Sangat menyenangkan menjadi presiden sembari menonton film. Seru.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="app.js"></script>
</body>
</html>