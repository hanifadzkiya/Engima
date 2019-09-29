var urlParams = new URLSearchParams(window.location.search);
let film_id = urlParams.get('film_id'); 
let user_id = "80ad1297-9dc2-4ffa-ab91-033f903debf4"; //Get from cookie later
let type;
let xhttp = new XMLHttpRequest();

function displayExistingReview(review){
	let textArea = document.getElementById("review");
	textArea.innerText = review["review"];
	let input = document.getElementById("star" + review["rating"]);
	input.checked = true;
}

function submit(){
	let review = document.getElementById("review").innerHTML;
	let rating;
	for(let index = 1;index <= 5;index++){
		let ratingStar = document.getElementById("star" + index);
		if(ratingStar.checked){
			rating = index;
		}
	}
	let xhttpSubmit = new XMLHttpRequest();
	xhttpSubmit.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	       // Typical action to be performed when the document is ready:
	       // let response = JSON.parse(xhttpSubmit.responseText);
	       // if(response["message"] = "Success get review by film and user"){
	       // 		displayExistingReview(response["data"][0]);
	       // } 
	       console.log(xhttpSubmit.responseText);
	    }
	};

	xhttpSubmit.open("PUT", "../api/v1/review/"+type, true);
	xhttpSubmit.send("film_id=3");

}

xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
       let response = JSON.parse(xhttp.responseText);
       if(response["message"] = "Success get review by film and user"){
       		displayExistingReview(response["data"][0]);
       		type = "update";
       } else {
       		type = "create";
       }
    }
};

xhttp.open("GET", "../api/v1/review/user?film_id="+film_id+"&user_id="+user_id, true);
xhttp.send();
