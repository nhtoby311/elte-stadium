const commentBtn = document.querySelector("#comment-btn")

console.log(commentBtn)
commentBtn.addEventListener('click',()=>{
    //console.log(seeMoreMatchBtn.parentNode.parentNode.childNodes[3])
    const cmtForm = document.querySelector("#comment-form")
    commentBtn.style.display = 'none'
    cmtForm.style.display = 'flex'
})