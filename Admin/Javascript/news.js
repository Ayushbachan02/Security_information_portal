import { getText, postData } from "./fetch.js";

// function to display get data in arkup
function displayText(text){
    const userTableContainer=document.getElementById("newstable");
    userTableContainer.innerHTML=text;
}

// function to display post response text
function diaplayPost(data){
    console.log(data);
    console.log("Actual message to show user = ",data.message);
}

// sending get request for getting user data list
getText("./Actions/news_display_handle.php",displayText);


// 
const data={
    "addnews":true
}
const addnewsForm=document.getElementById("addnewsForm");
const addnewsSubmit=document.getElementById("addnewsSubmit");

// adding event listener to the submit button of add user
addnewsSubmit.addEventListener("click",(evnt)=>{
    // sending post request for gettiing the adduser form submit
    postData("./Actions/add_news.php",data,diaplayPost,addnewsForm);
})


//function to edit the user_list
