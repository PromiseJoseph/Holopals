const inpfile= document.getElementById("inpfile");
const inpText=document.getElementById("inp-text");
const formEl= document.querySelector(".form");

console.log(formEl);
formEl.addEventListener('submit',(e)=>{
    e.preventDefault();

    //formdata holds the file tobe passed in the fetch request 
    const formdata=new FormData();

    formdata.append("inpfile",inpfile.files[0])// first argument as name and second argument as the filechosen
    //inpfile.filecontains arrays offile selected


    fetch(endpoint,{
    
        method:"post",
        body:formdata

    }).catch(console.error);

})
