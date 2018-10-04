var curRecord = 0;
var mondiv = document.getElementById("mondiv");
var nextbtn = document.getElementById("btn-next");
var prevbtn = document.getElementById("btn-prev");

makeMyRequest(curRecord);

nextbtn.addEventListener("click", function() {
    mondiv.innerHTML = "";
    makeMyRequest(++curRecord);

});
prevbtn.addEventListener("click", function() {
    mondiv.innerHTML = "";
    makeMyRequest(--curRecord);

});

function makeMyRequest(page) {
    var myRequest = new XMLHttpRequest();
    myRequest.open('GET', 'students.json');
    myRequest.onload = function() {
        if (myRequest.status >= 200 && myRequest.status <= 400) {
            var myData = JSON.parse(myRequest.responseText);
            var htmlString = "";
            htmlString += `
            <h2>Resultats scolaire</h2>
            <ul>
             <li>Nom: ${myData[page].nom}</li>
             <li>Cours: ${myData[page].cours}</li>
             <li>Age: ${myData[page].age}</li>
             <li>Note: ${myData[page].note}</li>
        </ul>
            `;
            mondiv.insertAdjacentHTML("beforeend", htmlString);
            if (curRecord == 0) {
                prevbtn.disabled = true;
                nextbtn.disabled = false;
            } else if (curRecord >= myData.length - 1) {
                prevbtn.disabled = false;
                nextbtn.disabled = true;
            } else {
                prevbtn.disabled = false;
                nextbtn.disabled = false;
            }

        } else {
            alert("connection established, but an error occured");
        }

    };

    myRequest.onerror = function() {
        console.log("Connection error");
        console.log(myRequest.status);
    };
    myRequest.send();
}