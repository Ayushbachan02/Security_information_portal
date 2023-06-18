import {postData } from "./fetch.js";

const data = {
    complaint: "add",
  };
  const complainFrom = document.getElementById("complainFrom");
  const complainFromSubmit = document.getElementById("complainFromSubmit");
  
  // adding event listener to the submit button of add user
  complainFromSubmit.addEventListener("click", (evnt) => {
    // sending post request for gettiing the adduser form submit
    postData("./Actions/insertcomplaint.php", data, diaplayPost, complainFrom);
  });
