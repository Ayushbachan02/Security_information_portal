import { getText, postData } from "./fetch.js";

// function to display get data in arkup
function displayText(text) {
  const userTableContainer = document.getElementById("newstable");
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
  getText("./Actions/news_display_handle.php", displayText);
}

// sending get request for getting user data list
getText("./Actions/news_display_handle.php", displayText);

//
const data = {
  checkNews: "add",
};
const addnewsForm = document.getElementById("addnewsForm");
const addnewsSubmit = document.getElementById("addnewsSubmit");

// adding event listener to the submit button of add user
addnewsSubmit.addEventListener("click", (evnt) => {
  // sending post request for gettiing the adduser form submit
  postData("./Actions/add_news.php", data, diaplayPost, addnewsForm);
  document.querySelector("#closeaddModal").click();
});

//function to edit the news_list

function displayEdit(data) {
  let title = data.title;
  let news = data.news;
  document.querySelector("#titleEdit").value = title;
  document.querySelector("#newsEdit").value = news;
}

function bodyFunc() {
  const editnewsForm = document.getElementById("editnewsForm");
  const editnewsSubmit = document.getElementById("editnewsSubmit");

  const allEditBtn = document.querySelectorAll(".editBtn");
  const saveChangeSubmit=document.querySelector("#editnewsSubmit");


  Array.from(allEditBtn).forEach((elem) => {
    elem.addEventListener("click", () => {
      let takenId = parseInt(elem.getAttribute("id_name"));
      let editData = {
        editDataSend: true,
        id_val: takenId,
      };
      saveChangeSubmit.setAttribute("idToEdit",takenId);
      postData("./Actions/edit_news.php", editData, displayEdit, addnewsForm);
    });
  });

  
  // adding event listener to the submit button of add user
  editnewsSubmit.addEventListener("click", (evnt) => {
    // sending post request for gettiing the adduser form submit
    let idToSend = parseInt(saveChangeSubmit.getAttribute("idToEdit"));
    console.log("edit id = ",idToSend);

    let dataToFindEdit={
      checkNews:"edit",
      "editThisId":idToSend
    }
    postData("./Actions/add_news.php", dataToFindEdit, displayEditMessage, editnewsForm);
    document.querySelector("#closeEditModal").click();
  });
}

// function to delete the video_list
function displayDelete() {
  const deletenewsForm = document.getElementById("deletenewsForm");
  const deletenewsSubmit = document.getElementById("deletenewsSubmit");

  const allEditBtn = document.querySelectorAll(".editBtn");
  const saveChangeSubmit=document.querySelector("#deletenewsSubmit");

  Array.from(allEditBtn).forEach((elem) => {
      elem.addEventListener("click", () => {
          let takenId = parseInt(elem.getAttribute("id_name"));
          let editData = {
          editDataSend: true,
          id_val: takenId,
          };
          saveChangeSubmit.setAttribute("idToDelete",takenId);
          postData("./Actions/edit_news.php", editData, displayEdit, addnewsForm);
      });
      }
  );
  // adding event listener to the submit button of add user
  deletenewsSubmit.addEventListener("click", (evnt) => {
      // sending post request for gettiing the adduser form submit
      let idToSend = parseInt(saveChangeSubmit.getAttribute("idToDelete"));
      console.log("edit id = ",idToSend);
  
      let dataToFindEdit={
        checkNews:"delete",
        "deleteThisId":idToSend
      }
      postData("./Actions/add_news.php", dataToFindEdit, displayEditMessage, deletenewsForm);
      document.querySelector("#closeDeleteModal").click();
    }
  );
}
