let jadwal,movie;
var urlParams = new URLSearchParams(window.location.search);
jadwalId = urlParams.get('jadwal_id');

// Cek apakah jadwal_id benar
var xhttpJadwal = new XMLHttpRequest();

var modal = document.querySelector(".modal");

function toggleModal() {
    modal.classList.toggle("show-modal");
}

function windowOnClick(event) {
    if (event.target === modal) {
        toggleModal();
    }
}

function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}

window.addEventListener("click", windowOnClick);

function back(){
	window.history.back();
}
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

function removeNotSelectedMessage(){
	let notSelectedMessage = document.getElementById("not-select-message");
	notSelectedMessage.parentNode.removeChild(notSelectedMessage);
}

function changeBookingSummary(nomor){
	let selectedSeatDiv = document.getElementById("textbox");
	selectedSeatDiv.innerHTML = "";
	let seat = document.createElement("p");
	seat.classList.add("f-left");
	seat.innerHTML = "<b>Seat #" + nomor + "</b>";
	selectedSeatDiv.appendChild(seat);
	let price = document.createElement("p");
	price.classList.add("f-right");
	price.innerHTML = "<b>Rp 45000</b>";
	selectedSeatDiv.appendChild(price);
}

function buyTicket(){
	let selectedSeat = document.getElementsByClassName("selected")[0];
	let nomorSeat = selectedSeat.innerText;
	let xhttpBuy = new XMLHttpRequest();
	xhttpBuy.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	       toggleModal();
	    }
	};
	params = "jadwal_id="+jadwalId+"&user_id="+getCookie("user_id")+"&nomor="+nomorSeat;
	xhttpBuy.open("PUT", "../api/v1/ticket/buy", true);
	xhttpBuy.send(params);
}

function displayBookingSummary(){
	let summaryDiv = document.getElementsByClassName("summary")[0];
	summaryDiv.innerHTML = '<h3 id="summary-title">Booking Summary</h3>';
	let movieTitle = document.createElement('p');
	movieTitle.innerHTML = "<b>" + movie["judul"] + "</b>";
	summaryDiv.appendChild(movieTitle);
	let jamTayang = document.createElement("p");
	jamTayang.innerText = jadwal["jam_tayang"];
	summaryDiv.appendChild(jamTayang);
	let selectedSeatDiv = document.createElement("div");
	selectedSeatDiv.setAttribute("id","textbox");
	summaryDiv.appendChild(selectedSeatDiv);
	let buyButton = document.createElement("button");
	buyButton.setAttribute("id","buy-button");
	buyButton.setAttribute("onclick","buyTicket()");
	buyButton.classList.add("button");
	buyButton.innerText = "Buy Ticket";
	summaryDiv.appendChild(buyButton);
}

function selectSeat(nomor){
	console.log(nomor);
	if(document.getElementsByClassName("selected").length != 0){
		let previousSelectedSeat = document.getElementsByClassName("selected")[0];
		previousSelectedSeat.classList.remove("selected");
		previousSelectedSeat.classList.add("empty");
	} else {
		removeNotSelectedMessage();
		displayBookingSummary()

	}
	let newSelectedSeat = document.getElementById("seat-"+nomor);
	newSelectedSeat.classList.remove("empty");
	newSelectedSeat.classList.add("selected");
	changeBookingSummary(nomor);
}

function createEmptySeat(seat){
	let seatElement = document.createElement("li");
	seatElement.classList.add("empty");
	seatElement.setAttribute("onclick","selectSeat("+seat["nomor"]+")");
	seatElement.setAttribute("id","seat-"+seat["nomor"]);
	seatElement.innerHTML = seat["nomor"];
	return seatElement;
}

function createFullSeat(seat){
	let seatElement = document.createElement("li");
	seatElement.classList.add("full");
	seatElement.setAttribute("id","seat-"+seat["nomor"]);
	seatElement.innerHTML = seat["nomor"];
	return seatElement;
}

function displaySeat(seats){
	let seatBoard = document.getElementById("seat-board");
	for(let i = 1;i<=30;i++){
		if(seats[i-1]["user_id"]==null){
			let seat = createEmptySeat(seats[i-1]);
			seatBoard.appendChild(seat);
		} else {
			let seat = createFullSeat(seats[i-1]);
			seatBoard.appendChild(seat);
		}
	}
}

function displayContent(jadwal){
	var xhttpFilm = new XMLHttpRequest();
	xhttpJadwal.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	       // Typical action to be performed when the document is ready:
	       let responseAPIFilm = JSON.parse(xhttpJadwal.responseText);
	       movie = responseAPIFilm["data"];
	       displayMovieSummary(responseAPIFilm["data"]["judul"],jadwal["jam_tayang"]);
	       let xhttpKursi = new XMLHttpRequest();
	       xhttpKursi.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			       // Typical action to be performed when the document is ready:
			        let responseAPIKursi = JSON.parse(xhttpKursi.responseText);
			        console.log(responseAPIKursi);
		       		displaySeat(responseAPIKursi["data"]);
			    }
			};
			xhttpKursi.open("GET", "../buy-ticket/temp2.php?jadwal_id="+jadwal["id"], true);
			xhttpKursi.send();
	    }
	};
	xhttpJadwal.open("GET", "../api/v1/film/detail?id="+jadwal["film_id"], true);
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
       		jadwal = responseAPIJadwal["data"];
       		displayContent(responseAPIJadwal["data"]);
       }
    }
};
xhttpJadwal.open("GET", "../api/v1/jadwal?jadwal_id="+jadwalId, true);
xhttpJadwal.send();