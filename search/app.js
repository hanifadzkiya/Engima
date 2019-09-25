var urlParams = new URLSearchParams(window.location.search);
let keyword_header = document.getElementById("keyword");
let resultContainer = document.getElementById("content");
let keyword = urlParams.get('judul');
keyword_header.innerHTML += '"'+keyword+'"';

var xhttp = new XMLHttpRequest();

function displayMovieDetail(){
	let detailDiv = document.createElement("div");
	detailDiv.classList.add("movie-detail");
	let detailParagraph = document.createElement("p");
	let detailAnchor = document.createElement("a");
	detailAnchor.innerHTML = "View Details";
	let detailIcon = document.createElement("img");
	detailIcon.classList.add("detail-icon");
	detailIcon.src = "search/img/detail-icon.png";
	detailAnchor.appendChild(detailIcon);
	detailParagraph.appendChild(detailAnchor);
	detailDiv.appendChild(detailParagraph);
	return detailDiv;
}

function displayRating(rating){
	let ratingDiv = document.createElement("div");
	let starIcon = document.createElement("img");
	starIcon.classList.add("star-icon")
	starIcon.src = "search/img/star-icon.svg";
	let movieRating = document.createElement("p");
	movieRating.classList.add("rating");
	movieRating.innerText = rating;
	ratingDiv.appendChild(starIcon);
	ratingDiv.appendChild(movieRating);
	return ratingDiv;
}

function displayMovieDescription(title,rating,sinopsis){
	console.log(title);
	let descriptionDiv = document.createElement("div");
	descriptionDiv.classList.add("movie-description");
	let movieTitle = document.createElement("h3");
	movieTitle.innerText = title;
	let movieRating = displayRating(rating);
	let movieSinopsis = document.createElement("p");
	movieSinopsis.classList.add("movie-sinopsis");
	movieSinopsis.innerText = sinopsis;
	descriptionDiv.appendChild(movieTitle);
	descriptionDiv.appendChild(movieRating);
	descriptionDiv.appendChild(movieSinopsis); 
	return descriptionDiv;
}

function displayMovieImage(imageLocation){
	let imageDiv = document.createElement("div");
	imageDiv.classList.add("movie-image");
	let image = document.createElement("img");
	image.src = imageLocation;
	imageDiv.appendChild(image);
	return imageDiv;
}

function createMovieContainer(){
	let movieContainer = document.createElement("div");
	movieContainer.classList.add("movie-container");
	return movieContainer;
}

function displayElementMovie(movie){
	let movieContainer = createMovieContainer();
	let movieImage = displayMovieImage("search/img/captain-marvel.jpg");
	movieContainer.appendChild(movieImage);
	let movieDescription = displayMovieDescription(movie["judul"],movie["rating"],movie["sinopsis"]);
	movieContainer.appendChild(movieDescription);
	let movieDetail = displayMovieDetail();
	movieContainer.appendChild(movieDetail);
	resultContainer.appendChild(movieContainer);
}

xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
       movies = JSON.parse(xhttp.responseText);
       numberMovie = movies["data"].length;
       document.getElementById("found").innerHTML = numberMovie + " result available";
       for(let index = 0;index < numberMovie;index++){
       		displayElementMovie(movies["data"][index]);
       }
    }
};
xhttp.open("GET", "api/v1/film?judul="+keyword, true);
xhttp.send();