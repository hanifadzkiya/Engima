let resultContainer = document.getElementById("movie_list");

function displayMovieList(movie){
    let divContent = document.createElement("div");
    divContent.classList.add("movie");

    let posterContent = document.createElement("img");
    posterContent.classList.add("img");
    posterContent.src = "images/aang.jpg";

    let titleContent = document.createElement("p")
    titleContent.innerText = movie["judul"];

    let starContent = document.createElement("img");
    starContent.classList.add("star");
    starContent.src = "images/star-icon.svg";

    let ratingContent = document.createElement("p");
    ratingContent.innerText = movie["rating"];

    divContent.appendChild(posterContent);
    divContent.appendChild(titleContent);
    divContent.appendChild(starContent);
    divContent.appendChild(ratingContent);
    resultContainer.appendChild(divContent);   
}

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var movies = JSON.parse(this.responseText);
        totalMovie = movies["data"].length;
        for(let index = 0;index < totalMovie;index++){
            displayMovieList(movies["data"][index]);
        }
    }
};

function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}

xmlhttp.open("GET","../api/v1/home/home.php",true);
xmlhttp.send();


var xmlhttpUsername = new XMLHttpRequest();
xmlhttpUsername.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var movies = JSON.parse(this.responseText);
        var username = movies["data"]["name"];
        var nama = document.getElementById("name");
        nama.innerHTML = username;
    }
};

xmlhttpUsername.open("GET","../api/v1/user?id="+getCookie("user_id"),true);
xmlhttpUsername.send();

