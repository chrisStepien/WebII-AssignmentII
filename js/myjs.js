//clears the filter field
function clearFilter() {
    let input = document.querySelector("#filterCompany");
    input.value = "";
    textFilter();
}

//Extracted then modified from https://www.youtube.com/watch?v=Q_TplfrQlE0&ab_channel=doctorcode
function textFilter() {
    var filterValue, input, ul, li, i;
    input = document.querySelector("#filterCompany");
    filterValue = input.value.toUpperCase();
    ul = document.querySelector("#listOfCompanies")
    li = document.querySelectorAll("#listOfCompanies li");

    for(i=0; i < li.length; i++) {
        var a = li[i];
        if(a.innerHTML.toUpperCase().indexOf(filterValue) > -1) {
            li[i].style.display = "";
        }
        else {
            li[i].style.display = "none";
        }
    }
}

document.addEventListener("DOMContentLoaded", function() {

const data1 = '/api-companies.php';
let storedCompanies = retrieveStorageCompanies();

//if content is not found in local storage, make a copy
if(storedCompanies.length == 0) {
    fetch(data1)
    .then( response => response.json() )
    .then( data => {
        localStorage.setItem('companies',JSON.stringify(data));
        storedCompanies = JSON.parse(localStorage.getItem('companies'));
    })
    .then( data => populateListOfCompanies(storedCompanies) )
    .then( data => textFilter() )
    .catch( error => console.error(error) );
}

//if content is found in local storage, then use local copy
else {
    populateListOfCompanies(storedCompanies);
    textFilter();
}

function retrieveStorageCompanies() {
    return JSON.parse(localStorage.getItem('companies')) || [];
}

function removeStorageCompanies() {
    localStorage.removeItem('companies');
}

function populateListOfCompanies(companies) {
    const companyList = document.querySelector("#listOfCompanies")
    for(let c of companies) {
        const img = document.createElement("img");
        img.setAttribute("src", "logos/"+c.symbol+".svg");

        const symbol = document.createElement("div");
        symbol.setAttribute("class", "listSymbol");
        symbol.innerHTML = "<a href='#'>" + c.symbol + "</a>";

        const name = document.createElement("div");
        name.setAttribute("class", "listName");
        name.innerHTML = "<a href='#'>" + c.name + "</a>";

        const list = document.createElement("li");
        list.innerHTML = "<img class='miniLogo' src='logos/"+c.symbol+".svg' width='20px' height='20px'>";
        list.appendChild(symbol);
        list.appendChild(name);
        list.setAttribute("id", c.symbol);
        companyList.appendChild(list);
    }
}



}); //preload
