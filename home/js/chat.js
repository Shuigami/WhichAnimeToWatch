function ToggleChat(){
    var chat = document.getElementById("chat");
    var chatImg = document.getElementById("chat-img");
    var chatImgContainer = document.getElementById("chat-img-container");
    var chatContent = document.getElementById("chat-content");

    if(chat.className.includes("not-active")){
        chat.style.borderRadius = "5%";
        chat.style.width = "100vh";
        chat.style.height = "80vh";
        setTimeout(() => {
            chatImg.style.filter = "invert(100%) opacity(0%)";
            chatContent.style.display = "inline";
            setTimeout(() => {
                chatImgContainer.style.display = "none";
                chatContent.style.filter = "opacity(100%)";
                chat.className = chat.className.replace("not-active","active");
            }, 400);
        }, 400);

        return;
    } 

    chatImgContainer.style.display = "inline";
    chatContent.style.filter = "opacity(0%)";
    setTimeout(() => {
        chat.style.height = "15vh";
        chat.style.width = "15vh";
        chat.style.borderRadius = "25%",
        setTimeout(() => {
            chatImg.style.filter = "invert(100%) opacity(100%)";
            chatContent.style.display = "none";
            chat.className = chat.className.replace("active","not-active");
        }, 400);
    }, 400)
}
var opened = false;

function ToggleFriendList() {
    opened = !opened;
    var arrow = document.getElementById("arrow-list");
    if(opened) {
        arrow.style.height = "10vh";
    }
}