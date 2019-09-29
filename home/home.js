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

xmlhttp.open("GET","../api/v1/home/home.php",true);
xmlhttp.send();

