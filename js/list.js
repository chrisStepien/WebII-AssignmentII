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

const data1 = 'api-companies.php';
let storedCompanies = retrieveStorageCompanies();

//if content is not found in local storage, make a copy
if(storedCompanies.length == 0) {
    fetch(data1)
    .then( response => response.json() )
    .then( data => {
        document.querySelector("#loader1").style.display = "block";
        localStorage.setItem('companies',JSON.stringify(data));
        storedCompanies = JSON.parse(localStorage.getItem('companies'));
    })
    .then( () => {
            document.querySelector("#loader1").style.display = "none";
    })
    .then( data => populateListOfCompanies(storedCompanies) )
    .then( data => textFilter() )
    .catch( error => console.error(error) );
}

//if content is found in local storage, then use local copy
else {
    document.querySelector("#loader1").style.display = "none";
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
        const symbol = document.createElement("div");
        symbol.setAttribute("class", "listSymbol");
        symbol.innerHTML = "<a href='single-company.php?symbol=" + c.symbol + "'>" + c.symbol + "</a>";

        const name = document.createElement("div");
        name.setAttribute("class", "listName");
        name.innerHTML = "<a href='single-company.php?symbol=" + c.symbol + "'>" + c.name + "</a>";

        const list = document.createElement("li");
        list.innerHTML = "<img class='miniLogo' src='logos/"+c.symbol+".svg'>";
        list.appendChild(symbol);
        list.appendChild(name);
        list.setAttribute("class", "companiesListItem");
        list.setAttribute("id", c.symbol);

        companyList.appendChild(list);
    }
}

document.querySelector("#filterCompany").addEventListener("keyup", function(e) {
    textFilter();
});

document.querySelector("#clear").addEventListener("click", function(e) {
    clearFilter();
});

const ml = document.querySelectorAll(".miniLogo");
for (let x of ml) {
  x.addEventListener("mouseenter", function(e) {
    document.querySelector("#zoomed").style.display = "block";
    document.querySelector("#zoomedImage").style.display = "block";
    document.querySelector("#zoomedImage").setAttribute("src", e.target.getAttribute("src"));
  });

  x.addEventListener("mousemove", function(e) {
    var posX = e.clientX * 0.065;
    var posY = e.clientY * 0.065;

    document.querySelector("#zoomed").style.left = posX + "%";
    document.querySelector("#zoomed").style.top = posY + "%";
    document.querySelector("#zoomedImage").style.left = posX + "%";
    document.querySelector("#zoomedImage").style.top = posY + "%";

  });

  x.addEventListener("mouseleave", function() {
    document.querySelector("#zoomed").style.display = "none";
    document.querySelector("#zoomedImage").style.display = "none";
  });

}




}); //preload
