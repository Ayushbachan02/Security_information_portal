import { getText, postData } from "./fetch.js";

// function to display get data in arkup
function displayText(text) {
  const userTableContainer = document.getElementById("phototable");
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
  getText("./Actions/photo_display.php", displayText);
}

// sending get request for getting user data list
getText("./Actions/photo_display.php", displayText);

//
const data = {
  checkphoto: "add",
};
const addphotoForm = document.getElementById("addphotoForm");
const addphotoSubmit = document.getElementById("addphotoSubmit");

// adding event listener to the submit button of add user
addphotoSubmit.addEventListener("click", (evnt) => {
  // sending post request for gettiing the adduser form submit
  postData("./Actions/add_photo.php", data, diaplayPost, addphotoForm);
  document.querySelector("#closeaddModal").click();

});

//function to edit the news_list

function displayEdit(data) {
  let title = data.title;
  let date = data.date;
  document.querySelector("#titleEdit").value = title;   
  document.querySelector("#eventdateEdit").value = date;
}

function bodyFunc() {
  const editphotoForm = document.getElementById("editphotoForm");
  const editphotoSubmit = document.getElementById("editphotoSubmit");

  const allEditBtn = document.querySelectorAll(".editBtn");
  const saveChangeSubmit=document.querySelector("#editphotoSubmit");


  Array.from(allEditBtn).forEach((elem) => {
    elem.addEventListener("click", () => {
      let takenId = parseInt(elem.getAttribute("id_name"));
      let editData = {
        editDataSend: true,
        id_val: takenId,
      };
      saveChangeSubmit.setAttribute("idToEdit",takenId);
      postData("./Actions/edit_photo.php", editData, displayEdit, addphotoForm);
    });
  });

  
  // adding event listener to the submit button of add user
  editphotoSubmit.addEventListener("click", (evnt) => {
    // sending post request for gettiing the adduser form submit
    let idToSend = parseInt(saveChangeSubmit.getAttribute("idToEdit"));
    console.log("edit id = ",idToSend);

    let dataToFindEdit={
      checkphoto:"edit",
      "editThisId":idToSend
    }
    postData("./Actions/add_photo.php", dataToFindEdit, displayEditMessage, editphotoForm);
    document.querySelector("#closeEditModal").click();
  });
}

// function to delete the video_list
function displayDelete() {
  const deletephotoForm = document.getElementById("deletephotoForm");
  const deletephotoSubmit = document.getElementById("deletephotoSubmit");

  const allEditBtn = document.querySelectorAll(".editBtn");
  const saveChangeSubmit=document.querySelector("#deletephotoSubmit");

  Array.from(allEditBtn).forEach((elem) => {
      elem.addEventListener("click", () => {
          let takenId = parseInt(elem.getAttribute("id_name"));
          let editData = {
          editDataSend: true,
          id_val: takenId,
          };
          saveChangeSubmit.setAttribute("idToDelete",takenId);
          postData("./Actions/edit_photo.php", editData, displayEdit, addphotoForm);
      });
      }
  );
  // adding event listener to the submit button of add user
  deletephotoSubmit.addEventListener("click", (evnt) => {
      // sending post request for gettiing the adduser form submit
      let idToSend = parseInt(saveChangeSubmit.getAttribute("idToDelete"));
      console.log("edit id = ",idToSend);
  
      let dataToFindEdit={
        checkphoto:"delete",
        "deleteThisId":idToSend
      }
      postData("./Actions/add_photo.php", dataToFindEdit, displayEditMessage, deletephotoForm);
      document.querySelector("#closeDeleteModal").click();
    }
  );
}
