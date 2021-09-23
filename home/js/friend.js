function FriendList(id, name, image){
// ===================================== //
    var newLi = document.createElement("li");
    newLi.className = "friend";
// ===================================== //
    var newA = document.createElement("a");
    newA.onclick = function() {setCookie("friend_page_cookie", id, 10)};
    newA.href = "friend_account.php"
// ===================================== //
    var newDiv = document.createElement("div");
    newDiv.className = "friend-image";
// ===================================== //
    var newDiv2 = document.createElement("div");
    newDiv2.className = "friend-image-container";
// ===================================== //
    var newImg = document.createElement("img");
    newImg.src = "data:image/png;base64," + image + "";
// ===================================== //
    var newDiv3 = document.createElement("div");
    newDiv3.className = "friend-username";
// ===================================== //
    var newDiv4 = document.createElement("div");
    newDiv4.className = "delete-button";
// ===================================== //
    var newA2 = document.createElement("a");
    newA2.href = "friend_list.php?friend_deleted="+id;
// ===================================== //
    var newImg2 = document.createElement("img");
    newImg2.className = "blacked";
    newImg2.id = "" + id + "";
    newImg2.src = "../mainimages/bin.png";
// ===================================== //
    var newP = document.createElement("p");
    newP.innerHTML = "" + name + "";
// ===================================== //
    var newDiv5 = document.createElement("div");
    newDiv5.className = "border";
// ===================================== //
    newDiv3.appendChild(newP);
    newDiv2.appendChild(newImg);
    newDiv.appendChild(newDiv2);
    newA.appendChild(newDiv);
    newA.appendChild(newDiv3);
    newA2.appendChild(newImg2);
    newDiv4.appendChild(newA2);
    newLi.appendChild(newA);
    newLi.appendChild(newDiv4);
    newLi.appendChild(newDiv5);
// ===================================== //
    var FriendUl = document.getElementById("friends-list")
    FriendUl.appendChild(newLi);
}

function FriendListInFriendPage(id, name, image){
// ===================================== //
    var newLi = document.createElement("li");
    newLi.className = "friend";
// ===================================== //
    var newA = document.createElement("a");
    newA.onclick = function() {setCookie("friend_page_cookie", id, 10)};
    newA.href = "friend_account.php"
// ===================================== //
    var newDiv = document.createElement("div");
    newDiv.className = "friend-image";
// ===================================== //
    var newDiv2 = document.createElement("div");
    newDiv2.className = "friend-image-container";
// ===================================== //
    var newImg = document.createElement("img");
    newImg.src = "data:image/png;base64," + image + "";
// ===================================== //
    var newDiv3 = document.createElement("div");
    newDiv3.className = "friend-username";
// ===================================== //
    var newImg2 = document.createElement("img");
    newImg2.className = "blacked";
    newImg2.id = "" + id + "";
    newImg2.src = "../mainimages/bin.png";
// ===================================== //
    var newP = document.createElement("p");
    newP.innerHTML = "" + name + "";
// ===================================== //
    newDiv3.appendChild(newP);
    newDiv2.appendChild(newImg);
    newDiv.appendChild(newDiv2);
    newA.appendChild(newDiv);
    newA.appendChild(newDiv3);
    newLi.appendChild(newA);
// ===================================== //
    var FriendUl = document.getElementById("friends-list")
    FriendUl.appendChild(newLi);
}

function setCookie(name, value, hours) {
    var expires;
    if (hours) {
        var date = new Date();
        date.setTime(date.getTime() + (hours * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
    getCookie(name)
}


function getCookie(c_name) {
    if (document.cookie.length > 0) {
        console.log(document.cookie);
    }
}

function eraseCookie(name) {   
    setCookie(name, '', -1)
}

function IsFriend(string, number) {
    var add_btn = document.getElementById('add_btn');
    var array = string.split(" , ");
    console.log(array);
    if(array.includes(number)){
        add_btn.classList.toggle('added');
    }
}