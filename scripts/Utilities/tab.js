/*TAB MODULE: 
    handles changing and displaying fields within the sidebar to the user    
*/
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

//mainTab
const mainTab = document.getElementById('mainTab');
const menuButton = document.getElementById('menuButton');
let menuOpen = false;


// hides all text decorations.
function clearTextDecor(props){

    //iterate over the object
    const elements = Object.values(props);
    elements.forEach((v) => {
        v.style.textDecoration = 'none';
    });
}

//hides all elements.
function hideElements(props){
    const elements = Object.values(props);
    elements.forEach((v) => {
        v.style.display = 'none';
    });
}

//slide in main tab.
export function showTab(){
    if (menuOpen === true){
        menuButton.innerHTML = "&#9776";
        menuOpen = false;
        mainTab.style.transform = 'translateX(-100%)';  //slide out
    } else {
        menuButton.innerHTML = "X";
        menuOpen = true;
        mainTab.style.transform = 'translateX(0%)';  //slide in
    }
};

//changes what the sidebar fields and functions relate to doing for that table.
export function changeAction(props){
    clearTextDecor({buttonTabInsert, buttonTabDelete, buttonTabRead});
    hideElements({tabCustomers, tabUsage, tabRead, tabDelete});

    if (props.fromButton === 'insert'){
        buttonTabInsert.style.textDecoration = 'underline';
        if (props.currentTab === 'customers'){
            tabCustomers.style.display = 'flex';
            tabUsage.style.display = 'none';
        } else {
            tabUsage.style.display = 'flex';
            tabCustomers.style.display = 'none';
        }

    } else if (props.fromButton === 'delete'){
        buttonTabDelete.style.textDecoration = 'underline';
        tabDelete.style.display = 'flex';

    } else if (props.fromButton === 'read'){
        buttonTabRead.style.textDecoration = 'underline';
        tabRead.style.display = 'flex';
    }
}

//changes what table the sidebar fields and function work with.
export function changeTab(props){
    if (props.fromButton !== props.currentTab){

        clearTextDecor({buttonTabInsert, buttonTabDelete, buttonTabRead});
        hideElements({tabCustomers, tabUsage, tabRead, tabDelete});
        buttonTabInsert.style.textDecoration = 'underline';

        if (props.currentTab === 'customers'){
            actionContainer.style.display = 'none';

            buttonTabUsage.style.textDecoration = 'underline';
            buttonTabCustomer.style.textDecoration = 'none';
            tabUsage.style.display = 'flex';
            tabCustomers.style.display = 'none';
            readTitle.innerHTML = 'Read From Monthly Usage';
            deleteTitle.innerHTML = 'Delete From Monthly Usage';
        }
        else if (props.currentTab === 'usage'){
            actionContainer.style.display = 'flex';

            buttonTabUsage.style.textDecoration = 'none';
            buttonTabCustomer.style.textDecoration = 'underline';
            tabUsage.style.display = 'none';
            tabCustomers.style.display = 'flex';
            readTitle.innerHTML = 'Read From Customers';
            deleteTitle.innerHTML = 'Delete From Customers';
        }
    }
}

