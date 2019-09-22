<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div id="header">
		<div id="navbar">
			<h1><span style="color: #12abce">Engi</span>ma</h1>
			<form style="padding-left: 10px; padding: 2px; border-radius: 5px; border: 2px solid #f0f0f0; height: 25px;">
				<input style="border: none; height: 100%;" type="text" placeholder="Search movie">
				<button style="background: none; border: none;">
					<img width="12px" height="12px" src="img/search-icon.svg">
				</button>
			</form>
			Transaction
			<div style="float: right">Logout</div>
		</div>
	</div>
	<div id="content">
		<h2>Showing search result for keyword "Captain"</h2>
		<h4 style="color : #626262">54 result available</h4>
		<div style="display: flex; border-bottom: 1px #a7a7a7 solid; padding: 15px 0px;">
			<div style="width: 17.5%;">
				<img style="border-radius: 5px" width="110px" height="150px;" src="img/captain-marvel.jpg">
			</div>
			<div style="width: 57.5%;">
				<h3 style="margin: 5px 0px;">Captain Marvel</h3>
				<div>
					<img style="float: left; margin-right: 5px;" width="15px" height="15px" src="img/star-icon.svg">
					<p style="color: #7e7e7e">4.75</p>
				</div>
				<p style="color: #7e7e7e; margin: 5px 0px;">Captain Marvel is an extraterrestrial Kree warrior who finds herself caught in the middle of an intergalactic battle between her people and the Skrulls. Living on Earth in 1995, she keeps having recurring memories of another life as U.S. Air Force pilot Carol Danvers.</p>
			</div>
			<div style="width: 25%; position: relative;">
				<a style="position: absolute; right: 0px; bottom: 0px;"><p>View Details <img src="img/detail-icon.png" width="14px" height="14px"></p></a>
			</div>
		</div>
		<div style="display: flex; border-bottom: 1px #a7a7a7 solid; padding: 15px 0px;">
			<div style="width: 17.5%;">
				<img style="border-radius: 5px" width="110px" height="150px;" src="img/captain-marvel.jpg">
			</div>
			<div style="width: 57.5%;">
				<h3 style="margin: 5px 0px;">Captain Marvel</h3>
				<div>
					<img style="float: left; margin-right: 5px;" width="15px" height="15px" src="img/star-icon.svg">
					<p style="color: #7e7e7e">4.75</p>
				</div>
				<p style="color: #7e7e7e; margin: 5px 0px;">Captain Marvel is an extraterrestrial Kree warrior who finds herself caught in the middle of an intergalactic battle between her people and the Skrulls. Living on Earth in 1995, she keeps having recurring memories of another life as U.S. Air Force pilot Carol Danvers.</p>
			</div>
			<div style="width: 25%; position: relative;">
				<a style="position: absolute; right: 0px; bottom: 0px;"><p>View Details<img src="img/detail-icon.png" width="12px" height="12px"></p></a>
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
	h1 {
		font-size: 16px;
		margin: 12px;
	}
	p {
		font-size: 14px;
	}
	#header {
		background-color: #ffffff;
		display: flex;
		width: 100%;
	}
	#content {
		background-color: #ffffff;
		padding: 50px;
		width: 60%;
		height: 100%;
		margin: auto;
	}
	#pagination {
		padding: 20px;
		text-align: center;
	}

	#pagination a {
	    padding: 5px 7px;
	    margin: 5px;
	}

	#pagination .inactive {
		color: #a7a7a7;
	}

	#pagination .number.inactive {
		border: 1px solid #a7a7a7;
	}

	#pagination .active {
		color: #00c1e7;
	}

	#pagination .number.active {
		border: 1px solid #00c1e7;
	}

	#navbar {
		width: 60%;
		margin: auto;
		display: flex;
		padding: 15px 50px;
	}
	.movie td {
		border-bottom: 1px solid #d2d2d2;
	}

	.cover-thumbnail {
		width: 120px; 
	}

	@media only screen and (max-width: 600px) {
		#content {
			padding: 10px;
			color: red;
		}
		.movie td {
		    display: block;
		    width: 99.9% !important;
		    clear: both;
		}
		.cover-thumbnail {
			text-align: center;
		}
	}
</style>
</html>