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
		<h2>Showing search result for keyword "Captain"</h2>
		<h4 style="color : #626262">54 result available</h4>
		<div class="movie-container">
			<div class="movie-image">
				<img style="border-radius: 5px" width="110px" height="150px;" src="img/captain-marvel.jpg">
			</div>
			<div class="movie-description">
				<h3>Captain Marvel</h3>
				<div>
					<img style="float: left; margin-right: 5px;" width="15px" height="15px" src="img/star-icon.svg">
					<p style="color: #7e7e7e">4.75</p>
				</div>
				<p style="color: #7e7e7e; margin: 5px 0px;">Captain Marvel is an extraterrestrial Kree warrior who finds herself caught in the middle of an intergalactic battle between her people and the Skrulls. Living on Earth in 1995, she keeps having recurring memories of another life as U.S. Air Force pilot Carol Danvers.</p>
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
<style type="text/css">
	@import url('https://fonts.googleapis.com/css?family=Lato&display=swap');
	html{
		height: 100%;
	}
	body {
		background-color: #262626;
		margin: 0px;
		font-family: 'Lato', sans-serif;
	}
	h1 {
		font-size: 16px;
		margin: 12px;
	}
	p {
		font-size: 14px;
	}
	#content {
		background-color: #ffffff;
		padding: 5%;
		width: 67%;
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
	.movie td {
		border-bottom: 1px solid #d2d2d2;
	}

	.cover-thumbnail {
		width: 120px; 
	}

	.movie-container {
		display: flex; 
		border-bottom: 1px #a7a7a7 solid; 
		padding: 15px 0px;
	}
	.movie-image {
		width: 17.5%;
	}
	.movie-description {
		width: 57.5%;
	}
	.movie-detail {
		width: 25%; 
		position: relative;
	}
	.movie-detail h3 {
		margin: 5px 0px;
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
	@media only screen and (max-width: 600px) {
		#content {
			padding: 100px 10px 100px 10px;
			color: red;
			width: 80%;
		}
		.movie td {
		    display: block;
		    width: 99.9% !important;
		    clear: both;
		}
		.cover-thumbnail {
			text-align: center;
		}
		.movie-container {
			display: block;
		}
		.movie-image {
			width: 100%;
			text-align: center;
		}
		.movie-description {
			width: 100%;
		}
		.movie-detail {
			width: 100%;
			display: block;
		}
		.movie-description h3 {
			width: 100%;
			text-align: center;
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
	@media only screen and (min-width: 800px){
		.movie-detail a {
			position: absolute; 
			right: 0px; 
			bottom: 0px;
		}
		body {
			height:100%;
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
</style>
</html>