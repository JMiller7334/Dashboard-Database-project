//this script handles swaping out the tabs on the dashboard.


var currentTab = "customers";
function toggleTab(fromButton){

    let tabUsage = document.getElementById("formUsage");
    let tabCustomers = document.getElementById("formCustomers");
    let tabSearch = document.getElementById("formSearch");

    let buttonCustomer = document.getElementById("buttonCustomers");
    let buttonUsage = document.getElementById("buttonUsage");

    if (fromButton !== currentTab){
        if (currentTab === "customers"){
            currentTab = "usage";
            buttonUsage.style.textDecoration = "underline";
            buttonCustomer.style.textDecoration = "none";
            tabUsage.style.display = "flex";
            tabSearch.style.display = "grid";
            tabCustomers.style.display = "none";
        }
        else{
            currentTab = "customers";
            buttonUsage.style.textDecoration = "none";
            buttonCustomer.style.textDecoration = "underline";
            tabUsage.style.display = "none";
            tabSearch.style.display = "none";
            tabCustomers.style.display = "flex";
        }
    }
}