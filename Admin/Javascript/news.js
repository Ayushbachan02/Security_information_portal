import { getText, postData } from "./fetch.js";

// function to display get data in arkup
function displayText(text) {
  const userTableContainer = document.getElementById("newstable");
  userTableContainer.innerHTML = text;
  bodyFunc();
}

// function to display post response text
function diaplayPost(data) {
  console.log(data);
  console.log("Actual message to show user = ", data.message);
}

// sending get request for getting user data list
getText("./Actions/news_display_handle.php", displayText);

//
const data = {
  addnews: true,
};
const addnewsForm = document.getElementById("addnewsForm");
const addnewsSubmit = document.getElementById("addnewsSubmit");

// adding event listener to the submit button of add user
addnewsSubmit.addEventListener("click", (evnt) => {
  // sending post request for gettiing the adduser form submit
  postData("./Actions/add_news.php", data, diaplayPost, addnewsForm);
});

//function to edit the news_list

function displayEdit(data) {
  let title = data.title;
  let news = data.news;
  document.querySelector("#titleEdit").value = title;
  document.querySelector("#newsEdit").value = news;
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
      postData("./Actions/edit_news.php", editData, displayEdit, addnewsForm);
    });
  });
}
const data1 = {
  editnews: true,
};
const editnewsForm = document.getElementById("editnewsForm");
const editnewsSubmit = document.getElementById("editnewsSubmit");

// adding event listener to the submit button of add user
editnewsSubmit.addEventListener("click", (evnt) => {
  // sending post request for gettiing the adduser form submit
  postData("./Actions/add_news.php", data1, diaplayPost, editnewsForm);
});
