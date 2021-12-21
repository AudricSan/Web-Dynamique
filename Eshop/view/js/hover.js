const imgarr = Array.from(document.getElementsByClassName('img'))
// console.log(imgarr)

imgarr.forEach(e => {
    console.log(e)
    e.addEventListener('click', event => {
        console.log('COUCOU')
        let prix = e.previousSibling
        let desc = prix.previousSibling


        prix.classList.add('visible')
        desc.classList.add('visible')

        console.log(prix)
        console.log(desc)

        setTimeout(function(){
            prix.classList.remove('visible')
            desc.classList.remove('visible')
        }, 5000)
    });
})

// imgarr.forEach(e => {
//     console.log(e)
//     e.addEventListener('mouseover', event => {
//         console.log('COUCOU')
//         let prix = e.previousSibling
//         let desc = prix.previousSibling


//         prix.classList.add('visible')
//         desc.classList.add('visible')

//         console.log(prix)
//         console.log(desc)

//         setTimeout(function(){
//             prix.classList.remove('visible')
//             desc.classList.remove('visible')
//         }, 5000)
//     });
// })
