<!DOCTYPE html>
<html>
    <head>
        <?php 
            if(!isset($_COOKIE['username']) || !isset($_COOKIE['password'])){
                header("Location: login.php");
            }
        ?>
        <title>Home - Engima</title>
        <link rel="stylesheet" type="text/css" href="css/index_style.css">
    </head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <body>
        <div class="nav">
            <div class="nav_content">
                <div class="engi"><b>Engi</b>ma</div>
                <div class="search-container">
                    <form action="/search"><!--GANTI NANTI-->
                        <input type="text" placeholder="Search Movie" name="search">
                        <button type="submit"><img id="search-icon" src="images/search-icon.svg"></button>
                    </form>
                </div>
                <div class="link">
                    <a href="#">Logout</a>
                    <a href="#">Transactions</a>
                </div>
            </div>
            
        </div>
        <div class="content">
            <div class="head">
                <h1>Hello, <div class="name"><?php echo $_COOKIE['username'] ?></div></h1> 
                <br>
                <p>Now Playing</p>
            </div>
    
            <div id="movie_list">
            </div>

            <script type="text/javascript" src="home.js"></script>
        </div>
        
    </body>
</html>