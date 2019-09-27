var urlParams = new URLSearchParams(window.location.search);
jadwalId = urlParams.get('jadwal_id');

// Cek apakah jadwal_id benar
var xhttpJadwal = new XMLHttpRequest();

function displayMovieSummary(title,jamTayang){
	let movieDiv = document.getElementById("movie")
	let movieSummaryDiv = document.createElement("div");
	movieSummaryDiv.classList.add("movie-summary");
	let movieTitle = document.createElement("h2");
	movieTitle.setAttribute("id","movie-title");
	movieTitle.innerHTML = title;
	movieSummaryDiv.appendChild(movieTitle);
	let jamTayangElement = document.createElement("p");
	jamTayangElement.innerHTML = "<b>" + jamTayang + "</b>";
	movieSummaryDiv.appendChild(jamTayangElement);
	movieDiv.appendChild(movieSummaryDiv);
}

function displayMessageNotFound(){
	let movieDiv = document.getElementById("movie");
	let messageNotFound = document.createElement("h2");
	messageNotFound.innerHTML = "Situs tidak tersedia";
	movieDiv.appendChild(messageNotFound);
}

function displayContent(jadwal){
	var xhttpFilm = new XMLHttpRequest();
	xhttpJadwal.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	       // Typical action to be performed when the document is ready:
	       let responseAPIFilm = JSON.parse(xhttpJadwal.responseText);
	       displayMovieSummary(responseAPIFilm["data"]["judul"],jadwal["jam_tayang"]);
	    }
	};
	xhttpJadwal.open("GET", "api/v1/film/detail?id="+jadwal["film_id"], true);
	xhttpJadwal.send();
}

xhttpJadwal.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
       let responseAPIJadwal = JSON.parse(xhttpJadwal.responseText);
       console.log(responseAPIJadwal);
       if(responseAPIJadwal["message"] == "Jadwal not found"){
       		displayMessageNotFound();
       } else {
       		displayContent(responseAPIJadwal["data"]);
       }
    }
};
xhttpJadwal.open("GET", "buy-ticket/temp.php", true);
xhttpJadwal.send();