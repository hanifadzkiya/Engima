let resultContainer = document.getElementById("transaction_list");

function readcookie(){
    var allcookies = document.cookie;
    cookiearray = allcookies.split(';');
    for(var i=0; i<cookiearray.length; i++) {
        name = cookiearray[i].split('=')[0];
        if(name = "username"){
            value = cookiearray[i].split('=')[1];
        }
    }

    return value;
}

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

function displayTransReview(movie,first){
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

    let buttcontent = document.createElement("a")
    buttcontent.innerText = "Add Review";
    buttcontent.setAttribute("href","");
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

function displayTransReviewed(movie,first){
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
    buttcontent1.setAttribute("href","");
    buttcontent1.classList.add("delete");

    let buttcontent2 = document.createElement("a")
    buttcontent2.innerText = "Edit Review";
    buttcontent2.setAttribute("href","");
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

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var movies = JSON.parse(this.responseText);
        totalMovie = movies["data"].length;
        for(let index = 0;index < totalMovie;index++){
            displayMovieList(movies["data"][index]);
        }
        value = readcookie();
    }
};

xmlhttp.open("GET","transaction.php?uname=" + value,true);
xmlhttp.send();