

    let navigation = document.querySelector(".main-menu");
    let navIcon = document.querySelector(".menu-icon");
    let closeIcon = document.querySelector(".close-icon");
    let navWrapper = document.querySelector(".nav-wrapper");
        
    navIcon.addEventListener("click", () => {
        navigation.classList.add("show");
        navWrapper.classList.add("show-wrapper");

    });

    closeIcon.addEventListener("click", ()=> {
        navigation.classList.remove("show");
        navWrapper.classList.remove("show-wrapper");
    })
