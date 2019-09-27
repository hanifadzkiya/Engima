<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
			<img width="50px" height="50px" src="images/right-icon.png">
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
	<script type="text/javascript" src="app.js"></script>
</body>
<style type="text/css">
	@import url('https://fonts.googleapis.com/css?family=Lato&display=swap');
	html{
		height: 100%;
	}
	body {
		background-color: #262626;
		margin: 0px;
		height:100%;
		font-family: 'Lato', sans-serif;
	}
	p {
		font-size: 12px;
	}
	#content {
		width: 67%;
		height: 100%;
		background-color: #ffffff;
		margin: auto;
		padding: 100px 5%;
	}
	#film {
		border-bottom: 1px solid #a7a7a7;
		margin-bottom: 20px;
	}
	#screen {
		text-align: center; 
		width: 100%; 
		background-color: #a2a2a2; 
		color: white;
		clear: both;
		padding: 5px 0px;
		border-radius: 5px;
		margin-top: 20px;
	}
	#buy-button {
	    background-color: #00e1ec;
	    color:white;
	    padding: 10px;
	    border: none;
	    border-radius: 5px;
	}

	#summary-title {
		margin-top: 0px; 
		color: #606060;
	}

	#seat-board {
		padding: 0px; 
		display: flex; 
		flex-wrap: wrap; 
		font-size: 12px;
	}

	ul{
	  list-style:none;
	  margin: 0px;
	}

	ul li{
	  float:left;
	  padding:1.37%;
	  border-bottom:1px solid #000;
	  border-right:1px solid #000;
	  margin: 0 1.37% 2% 1.37%;
	}

	.movie-summary {
		display: inline-block;
	}

	.movie-title {
		margin: 0px;
	}

	.full {
		color: #a7a7a7;
		border: 1px solid #a7a7a7;
		border-radius: 5px;
		width: 16px;
		height: 16px;
		text-align: center;
		background-color: #f0eeef;
	}

	.empty {
		color: #10bee1;
		border: 1px solid #10bee1;
		border-radius: 5px;
		width: 16px;
		height: 16px;
		text-align: center;
		background-color: #ffffff;
	}
	.row {
	  display: flex;
	}

	.seat {
		border-right: 1px solid #a7a7a7; 
		padding-right: 50px; 
	}
	.summary {
		margin-left: 50px;
	}

	.f-left {
		float: left;
	}

	.f-right {
		float: right;
	}

	/* Create two equal columns that sits next to each other */
	.column {
	  flex: 50%;
	  position: relative;
	}

/*NAVIGATION*/
.nav{
    overflow: hidden;
    position: fixed;
    top: 0;
    width: 100%;
    -webkit-box-shadow: 0px 5px 7px -2px rgba(33,33,33,0.15); 
    box-shadow: 0px 5px 7px -2px rgba(33,33,33,0.15);
    background-color: white;
    padding: 15px 0;
    z-index: 1;
}
.nav_content{
    width: 67%;
    margin: auto;
}
.engi {
    float: left;
    display: block;
    margin-right: 20px;
}
.engi b{
    color: #00C1EC;
}
.search-container{
    float: left;
    display: block;
    margin: 0 20px;
    border: 1px solid #c9c9c9;
    padding: 0 5px;
    border-radius: 5px;
    width: 22%;
    min-width:100px;
}
.search-container input{
    border: none;
    width: 80%;
    padding-left: 5px;
}
::placeholder{
    color: grey;
    font-size: 12px;
}
.search-container button{
    float: right;
    border: none;
    background-color: transparent;
    cursor: pointer;
    color: grey;
}
.link a {
    margin-left: 20px;
    font-size: 13px;
    text-decoration: none;
    color: #000000;
    font-weight: bold;
}
.link a:hover{
    color: #c9c9c9;
    -webkit-transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out;
    -ms-transition: all 0.5s ease-in-out;
    -o-transition: all 0.5s ease-in-out;
    transition: all 0.5s ease-in-out;
}


	@media only screen and (min-width: 800px) {
		#buy-button {
			position: absolute;
		    bottom: 0;
		    right: 0px;
		}
		/* Navbar */
		.engi {
			float: left;
		}
		.search-container {
			float: left;
		}
		.link a {
		    float: right;
		}
	}

	@media only screen and (max-width: 600px) {
		.row {
			display: block;
		}
		.column {
			border: none;
			padding: 0px;
			margin: 10px 0px;
		}
		#summary-title {
			text-align: center;
		}
		#textbox {
			height: 50px;
			width: 100%;
		}
		#buy-button {
			margin: auto;
		}	
		ul li{
		  float:left;
		  padding:0.525%;
		  border-bottom:1px solid #000;
		  border-right:1px solid #000;
		  margin: 0 0.525% 2% 0.525%;
		}
		/* Navbar */
		.search-container {
		    width: 100%;
		    padding: 0px;
		    margin: 10px 0px;
		}
		.link {
			text-align: center;
		}
	}
</style>
</html>