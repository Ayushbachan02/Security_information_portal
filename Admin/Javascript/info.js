import { getText, postData } from "./fetch.js";

// function to display get data in arkup
function displayText(text){
    const userTableContainer=document.getElementById("infotable");
    userTableContainer.innerHTML=text;
}

// function to display post response text
function diaplayPost(data){
    console.log(data);
    console.log("Actual message to show user = ",data.message);
}

// sending get request for getting user data list
getText("./Actions/info_display_handle.php",displayText);


// 
const data={
    "addinfo":true
}
const addinfoForm=document.getElementById("addinfoForm");
const addinfoSubmit=document.getElementById("addinfoSubmit");

// adding event listener to the submit button of add user
addinfoSubmit.addEventListener("click",(evnt)=>{
    // sending post request for gettiing the adduser form submit
    postData("./Actions/add_info.php",data,diaplayPost,addinfoForm);
})


//function to edit the user_list
