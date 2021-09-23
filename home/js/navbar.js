function pickRandom() {
    var ul = document.getElementById('bonne-ul')
    var navitems = ul.getElementsByClassName("nav-item");
    var display = []

    for (var i = ul.children.length; i >= 0; i--) {
        ul.appendChild(ul.children[Math.random() * i | 0]);
    }

    while(true){
        var itemnumber = [Math.floor(Math.random() * navitems.length)];
        if(display.indexOf(itemnumber[0]) == -1){ //pas dans la liste
            display.push(itemnumber[0]);
            navitems[itemnumber[0]].style.display = 'inline';
        } 
        if(display.length >= 9) break;
    }
}