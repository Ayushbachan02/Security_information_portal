import { getText } from "./fetch.js";
console.log("we are connected till now");

function displayText(text){
    const userTableContainer=document.getElementById("usertable");
    console.log(text);
    userTableContainer.innerHTML=text;
}
getText("./Actions/user_display_handle.php",displayText);