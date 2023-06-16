import { getText, postData } from "./fetch.js";

// function to display get data in arkup
function displayText(text){
    const userTableContainer=document.getElementById("infotable");
    userTableContainer.innerHTML=text;
    bodyFunc();
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


//function to edit the info_list

function displayEdit(data) {
    let heading = data.heading;
    let content = data.content;
    document.querySelector("#titleEdit").value = heading;
    document.querySelector("#infoEdit").value = content;
  }
  
  function bodyFunc() {
    const allEditBtn = document.querySelectorAll(".editBtn");
    console.log(allEditBtn);
    Array.from(allEditBtn).forEach((elem) => {
      elem.addEventListener("click", () => {
        let takenId = parseInt(elem.getAttribute("id_name"));
        let editData = {
          editDataSend: true,
          id_val: takenId,
        };
        postData("./Actions/edit_info.php", editData, displayEdit, editinfoForm);
      });
    });
  }
  
  const data1={
    "editinfo":true
}
const editinfoForm=document.getElementById("editinfoForm");
const editinfoSubmit=document.getElementById("editinfoSubmit");

// adding event listener to the submit button of add user
editinfoSubmit.addEventListener("click",(evnt)=>{
    // sending post request for gettiing the adduser form submit
    postData("./Actions/add_info.php",data1,diaplayPost,editinfoForm);
})