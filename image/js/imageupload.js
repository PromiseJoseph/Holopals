const inpfile= document.getElementById("inpfile");
const inpText=document.getElementById("inp-text");
const formEl= document.querySelector(".form");
const imgEl= document.querySelector(".image")

// inpfile.addEventListener('change',()=>{
//     const reader=new FileReader();
//     reader.addEventListener('load',()=>{
//        let uploadedimage= reader.result;
//        console.log(uploadedimage);
// body.style.backgroundImage=`url(${uploadedimage})`

//     })
//     reader.readAsDataURL(this.files[0]);
// })
let userEndpoint=""

fetch(userEndpoint)
.then(res=>{
    res.json();
})
.then(data=> {
    console.log
})




formEl.addEventListener("submit",(data)=>{
    data.preventDefault();
    console.log(data)

    
fetch(userEndpoint)
.then(res=>{
    console.log(res)
})
.then(data=> console.log(data))


let formdata= new FormData();
formdata.append("inpfile",inpfile.files[0])
console.log(inpfile.files[0]);
console.log(formdata);
   
    fetch(userEndpoint, {
        method:post,
        body: formdata

    
    }).catch(error);
})
    
    
 