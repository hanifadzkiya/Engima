var value = document.currentScript.getAttribute('one');
let resultContainer = document.getElementById("transaction_list");

//function readcookie(){
//    var allcookies = document.cookie;
//    cookiearray = allcookies.split(';');
//    for(var i=0; i<cookiearray.length; i++) {
//        name = cookiearray[i].split('=')[0];
//        if(name = "username"){
//            value = cookiearray[i].split('=')[1];
//        }
//    }
//
//    return value;
//}

function displayTransLater(movie,first){
    let divContent = document.createElement("div");
    divContent.classList.add("trans");
    if (first != true){
        divContent.classList.add("notfirst");
    }

    let posterContent = document.createElement("img");
    posterContent.classList.add("pic");
    posterContent.src = "images/aang.jpg";

    let movContent = document.createElement("div");
    movContent.classList.add("movie-detail");

    let titleContent = document.createElement("h4")
    titleContent.innerText = movie["judul"];
    let schedule1= document.createElement("div")
    schedule1.classList.add("p");
    let schedule2= document.createElement("div")
    schedule2.classList.add("schedule");
    schedule2.innerText = "Schedule:";
    let schedule3 = document.createElement("div")
    schedule3.innerText = movie['jam_tayang'];

    schedule1.appendChild(schedule2);
    schedule1.appendChild(schedule3);
    movContent.appendChild(titleContent);
    movContent.appendChild(schedule1);

    divContent.appendChild(posterContent);
    divContent.appendChild(movContent);
    if (first != true){
        let pembatas = document.createElement("hr");
        resultContainer.appendChild(pembatas);
        resultContainer.appendChild(divContent);
    } else{
        resultContainer.appendChild(divContent);
    }
}

function displayTransReview(movie,first,id){
    let divContent = document.createElement("div");
    divContent.classList.add("trans");
    if (first != true){
        divContent.classList.add("notfirst");
    }

    let posterContent = document.createElement("img");
    posterContent.classList.add("pic");
    posterContent.src = "images/aang.jpg";

    let movContent = document.createElement("div");
    movContent.classList.add("movie-detail");

    let titleContent = document.createElement("h4")
    titleContent.innerText = movie["judul"];
    let schedule1= document.createElement("div")
    schedule1.classList.add("p");
    let schedule2= document.createElement("div")
    schedule2.classList.add("schedule");
    schedule2.innerText = "Schedule:";
    let schedule3 = document.createElement("div")
    schedule3.innerText = movie['jam_tayang'];

    let button= document.createElement("div")
    button.classList.add("butt");

    url = "../user-review/index.php?film_id=" + id;
    let buttcontent = document.createElement("a")
    buttcontent.innerText = "Add Review";
    buttcontent.setAttribute("href",url);
    buttcontent.classList.add("add");

    button.appendChild(buttcontent);

    schedule1.appendChild(schedule2);
    schedule1.appendChild(schedule3);
    movContent.appendChild(titleContent);
    movContent.appendChild(schedule1);

    divContent.appendChild(posterContent);
    divContent.appendChild(movContent);
    divContent.appendChild(button);
    if (first != true){
        let pembatas = document.createElement("hr");
        resultContainer.appendChild(pembatas);
        resultContainer.appendChild(divContent);
    } else{
        resultContainer.appendChild(divContent);
    }
}

function displayTransReviewed(movie,first,id,uid){
    let divContent = document.createElement("div");
    divContent.classList.add("trans");
    if (first != true){
        divContent.classList.add("notfirst");
    }

    let posterContent = document.createElement("img");
    posterContent.classList.add("pic");
    posterContent.src = "images/aang.jpg";

    let movContent = document.createElement("div");
    movContent.classList.add("movie-detail");

    let titleContent = document.createElement("h4")
    titleContent.innerText = movie["judul"];
    let schedule1= document.createElement("div")
    schedule1.classList.add("p");
    let schedule2= document.createElement("div")
    schedule2.classList.add("schedule");
    schedule2.innerText = "Schedule:";
    let schedule3 = document.createElement("div")
    schedule3.innerText = movie['jam_tayang'];

    let button= document.createElement("div")
    button.classList.add("butt");

    let buttcontent1 = document.createElement("a")
    buttcontent1.innerText = "Delete Review";
    param = "deleteReview('" +id+"','"+uid+"')";
    buttcontent1.setAttribute("onclick",param);
    buttcontent1.classList.add("delete");

    url = "../user-review/index.php?film_id=" + id;
    let buttcontent2 = document.createElement("a")
    buttcontent2.innerText = "Edit Review";
    buttcontent2.setAttribute("href",url);
    buttcontent2.classList.add("edit");

    button.appendChild(buttcontent1);
    button.appendChild(buttcontent2);

    schedule1.appendChild(schedule2);
    schedule1.appendChild(schedule3);
    movContent.appendChild(titleContent);
    movContent.appendChild(schedule1);

    divContent.appendChild(posterContent);
    divContent.appendChild(movContent);
    divContent.appendChild(button);
    if (first != true){
        let pembatas = document.createElement("hr");
        resultContainer.appendChild(pembatas);
        resultContainer.appendChild(divContent);
    } else{
        resultContainer.appendChild(divContent);
    }
}

function deleteReview(id,uid){
	let xhttpSubmit = new XMLHttpRequest();
	xhttpSubmit.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xhttpSubmit.responseText);
        }
	};
    param = "film_id=" + id +"&user_id=" + uid;
	xhttpSubmit.open("DELETE", "../api/v1/review/delete", true);
    
	xhttpSubmit.send(param);

}


var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var movies = JSON.parse(this.responseText);
        uid = movies["uid"];
        totalMovie1 = movies["data1"].length;
        totalMovie2 = movies["data2"].length;
        totalMovie3 = movies["data3"].length;
        console.log(totalMovie1);
        console.log(totalMovie2);
        console.log(totalMovie3);
        if(totalMovie1 != 0){
            first = 1;
        } else if (totalMovie1 == 0 && totalMovie2 != 0){
            first = 2;
        } else if (totalMovie1 == 0 && totalMovie2 == 0 && totalMovie3 == 0){
            first = 3;
        }
        for(let index = 0;index < totalMovie1;index++){
            if( index == 0 && first == 1){
                displayTransLater(movies["data1"][index],true);
            } else {
                displayTransLater(movies["data1"][index],false);
            }
            
        }
        for(let index = 0;index < totalMovie2;index++){
            id = movies["data2"][index]["film_id"];
            if( index == 0 && first == 2){
                displayTransReview(movies["data2"][index],true,id);
                
            } else {
                displayTransReview(movies["data2"][index],false,id);
            }
        }
        for(let index = 0;index < totalMovie3;index++){
            id = movies["data3"][index]["film_id"];
            if( index == 0 && first == 3){
                displayTransReviewed(movies["data3"][index],true,id,uid);
            } else {
                displayTransReviewed(movies["data3"][index],false,id,uid);
            }
        }
    }
};

xmlhttp.open("GET","../api/v1/transaction/transaction.php?id=" + value,true);
xmlhttp.send();