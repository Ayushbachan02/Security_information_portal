import { getText, postData } from "./fetch.js";

// function to display get data in arkup
function displayText(text) {
  const userTableContainer = document.getElementById("usertable");
  userTableContainer.innerHTML = text;
  bodyFunc();
}

// function to display post response text
function diaplayPost(data) {
  console.log(data);
  console.log("Actual message to show user = ", data.message);
}

// sending get request for getting user data list
getText("./Actions/user_display_handle.php", displayText);

//
const data = {
  addUser: true,
};
const addUserForm = document.getElementById("addUserForm");
const addUserSubmit = document.getElementById("addUserSubmit");

// adding event listener to the submit button of add user
addUserSubmit.addEventListener("click", (evnt) => {
  // sending post request for gettiing the adduser form submit
  postData("./Actions/add_user.php", data, diaplayPost, addUserForm);
});

//function to edit the user_list

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
  const allEditBtn = document.querySelectorAll(".editBtn");
  console.log(allEditBtn);
  Array.from(allEditBtn).forEach((elem) => {
    elem.addEventListener("click", () => {
      let takenId = parseInt(elem.getAttribute("id_name"));
      let editData = {
        editDataSend: true,
        id_val: takenId,
      };
      postData("./Actions/edit_user.php", editData, displayEdit, edituserForm);
    });
  });
}

