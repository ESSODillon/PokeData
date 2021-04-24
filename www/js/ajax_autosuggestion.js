/*
 * This script contains AJAX methods
 */
var numTitles = 0; //total number of suggested movies titles
var activeTitle = -1; //movie title currently being selected
var searchBoxObj, suggestionBoxObj;

//initial actions to take when the page load
window.onload = function () {
  //DOM objects
  searchBoxObj = document.getElementById("searchtextbox");
  suggestionBoxObj = document.getElementById("suggestionDiv");
  searchBoxObj.addEventListener("keyup", handleKeyUp);
};

window.onclick = function () {
  suggestionBoxObj.style.display = "none";
};

//set and send XMLHttp request. The parameter is the search term
function suggest(query) {
  //if the search term is empty, clear the suggestion box.
  if (query === "") {
    suggestionBoxObj.innerHTML = "";
    return;
  }

  if (window.XMLHttpRequest) {
    //create an XHR object
    let xhr;
    xhr = new XMLHttpRequest();

    //open an asynchronous request AJAX
    xhr.open(
      "GET",
      "controllers/pokemon_controller.class.php?q=" + query,
      true
    );

    //handle server's responses
    xhr.onload = function () {
      //retrieve server's response and parse it to a json object
      var titles = JSON.parse(xhr.responseText);

      // display suggested titles in a div block
      displayTitles(titles);
    };

    //send the AJAX request
    xhr.send(null);
  }
}

/* This function populates the suggestion box with spans containing all the titles
 * The parameter of the function is a JSON object
 * */
function displayTitles(titles) {
  numTitles = titles.length;
  //console.log(numTitles);
  //activeTitle = -1;
  if (numTitles === 0) {
    //hide all suggestions
    suggestionBoxObj.style.display = "none";
    return false;
  }

  var divContent = "";
  //retrive the titles from the JSON doc and create a new span for each title
  for (i = 0; i < titles.length; i++) {
    divContent +=
      "<span id=s_" +
      i +
      " onclick='clickTitle(this)'>" +
      titles[i] +
      "</span>";
  }
  //display the spans in the div block
  suggestionBoxObj.innerHTML = divContent;
  suggestionBoxObj.style.display = "block";
}

//This function handles keyup event. The funcion is called for every keystroke.
function handleKeyUp(e) {
  // get the key event for different browsers
  e = !e ? window.event : e;

  /* if the keystroke is not up arrow or down arrow key,
   * call the suggest function and pass the content of the search box
   */
  if (e.keyCode !== 38 && e.keyCode !== 40) {
    suggest(e.target.value);
    return;
  }

  //if the up arrow key is pressed
  if (e.keyCode === 38 && activeTitle > 0) {
    //add code here to handle up arrow key. e.g. select the previous item
    activeTitleObj.style.backgroundColor = "#FFF";
    activeTitle--;
    activeTitleObj = document.getElementById("s_" + activeTitle);
    activeTitleObj.style.backgroundColor = "#F5DEB3";
    searchBoxObj.value = activeTitleObj.innerHTML;
    return;
  }

  //if the down arrow key is pressed
  if (e.keyCode === 40 && activeTitle < numTitles - 1) {
    //add code here to handle down arrow key, e.g. select the next item

    if (typeof activeTitleObj != "undefined") {
      activeTitleObj.style.backgroundColor = "#FFF";
    }
    activeTitle++;
    activeTitleObj = document.getElementById("s_" + activeTitle);
    activeTitleObj.style.backgroundColor = "#F5DEB3";
    searchBoxObj.value = activeTitleObj.innerHTML;
  }
}

//when a title is clicked, fill the search box with the title and then hide the suggestion list
function clickTitle(title) {
  //display the title in the search box
  searchBoxObj.value = title.innerHTML;

  //hide all suggestions
  suggestionBoxObj.style.display = "none";
}
