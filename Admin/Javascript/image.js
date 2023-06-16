import { getText, postData } from "./fetch.js";

// function to display get data in arkup
function displayText(text){
    const userTableContainer=document.getElementById("phototable");
    userTableContainer.innerHTML=text;
    bodyFunc();
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

function displayEdit(data){
    let evntName=data.evnt;
    let evntDate=data.Date;
    document.querySelector("#titleEdit").value=evntName;
    document.querySelector("#eventdateEdit").value=evntDate;
}

function bodyFunc(){
    const allEditBtn=document.querySelectorAll(".editBtn");
    console.log(allEditBtn);
    Array.from(allEditBtn).forEach((elem)=>{
        elem.addEventListener("click",()=>{
            let takenId=parseInt(elem.getAttribute("id_name"));
            let editData={
                "editDataSend":true,
                "id_val":takenId
            }
            postData("./Actions/edit_photo.php",editData,displayEdit,addphotoForm);
        })
    })
}
const data1={
    "editPhoto":true
}
const editphotoForm=document.getElementById("editphotoForm");
const editphotoSubmit=document.getElementById("editphotoSubmit");

// adding event listener to the submit button of add user
editphotoSubmit.addEventListener("click",(evnt)=>{
    // sending post request for gettiing the adduser form submit
    postData("./Actions/add_photo.php",data1,diaplayPost,editphotoForm);
})
