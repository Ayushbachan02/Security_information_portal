import { getText } from "./fetch.js";
console.log("we are connected till now");

function displayText(text){
    const userTableContainer=document.getElementById("usertable");
    console.log(text);
    userTableContainer.innerHTML=text;
}
getText("./Actions/user_display_handle.php",displayText);


function displayText(text){
    const userTableContainer=document.getElementById("newstable");
    console.log(text);
    userTableContainer.innerHTML=text;
}
getText("./Actions/news_display_handle.php",displayText);

function displayText(text){
    const userTableContainer=document.getElementById("infotable");
    console.log(text);
    userTableContainer.innerHTML=text;
}
getText("./Actions/info_display_handle.php",displayText);

function displayText(text){
    const userTableContainer=document.getElementById("phototable");
    console.log(text);
    userTableContainer.innerHTML=text;
}
getText("./Actions/photo_display.php",displayText);
