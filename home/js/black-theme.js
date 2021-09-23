var isBlack;
DONOnLoad()

function DayOrNight(){
    var element = document.body;
    var icons = document.getElementsByClassName("settings-item");
    var imgAccount = document.getElementsByClassName("account-img-setting");
    var settingLogo = document.getElementsByClassName("setting-logo");
    var blacked = document.getElementsByClassName("blacked");
    isBlack = !isBlack;
    if(isBlack == true){
        element.classList.toggle("dark-mode", true);
        for (var i = 0; i < icons.length; i++) {
            icons[i].style.filter = "invert(100%)"
        }
        for (var i = 0; i < imgAccount.length; i++) {
            imgAccount[i].style.filter = "invert(100%)"
        }
        for (var i = 0; i < settingLogo.length; i++) {
            settingLogo[i].style.filter = "invert(100%)"
        }
        for (var i = 0; i < blacked.length; i++) {
            blacked[i].style.filter = "invert(100%)"
        }
    }
    else{
        element.classList.toggle("dark-mode", false);
        for (var i = 0; i < icons.length; i++) {
            icons[i].style.filter = "invert(0%)"
        }
        for (var i = 0; i < imgAccount.length; i++) {
            imgAccount[i].style.filter = "invert(0%)"
        }
        for (var i = 0; i < settingLogo.length; i++) {
            settingLogo[i].style.filter = "invert(0%)"
        }
        for (var i = 0; i < blacked.length; i++) {
            blacked[i].style.filter = "invert(0%)"
        }
    }
    localStorage.setItem("storageIsBlack",isBlack);
}

function DONOnLoad(){
    setTimeout(() => {
        var element = document.body;
        var icons = document.getElementsByClassName("settings-item");
        var imgAccount = document.getElementsByClassName("account-img-setting");
        var settingLogo = document.getElementsByClassName("setting-logo");
        var blacked = document.getElementsByClassName("blacked");
        var isBlackOnLoad = localStorage.getItem("storageIsBlack");
        if(isBlackOnLoad == null) return
        if(isBlackOnLoad == "true"){
            isBlack = true;
            element.classList.toggle("dark-mode", true);
            for (var i = 0; i < icons.length; i++) {
                icons[i].style.filter = "invert(100%)"
            }
            for (var i = 0; i < imgAccount.length; i++) {
                imgAccount[i].style.filter = "invert(100%)"
            }
            for (var i = 0; i < settingLogo.length; i++) {
                settingLogo[i].style.filter = "invert(100%)"
            }
            for (var i = 0; i < blacked.length; i++) {
                blacked[i].style.filter = "invert(100%)"
            }
        }
        else{
            isBlack = false;
            element.classList.toggle("dark-mode", false);
            for (var i = 0; i < icons.length; i++) {
                icons[i].style.filter = "invert(0%)"
            }
            for (var i = 0; i < imgAccount.length; i++) {
                imgAccount[i].style.filter = "invert(0%)"
            }
            for (var i = 0; i < settingLogo.length; i++) {
                settingLogo[i].style.filter = "invert(0%)"
            }
            for (var i = 0; i < blacked.length; i++) {
                blacked[i].style.filter = "invert(0%)"
            }
        }
    }, 5);
}