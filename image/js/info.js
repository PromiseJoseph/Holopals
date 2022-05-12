
const copyrightEl = document.querySelector(".copyright");
const FeedDteEl= document.querySelector("#feedDate");
let date = new Date();

let year=date.getFullYear();
let month = date.getMonth();
let hour= date.getHours();
let min= date.getHours();

console.log(date,year,month,hour,min);
FeedDteEl.innerHTML=`${month}-${hour}-${min}`;
  copyrightEl.innerHTML = `&copy;  2022 - ${year}`;
 
  let formEl= document.getElementByTag("form");
  console.log(formEl)

  formEl.addEventListener("submit", (e)=>{
  	e.preventDefault();
  })