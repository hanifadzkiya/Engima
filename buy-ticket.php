<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div id="content">
		<div id="film">
			<img src="images/right-icon.png">
			<h2>Avengers: Endgame</h2>
			<h3>September 4, 2019 - 09.40 pm </h3>
		</div>
		<div class="row">
		  <div class="column" style="border-right: 1px solid #a7a7a7; padding-right: 50px; ">
				<ul style="padding: 0px; display: flex; flex-wrap: wrap; font-size: 12px;">
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
		  <div class="column" style="margin-left: 50px;">
				<h3 style="margin-top: 0px;">Booking Summary</h3>
				<p><b>Avengers: Endgame</b></p>
				<p>September 4, 2019 - 09.40 PM </p>
				<p><b>Seat #18</b></p>
				<button id="buy-button">Buy Ticket</button>
		  </div>
		</div>
	</div>
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
	#content {
		width: 75%;
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
		position: absolute;
	    bottom: 0;
	    right: 0px;
	    background-color: #00e1ec;
	    color:white;
	    padding: 10px;
	    border: none;
	    border-radius: 5px;
	}
	ul{
	  list-style:none;
	  margin: 0px;
	}

	ul li{
	  float:left;
	  padding:1.6%;
	  border-bottom:1px solid #000;
	  border-right:1px solid #000;
	  margin: 1.6%;
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

	/* Create two equal columns that sits next to each other */
	.column {
	  flex: 50%;
	  position: relative;
	}

	@media only screen and (max-width: 600px) {
	}
</style>
</html>