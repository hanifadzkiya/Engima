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
		<div id="film">
			<img width="50px" height="50px" src="img/right-icon.png">
			<div class="movie-summary">
				<h2 id="movie-title">Avengers: Endgame</h2>
				<p><b>September 4, 2019 - 09.40 pm</b></p>
			</div>
		</div>
		<div class="row">
		  <div class="column seat">
				<ul id="seat-board">
					<li class="full"><b>1</b></li>
					<li class="empty">2</li>
					<li class="full">3</li>
					<li class="full">4</li>
					<li class="full">5</li>
					<li class="full">6</li>
					<li class="full">7</li>
					<li class="full">8</li>
					<li class="full">9</li>
					<li class="full">10</li>
					<li class="empty">11</li>
					<li class="empty">12</li>
					<li class="empty">13</li>
					<li class="empty">14</li>
					<li class="empty">15</li>
					<li class="empty">16</li>
					<li class="empty">17</li>
					<li class="empty">18</li>
					<li class="empty">19</li>
					<li class="empty">20</li>
					<li class="empty">21</li>
					<li class="empty">22</li>
					<li class="empty">23</li>
					<li class="empty">24</li>
					<li class="empty">25</li>
					<li class="empty">26</li>
					<li class="empty">27</li>
					<li class="empty">28</li>
					<li class="empty">29</li>
					<li class="empty">30</li>
				</ul>
				<div id="screen" >
					Screen
				</div>
		  </div>
		  <div class="column summary">
				<h3 id="summary-title">Booking Summary</h3>
				<p><b>Avengers: Endgame</b></p>
				<p>September 4, 2019 - 09.40 PM </p>
				<div id="textbox">
					<p class="f-left"><b>Seat #18</b></p>
					<p class="f-right"><b>Rp 45000</b></p>
				</div>
				<button id="buy-button">Buy Ticket</button>
		  </div>
		</div>
	</div>
</body>
</html>