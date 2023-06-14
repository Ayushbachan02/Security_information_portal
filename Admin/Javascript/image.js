import { getText, postData } from "./fetch.js";

// function to display get data in arkup
function displayText(text){
    const userTableContainer=document.getElementById("phototable");
    userTableContainer.innerHTML=text;
}

// function to display post response text
function diaplayPost(data){
    console.log(data);
    console.log("Actual message to show user = ",data.message);
}

// sending get request for getting user data list
getText("./Actions/photo_display.php",displayText);


// 
const data={
    "addPhoto":true
}
const addphotoForm=document.getElementById("addphotoForm");
const addphotoSubmit=document.getElementById("addphotoSubmit");

// adding event listener to the submit button of add user
addphotoSubmit.addEventListener("click",(evnt)=>{
    // sending post request for gettiing the adduser form submit
    postData("./Actions/add_photo.php",data,diaplayPost,addphotoForm);
})


//function to edit the user_list
