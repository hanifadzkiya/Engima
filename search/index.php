<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="search/style.css">
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
		<h2 id="keyword">Showing search result for keyword </h2>
		<h4 id="found"></h4>
		<div id="pagination">
			<a class="inactive">Back</a>
			<a class="inactive number">1</a>
			<a class="active number">2</a>
			<a class="active number">3</a>
			<a class="active">Next</a>
		</div>
	</div>
	<script type="text/javascript" src="search/app.js"></script>
</body>
</html>