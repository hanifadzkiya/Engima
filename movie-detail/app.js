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
	let movieContainer = document.getElementById("movie-container");
	let movieImageDiv = document.createElement("div");
	movieImageDiv.classList.add("movie-image");
	let movieImage = document.createElement("img");
	movieImage.classList.add("cover-movie");
	movieImage.setAttribute("src","img/bean.jpeg");
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
}

function getDate(datetime){

}

function displayEachJadwal(jadwal,movie){
	let xhttpKursi = new XMLHttpRequest();
	xhttpKursi.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	    	let tableBody = document.getElementById("table-body");
	        let responseKursi = JSON.parse(xhttpKursi.responseText);
	        let tr = document.createElement("tr");
			let date = document.createElement("td");
			date.innerText = jadwal["tanggal"];
			console.log(jadwal["tanggal"]);
			tr.appendChild(date);
			let jam = document.createElement("td");
			jam.innerText = jadwal["jam"];
			tr.appendChild(jam);
			let empty = document.createElement("td");
			empty.innerText = 30 - responseKursi["data"]["terisi"];
			tr.appendChild(empty);
			if(responseKursi["data"]["terisi"] < 30){
				let available = document.createElement("td");
				available.innerText = "Book Now";
				available.classList = "available";
				tr.appendChild(available);
			} else {
				let available = document.createElement("td");
				available.innerText = "Not Available";
				available.classList = "not-available";
				tr.appendChild(available);
			}
			tableBody.appendChild(tr);
	    }
	};
	xhttpKursi.open("GET", "temp.php?jadwal_id="+jadwal["id"], true);
	xhttpKursi.send();	
}

function displayJadwal(jadwal,movie){
	for(let index = 0;index < jadwal.length;index++){
		displayEachJadwal(jadwal[index],movie);
	}
}

function displayEachReview(review){
	let xhttpUser = new XMLHttpRequest();
	xhttpUser.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	       let responseUser = JSON.parse(xhttpUser.responseText);
	       let reviewsDiv = document.getElementById("reviews");
	       let reviewDiv = document.createElement("div");
	       reviewDiv.classList.add("review");
	       let profilImageDiv = document.createElement("div");
	       profilImageDiv.classList.add("profil-image");
	       let profilImage = document.createElement("img");
	       profilImage.setAttribute("src","img/jokowi.jpeg");
	       profilImageDiv.appendChild(profilImage);
	       reviewDiv.appendChild(profilImageDiv);
	       let detailDiv = document.createElement("div");
	       detailDiv.classList.add("review-detail");
	       let username = document.createElement("p");
	       username.innerText = responseUser["data"]["username"];
	       detailDiv.appendChild(username);
	       let star = document.createElement("img");
	       star.classList.add("star-icon-2");
	       star.setAttribute("src","img/star-icon.svg");
	       detailDiv.appendChild(star);
	       let rating = document.createElement("p");
	       rating.innerHTML = "<b>" + review["rating"] + "</b> / 10";
	       detailDiv.appendChild(rating);	
	       let reviewParagraph = document.createElement("p");
	       reviewParagraph.innerText = review["review"];
	       detailDiv.appendChild(reviewParagraph);	  
	       reviewDiv.appendChild(detailDiv);
	       reviewsDiv.appendChild(reviewDiv);
	    }
	};
	xhttpUser.open("GET", "temp2.php?id="+review["user_id"], true);
	xhttpUser.send();
}

function displayReview(movie){
	let xhttpReview = new XMLHttpRequest();
	xhttpReview.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	       let responseReview = JSON.parse(xhttpReview.responseText);
	       for(let index = 0;index<responseReview["data"].length;index++){
	       		displayEachReview(responseReview["data"][index]);
	       }
	    }
	};
	xhttpReview.open("GET", "../api/v1/review/film?film_id="+filmId, true);
	xhttpReview.send();
}

function getSchedule(movie){
	let xhttpJadwal = new XMLHttpRequest();
	xhttpJadwal.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	       let responseJadwal = JSON.parse(xhttpJadwal.responseText);
	       console.log(responseJadwal["data"]);
	       displayJadwal(responseJadwal["data"],movie);
	    }
	};
	xhttpJadwal.open("GET", "../api/v1/jadwal/film?film_id="+filmId, true);
	xhttpJadwal.send();
}

xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       let response = JSON.parse(xhttp.responseText);
       if(response["message"] == "Film not found"){
       		displayNotFoundMessage();
       } else {
       		displayMovieDescription(response["data"]);
       		getSchedule(response["data"]);
       		displayReview(response["data"]);
       }
    }
};
xhttp.open("GET", "../api/v1/film/detail?id="+filmId, true);
xhttp.send();