function ToggleSidebar(){
    var btn = document.getElementById("toggle-btn");
    var sidebar = document.getElementById("sidebar");
    var else_div = document.getElementById("else");
    var info_container = document.getElementById("info_container");
    var sidebar_list = document.getElementById("sidebar_list");
    var item = sidebar_list.getElementsByClassName("sidebar-item");
    if(btn.classList[1] == "active"){
        sidebar.style.width = width;
        if(info_container != null) info_container.style.width = "78%";
        if(else_div != null) else_div.style.width = "78%";
        sidebar_list.style.width = "100%"; 
        btn.style.margin = "0";

        setTimeout(() => { 
            for(var i = 0; i < item.length; i++){
                item[i].style.filter = "opacity(100%)";
            }
        }, 450);
    } else {
        for(var i = 0; i < item.length; i++){
            item[i].style.filter = "opacity(0%)";
        }

        setTimeout(() => {
            width = sidebar.style.width;
            sidebar.style.width = "0";
            if(info_container != null) info_container.style.width = "99%";
            if(else_div != null) else_div.style.width = "99%"; 
            sidebar_list.style.width = "1%"; 
            btn.style.margin = "0 1vw";
        }, 450);
    }
}