var urlParams = new URLSearchParams(window.location.search);
let film_id = urlParams.get('film_id'); 
let user_id = "3f4b4800-b35e-4e4b-b7dc-b355d1019584"; //Get from cookie later
let type;
let methoded;
let xhttp = new XMLHttpRequest();

function back(){
	window.history.back();
}

function displayExistingReview(review){
	let textArea = document.getElementById("review");
	textArea.innerText = review["review"];
	let input = document.getElementById("star" + review["rating"]);
	input.checked = true;
}

function submit(){
	let review = document.getElementById("review").innerText;
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
	console.log(methoded);
	xhttpSubmit.open(methoded, "../api/v1/review/"+type+"/index.php", true);
	xhttpSubmit.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhttpSubmit.send("film_id="+film_id+"&film_id="+film_id+"&rating="+rating+"&review="+review);

}

xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
       let response = JSON.parse(xhttp.responseText);
       if(response["message"] == "Success get review by film and user"){
       		displayExistingReview(response["data"][0]);
       		type = "update";
       		methoded = "PUT";
       } else {
       		type = "create";
       		methoded = "POST";
       }
    }
};

xhttp.open("GET", "../api/v1/review/user?film_id="+film_id+"&user_id="+user_id, true);
xhttp.send();
