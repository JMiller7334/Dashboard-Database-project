//modules:
import * as moduleTab from '../utilities/tab.js'

//deshboard settings/mode variables
let currentTab = 'customers';
let currentAction = 'insert'

/*
toggles the main tab bar
*/
document.getElementById('menuButton').addEventListener('click', function(){
    console.log('index-conntroller: bringing in tab.');
    moduleTab.showTab();
});

document.getElementById('navClearData').addEventListener('click', function(){
    document.getElementById('clearPrompt').style.display = 'flex';
});

/*
changes what this tab will be used for regarding the current database table.
    */
function toggleAction(fromButton){
    currentAction = fromButton
    moduleTab.changeAction({currentTab, fromButton});
    console.log('index-controller: current action' + currentAction);
}
//LISTENERS
document.getElementById('buttonTabInsert').addEventListener('click', function(){
    toggleAction('insert');
});
document.getElementById('buttonTabDelete').addEventListener('click', function(){
    toggleAction('delete');
});
document.getElementById('buttonTabRead').addEventListener('click', function(){
    toggleAction('read');
});


/*
changes what database table the tab is currently targeting.
    */
function toggleTab(fromButton){
    currentAction = 'insert';
    moduleTab.changeTab({currentAction, fromButton, currentTab});
    console.log('index-controller: current tab' + currentTab);
}
//LISTENERS
document.getElementById('buttonCustomers').addEventListener('click', function(){
    toggleTab('customers');
    currentTab = 'customers';
});
document.getElementById('buttonUsage').addEventListener('click', function(){
    toggleTab('usage');
    currentTab = 'usage';
});


