import { getText, postData } from "./fetch.js";

// function to display get data in arkup
function displayText(text){
    const userTableContainer=document.getElementById("videotable");
    userTableContainer.innerHTML=text;
    bodyFunc();
}

// function to display post response text
function diaplayPost(data){
    console.log(data);
    console.log("Actual message to show user = ",data.message);
}

// sending get request for getting user data list
getText("./Actions/video_display.php",displayText);


// 
const data={
    "addvideo":true
}
const addvideoForm=document.getElementById("addvideoForm");
const addvideoSubmit=document.getElementById("addvideoSubmit");

// adding event listener to the submit button of add user
addvideoSubmit.addEventListener("click",(evnt)=>{
    // sending post request for gettiing the adduser form submit
    postData("./Actions/add_video.php",data,diaplayPost,addvideoForm);
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
            postData("./Actions/edit_video.php",editData,displayEdit,addvideoForm);
        })
    })
}
const data1={
    "editvideo":true
}
const editvideoForm=document.getElementById("editvideoForm");
const editvideoSubmit=document.getElementById("editvideoSubmit");

// adding event listener to the submit button of add user
editvideoSubmit.addEventListener("click",(evnt)=>{
    // sending post request for gettiing the adduser form submit
    postData("./Actions/add_video.php",data1,diaplayPost,editvideoForm);
})
