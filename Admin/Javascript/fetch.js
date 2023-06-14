export async function getText(file, callback) {
    let myObject = await fetch(file);
    let myText = await myObject.text();
    callback(myText);
  }



  // reference from MDN doc #sksham
export function postData(url,data,callback,form) {
  const XHR = new XMLHttpRequest();
  const FD = new FormData(form);

  // Push our data into our FormData object
  for (const [name, value] of Object.entries(data)) {
    FD.append(name, value);
  }

  // Define what happens on successful data submission
  XHR.addEventListener("load", (event) => {
    callback(JSON.parse(XHR.responseText))
  });

  // Define what happens in case of an error
  XHR.addEventListener("error", (event) => {
    console.log("Oops! Something went wrong.");
  });

  // Set up our request
  XHR.open("POST", url);

  // Send our FormData object; HTTP headers are set automatically
  XHR.send(FD);
}