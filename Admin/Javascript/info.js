import { getText, postData } from "./fetch.js";

// function to display get data in arkup
function displayText(text) {
  const userTableContainer = document.getElementById("infotable");
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
  getText("./Actions/info_display_handle.php", displayText);
}

// sending get request for getting user data list
getText("./Actions/info_display_handle.php", displayText);

//
const data = {
  checkinfo: "add",
};
const addinfoForm = document.getElementById("addinfoForm");
const addinfoSubmit = document.getElementById("addinfoSubmit");

// adding event listener to the submit button of add user
addinfoSubmit.addEventListener("click", (evnt) => {
  // sending post request for gettiing the adduser form submit
  postData("./Actions/add_info.php", data, diaplayPost, addinfoForm);
  document.querySelector("#closeaddModal").click();

});

//function to edit the news_list

function displayEdit(data) {
  let heading = data.heading;
  let content = data.content;
  document.querySelector("#titleEdit").value = heading;
  document.querySelector("#infoEdit").value = content;
}

function bodyFunc() {
  const editinfoForm = document.getElementById("editinfoForm");
  const editinfoSubmit = document.getElementById("editinfoSubmit");

  const allEditBtn = document.querySelectorAll(".editBtn");
  const saveChangeSubmit=document.querySelector("#editinfoSubmit");


  Array.from(allEditBtn).forEach((elem) => {
    elem.addEventListener("click", () => {
      let takenId = parseInt(elem.getAttribute("id_name"));
      let editData = {
        editDataSend: true,
        id_val: takenId,
      };
      saveChangeSubmit.setAttribute("idToEdit",takenId);
      postData("./Actions/edit_info.php", editData, displayEdit, addinfoForm);
    });
  });

  
  // adding event listener to the submit button of add user
  editinfoSubmit.addEventListener("click", (evnt) => {
    // sending post request for gettiing the adduser form submit
    let idToSend = parseInt(saveChangeSubmit.getAttribute("idToEdit"));
    console.log("edit id = ",idToSend);

    let dataToFindEdit={
      checkinfo:"edit",
      "editThisId":idToSend
    }
    postData("./Actions/add_info.php", dataToFindEdit, displayEditMessage, editinfoForm);
    document.querySelector("#closeEditModal").click();
  });
}

// function to delete the video_list
function displayDelete() {
  const deleteinfoForm = document.getElementById("deleteinfoForm");
  const deleteinfoSubmit = document.getElementById("deleteinfoSubmit");

  const allEditBtn = document.querySelectorAll(".editBtn");
  const saveChangeSubmit=document.querySelector("#deleteinfoSubmit");

  Array.from(allEditBtn).forEach((elem) => {
      elem.addEventListener("click", () => {
          let takenId = parseInt(elem.getAttribute("id_name"));
          let editData = {
          editDataSend: true,
          id_val: takenId,
          };
          saveChangeSubmit.setAttribute("idToDelete",takenId);
          postData("./Actions/edit_info.php", editData, displayEdit, addinfoForm);
      });
      }
  );
  // adding event listener to the submit button of add user
  deleteinfoSubmit.addEventListener("click", (evnt) => {
      // sending post request for gettiing the adduser form submit
      let idToSend = parseInt(saveChangeSubmit.getAttribute("idToDelete"));
      console.log("edit id = ",idToSend);
  
      let dataToFindEdit={
        checkinfo:"delete",
        "deleteThisId":idToSend
      }
      postData("./Actions/add_info.php", dataToFindEdit, displayEditMessage, deleteinfoForm);
      document.querySelector("#closeDeleteModal").click();
    }
  );
}
