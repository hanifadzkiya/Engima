let urlParams = new URLSearchParams(window.location.search);
let filmId = urlParams.get("film_id");

var xhttp = new XMLHttpRequest();

function displayNotFoundMessage(){
	let contentDiv = document.getElementById("content");
	let message = document.createElement("h3");
	message.innerHTML = "Not Found Page";
	contentDiv.appendChild(message);
}

function displayMovieDescription(movie){
	let contentDiv = document.getElementById("content");
	let movieContainer = document.createElement("div");
	movieContainer.classList.add("movie-container");
	let movieImageDiv = document.createElement("div");
	movieImageDiv.classList.add("movie-image");
	let movieImage = document.createElement("img");
	movieImage.classList.add("cover-movie");
	movieImage.setAttribute("src","img/bean.jpg");
	movieImageDiv.appendChild(movieImage);
	movieContainer.appendChild(movieImageDiv);
	let descriptionDiv = document.createElement("div");
	descriptionDiv.classList.add("movie-description");
	let movieTitle = document.createElement("h3");
	movieTitle.innerHTML = movie["judul"];
	descriptionDiv.appendChild(movieTitle);
	let movieGenre = document.createElement("p");
	movieGenre.innerText = movie["durasi_tayang"];
	movieGenre.setAttribute("id","movie-genre");
	descriptionDiv.appendChild(movieGenre);
	let releaseDate = document.createElement("p");
	releaseDate.setAttribute("id","release-date");
	releaseDate.innerHTML = movie["tanggal_rilis"];
	descriptionDiv.appendChild(releaseDate);
	let ratingDiv = document.createElement("div");
	let star = document.createElement("img");
	star.classList.add("star-icon");
	star.setAttribute("src","img/star-icon.svg");
	ratingDiv.appendChild(star);
	let rating = document.createElement("p");
	rating.classList.add("rating");
	rating.innerHTML = movie["rating"] + " / 10";
	ratingDiv.appendChild(rating);
	descriptionDiv.appendChild(ratingDiv);
	let sinopsis = document.createElement("p");
	sinopsis.classList.add("movie-sinopsis");
	sinopsis.innerText = movie["sinopsis"];
	descriptionDiv.appendChild(sinopsis);
	movieContainer.appendChild(descriptionDiv);
	contentDiv.appendChild(movieContainer);
}

function displayMovieDetail(movie){
	displayMovieDescription(movie);
}

function getSchedule(movie){
	let xhttpGenre = XMLHttpRequest();
	xhttpGenre.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	       let response = JSON.parse(xhttp.responseText);
	       if(response["message"] == "Film not found"){
	       		displayNotFoundMessage();
	       } else {
	       		displayMovieDetail(response["data"]);
	       		getSchedule(movie);
	       }
	    }
	};
	xhttpGenre.open("GET", "../api/v1/film/detail?id="+filmId, true);
	xhttpGenre.send();
}

xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       let response = JSON.parse(xhttp.responseText);
       if(response["message"] == "Film not found"){
       		displayNotFoundMessage();
       } else {
       		displayMovieDetail(response["data"]);
       		getSchedule(movie);
       }
    }
};
xhttp.open("GET", "../api/v1/film/detail?id="+filmId, true);
xhttp.send();