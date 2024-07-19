document.addEventListener('DOMContentLoaded', () => {
    // console.log('loaded')
    const openModalBtn = document.querySelectorAll('.open-modal')
    const modalEl = document.querySelector('.wp-block-udemy-plus-auth-modal')

    const modalCloseEl = document.querySelectorAll(
        '.modal-overlay, .modal-btn-close'
   )
    openModalBtn.forEach(element => {
            element.addEventListener('click', event => {
                // console.log('clicked')
                event.preventDefault()
                modalEl.classList.add('modal-show')

        })
    });

    modalCloseEl.forEach(element => {
        element.addEventListener('click', event => {
            // console.log('clicked')
            event.preventDefault()
            modalEl.classList.remove('modal-show')

        })
    });

    const tabs = document.querySelectorAll('.tabs a')
    const signinForm = document.querySelector('#signin-tab')
    const signupForm = document.querySelector('#signup-tab')
    tabs.forEach( tab => {
        tab.addEventListener('click' , event => {
            event.preventDefault()
            tabs.forEach(currentTab => {
                currentTab.classList.remove('active-tab')
            })
            event.currentTarget.classList.add('active-tab')
            const activeTab = event.currentTarget.getAttribute('href')

            if(activeTab === '#signin-tab'){
                signinForm.style.display = 'block'
                signupForm.style.display = 'none'
            }else {
                signinForm.style.display = 'none'
                signupForm.style.display = 'block'
            }
            console.log(event.currentTarget)
        })
    })
})