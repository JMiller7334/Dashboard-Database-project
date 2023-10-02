//VARIABLES:
//tab ids
const tabUsage = document.getElementById('formUsage');
const tabCustomers = document.getElementById('formCustomers');

//action form ids
const tabDelete = document.getElementById('formDelete');
const tabRead = document.getElementById('formRead');

//action titles (h2)
const deleteTitle = document.getElementById('deleteTitle');
const readTitle = document.getElementById('readTitle');

//button ids
const buttonTabCustomer = document.getElementById('buttonCustomers');
const buttonTabUsage = document.getElementById('buttonUsage');

//tabs
const buttonTabInsert = document.getElementById('buttonTabInsert');
const buttonTabDelete = document.getElementById('buttonTabDelete');
const buttonTabRead = document.getElementById('buttonTabRead');

//actionTab
const actionContainer = document.getElementById('tabAction');

//this script handles swaping out the tabs on the dashboard.
let currentTab = 'customers';
let currentAction = 'insert'


function resetActionTab(){
    buttonTabInsert.style.textDecoration = 'none';
    buttonTabDelete.style.textDecoration = 'none';
    buttonTabRead.style.textDecoration = 'none';
}

function resetCurrentTabs(){
    tabDelete.style.display = 'none';
    tabRead.style.display = 'none';
    tabCustomers.style.display = 'none';
    tabUsage.style.display = 'none';
}

function toggleAction(fromButton){
    currentAction = fromButton
    console.log('index-controller: current action' + currentAction);

    resetActionTab();
    resetCurrentTabs();

    if (fromButton === 'insert'){
        buttonTabInsert.style.textDecoration = 'underline';
        if (currentTab === 'customers'){
            tabCustomers.style.display = 'flex';
            tabUsage.style.display = 'none';
        } else {
            tabUsage.style.display = 'flex';
            tabCustomers.style.display = 'none';
        }

    } else if (fromButton === 'delete'){
        buttonTabDelete.style.textDecoration = 'underline';
        tabDelete.style.display = 'flex';

    } else if (fromButton === 'read'){
        buttonTabRead.style.textDecoration = 'underline';
        tabRead.style.display = 'flex';
    }
}

function toggleTab(fromButton){
    currentAction = 'insert';

    resetCurrentTabs();
    resetActionTab();
    buttonTabInsert.style.textDecoration = 'underline';
    

    if (fromButton !== currentTab){
        if (currentTab === 'customers'){
            currentTab = 'usage';
            actionContainer.style.display = 'none';

            buttonTabUsage.style.textDecoration = 'underline';
            buttonTabCustomer.style.textDecoration = 'none';
            tabUsage.style.display = 'flex';
            tabCustomers.style.display = 'none';
            readTitle.innerHTML = 'Read From Monthly Usage';
            deleteTitle.innerHTML = 'Delete From Monthly Usage';
        }
        else if (currentTab === 'usage'){
            currentTab = 'customers';
            actionContainer.style.display = 'flex';

            buttonTabUsage.style.textDecoration = 'none';
            buttonTabCustomer.style.textDecoration = 'underline';
            tabUsage.style.display = 'none';
            tabCustomers.style.display = 'flex';
            readTitle.innerHTML = 'Read From Customers';
            deleteTitle.innerHTML = 'Delete From Customers'
        }
    }
}