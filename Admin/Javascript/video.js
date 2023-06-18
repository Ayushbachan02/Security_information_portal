import { getText, postData } from "./fetch.js";

// function to display get data in arkup
function displayText(text) {
  const userTableContainer = document.getElementById("videotable");
  userTableContainer.innerHTML = text;
  bodyFunc();
  displayDelete();
}

// function to display post response text
function diaplayPost(data) {
  console.log(data);
  console.log("Actual message to show user = ", data.message);
}

// function to run after edit submit
function displayEditMessage(data){
  console.log(data);
  console.log("Actual message to show user = ", data.message);
  // sending get request for getting user data list
  getText("./Actions/video_display.php", displayText);
}

// sending get request for getting user data list
getText("./Actions/video_display.php", displayText);

//
const data = {
  checkvideo: "add",
};
const addvideoForm = document.getElementById("addvideoForm");
const addvideoSubmit = document.getElementById("addvideoSubmit");

// adding event listener to the submit button of add user
addvideoSubmit.addEventListener("click", (evnt) => {
  // sending post request for gettiing the adduser form submit
  postData("./Actions/add_video.php", data, diaplayPost, addvideoForm);
  document.querySelector("#closeaddModal").click();

});

//function to edit the news_list

function displayEdit(data) {
  let video_name = data.video_name;
  document.querySelector("#titleEdit").value = video_name;   
}

function bodyFunc() {   
  const editvideoForm = document.getElementById("editvideoForm");
  const editvideoSubmit = document.getElementById("editvideoSubmit");

  const allEditBtn = document.querySelectorAll(".editBtn");
  const saveChangeSubmit=document.querySelector("#editvideoSubmit");


  Array.from(allEditBtn).forEach((elem) => {
    elem.addEventListener("click", () => {
      let takenId = parseInt(elem.getAttribute("id_name"));
      let editData = {
        editDataSend: true,
        id_val: takenId,
      };
      saveChangeSubmit.setAttribute("idToEdit",takenId);
      postData("./Actions/edit_video.php", editData, displayEdit, addvideoForm);
    });
  });

  
  // adding event listener to the submit button of add user
  editvideoSubmit.addEventListener("click", (evnt) => {
    // sending post request for gettiing the adduser form submit
    let idToSend = parseInt(saveChangeSubmit.getAttribute("idToEdit"));
    console.log("edit id = ",idToSend);

    let dataToFindEdit={
      checkphoto:"edit",
      "editThisId":idToSend
    }
    postData("./Actions/add_video.php", dataToFindEdit, displayEditMessage, editvideoForm);
    document.querySelector("#closeEditModal").click();
  });
}

// function to delete the video_list
function displayDelete() {
    const deletevideoForm = document.getElementById("deletevideoForm");
    const deletevideoSubmit = document.getElementById("deletevideoSubmit");
  
    const allEditBtn = document.querySelectorAll(".editBtn");
    const saveChangeSubmit=document.querySelector("#deletevideoSubmit");

    Array.from(allEditBtn).forEach((elem) => {
        elem.addEventListener("click", () => {
            let takenId = parseInt(elem.getAttribute("id_name"));
            let editData = {
            editDataSend: true,
            id_val: takenId,
            };
            saveChangeSubmit.setAttribute("idToDelete",takenId);
            postData("./Actions/edit_video.php", editData, displayEdit, addvideoForm);
        });
        }
    );
    // adding event listener to the submit button of add user
    deletevideoSubmit.addEventListener("click", (evnt) => {
        // sending post request for gettiing the adduser form submit
        let idToSend = parseInt(saveChangeSubmit.getAttribute("idToDelete"));
        console.log("edit id = ",idToSend);
    
        let dataToFindEdit={
          checkvideo:"delete",
          "deleteThisId":idToSend
        }
        postData("./Actions/add_video.php", dataToFindEdit, displayEditMessage, deletevideoForm);
        document.querySelector("#closeDeleteModal").click();
      }
    );
}