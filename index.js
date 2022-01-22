const seeMoreMatchBtn = document.querySelector("#see-more-latest-match-main")

seeMoreMatchBtn.addEventListener('click',()=>{
    console.log(seeMoreMatchBtn.parentNode.parentNode.childNodes[3])
    const allMatches = document.querySelector("#all-matches")
    seeMoreMatchBtn.parentNode.parentNode.style.display = 'none'
    allMatches.style.display = 'flex'
})

