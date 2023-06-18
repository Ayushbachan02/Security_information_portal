import { getText, postData } from "./fetch.js";

// function to display get data in arkup
function displayText(text) {
  const userTableContainer = document.getElementById("usertable");
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
  getText("./Actions/user_display_handle.php", displayText);
}

// sending get request for getting user data list
getText("./Actions/user_display_handle.php", displayText);

//
const data = {
  user: "add",
};
const adduserForm = document.getElementById("adduserForm");
const adduserSubmit = document.getElementById("adduserSubmit");

// adding event listener to the submit button of add user
adduserSubmit.addEventListener("click", (evnt) => {
  // sending post request for gettiing the adduser form submit
  postData("./Actions/add_user.php", data, diaplayPost, adduserForm);
  document.querySelector("#closeaddModal").click();
});

//function to edit the news_list

function displayEdit(data) {
  let name = data.name;
  let email = data.email;
  let password = data.password;
  let user_type = data.user_type;
  document.querySelector("#editname").value = name;
  document.querySelector("#editemail").value = email;
  document.querySelector("#editpassword").value = password;
  document.querySelector("#edituser_type").value = user_type;

}

function bodyFunc() {
  const edituserForm = document.getElementById("edituserForm");
  const edituserSubmit = document.getElementById("edituserSubmit");

  const allEditBtn = document.querySelectorAll(".editBtn");
  const saveChangeSubmit=document.querySelector("#edituserSubmit");


  Array.from(allEditBtn).forEach((elem) => {
    elem.addEventListener("click", () => {
      let takenId = parseInt(elem.getAttribute("id_name"));
      let editData = {
        editDataSend: true,
        id_val: takenId,
      };
      saveChangeSubmit.setAttribute("idToEdit",takenId);
      postData("./Actions/edit_user.php", editData, displayEdit, adduserForm);
    });
  });

  
  // adding event listener to the submit button of add user
  edituserSubmit.addEventListener("click", (evnt) => {
    // sending post request for gettiing the adduser form submit
    let idToSend = parseInt(saveChangeSubmit.getAttribute("idToEdit"));
    console.log("edit id = ",idToSend);

    let dataToFindEdit={
      user:"edit",
      "editThisId":idToSend
    }
    postData("./Actions/add_user.php", dataToFindEdit, displayEditMessage, edituserForm);
    document.querySelector("#closeEditModal").click();
  });
}

// function to delete the video_list
function displayDelete() {
  const deleteuserForm = document.getElementById("deleteuserForm");
  const deleteuserSubmit = document.getElementById("deleteuserSubmit");

  const allEditBtn = document.querySelectorAll(".editBtn");
  const saveChangeSubmit=document.querySelector("#deleteuserSubmit");

  Array.from(allEditBtn).forEach((elem) => {
      elem.addEventListener("click", () => {
          let takenId = parseInt(elem.getAttribute("id_name"));
          let editData = {
          editDataSend: true,
          id_val: takenId,
          };
          saveChangeSubmit.setAttribute("idToDelete",takenId);
          postData("./Actions/edit_user.php", editData, displayEdit, adduserForm);
      });
      }
  );
  // adding event listener to the submit button of add user
  deleteuserSubmit.addEventListener("click", (evnt) => {
      // sending post request for gettiing the adduser form submit
      let idToSend = parseInt(saveChangeSubmit.getAttribute("idToDelete"));
      console.log("edit id = ",idToSend);
  
      let dataToFindEdit={
        user:"delete",
        "deleteThisId":idToSend
      }
      postData("./Actions/add_user.php", dataToFindEdit, displayEditMessage, deleteuserForm);
      document.querySelector("#closeDeleteModal").click();
    }
  );
}