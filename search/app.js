var urlParams = new URLSearchParams(window.location.search);
let keyword_header = document.getElementById("keyword");
let resultContainer = document.getElementById("content");
let keyword = urlParams.get('judul');
let page = urlParams.get('page');
keyword_header.innerHTML += '"'+keyword+'"';

var xhttp = new XMLHttpRequest();

function displayMovieDetail(movie){
	let detailDiv = document.createElement("div");
	detailDiv.classList.add("movie-detail");
	let detailParagraph = document.createElement("p");
	let detailAnchor = document.createElement("a");
	detailAnchor.innerHTML = "View Details";
	detailAnchor.setAttribute("href","film/detail?id"+movie["id"]);
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
	let movieDetail = displayMovieDetail(movie);
	movieContainer.appendChild(movieDetail);
	resultContainer.appendChild(movieContainer);
}

function createActiveElementPagination(nomor){
	let page = document.createElement("a");
	page.classList.add("active");
	if(typeof(nomor) == "number"){
		page.classList.add("number");
		page.setAttribute("href","search?judul="+keyword+"&page="+nomor);
	} else {
		if(nomor == "back"){
			page.setAttribute("href","search?judul="+keyword+"&page="+page-1);
		} else {
			page.setAttribute("href","search?judul="+keyword+"&page="+page+1);
		}
	}
	page.innerText = nomor;
	return page;
}

function createInActiveElementPagination(nomor){
	let page = document.createElement("a");
	page.classList.add("inactive");
	if(typeof(nomor) == "number"){
		page.classList.add("number");
	}
	page.innerText = nomor;
	return page;
}

function addPagination(totalMovie,page){
	let divPagination = document.createElement("div");
	divPagination.setAttribute("id","pagination");
	if(page == 1){
		let back = createInActiveElementPagination("back");
		divPagination.appendChild(back);
	} else {
		let back = createActiveElementPagination("back");
		divPagination.appendChild(back);
	}
	let totalMaximalPage = totalMovie / 5;
	for(let iteratePage = 1;iteratePage <= totalMaximalPage;iteratePage++){
		if(iteratePage == page){
			let pageElement = createInActiveElementPagination(iteratePage);
			divPagination.appendChild(pageElement);
		} else {
			let pageElement = createActiveElementPagination(iteratePage);
			divPagination.appendChild(pageElement);
		}
	}
	if(page == totalMaximalPage){
		let next = createInActiveElementPagination("next");
		divPagination.appendChild(next);
	} else {
		let next = createActiveElementPagination("next");
		divPagination.appendChild(next);
	}
	resultContainer.appendChild(divPagination);
}

xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
       movies = JSON.parse(xhttp.responseText);
       totalMovie = movies["data"]["jumlah_film"];
       document.getElementById("found").innerHTML = totalMovie + " result available";
       totalMovieInThisPage = movies["data"]["film"].length;
       for(let index = 0;index < totalMovieInThisPage;index++){
       		displayElementMovie(movies["data"]["film"][index]);
       }
       addPagination(totalMovie,page);
    }
};
xhttp.open("GET", "api/v1/film?judul="+keyword+"&page="+page, true);
xhttp.send();