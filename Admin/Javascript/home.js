import { getText, postData } from "./fetch.js";

// function to display get data in arkup
function displayText(text){
    const userTableContainer=document.getElementById("usertable");
    userTableContainer.innerHTML=text;
}

// function to display post response text
function diaplayPost(data){
    console.log(data);
    console.log("Actual message to show user = ",data.message);
}

// sending get request for getting user data list
getText("./Actions/user_display_handle.php",displayText);


// 
const data={
    "addUser":true
}
const addUserForm=document.getElementById("addUserForm");
const addUserSubmit=document.getElementById("addUserSubmit");

// adding event listener to the submit button of add user
addUserSubmit.addEventListener("click",(evnt)=>{
    // sending post request for gettiing the adduser form submit
    postData("./Actions/add_user.php",data,diaplayPost,addUserForm);
})


//function to edit the user_list
