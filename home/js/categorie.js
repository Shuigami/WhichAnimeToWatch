function transitionToPage (href, elem) {
    var img_container = elem.parentNode;
    var categorie = img_container.parentNode;
    categorie.style.backgroundColor = "var(--text-title)";
    setTimeout(function() { 
        window.location.href = href
    }, 300)
}
// ============================== 1 ============================== //
CreateCategory("7seeds", 1)
CreateCategory("AssassinationClassroom", 1)
CreateCategory("SNK", 1)
CreateCategory("BtheBeginning", 1)
CreateCategory("CautiousHero", 1)
CreateCategory("DemonSlayer", 1)
CreateCategory("DrStone", 1)
CreateCategory("FairyTail", 1)
CreateCategory("FireForce", 1)
CreateCategory("GoblinSlayer", 1)
CreateCategory("Haikyu", 1)
CreateCategory("HxH", 1)
CreateCategory("JujutsuKaisen", 1)
CreateCategory("KurokoBasket", 1)
CreateCategory("MHA", 1)
CreateCategory("OnePiece", 1)
CreateCategory("ThePromisedNeverland", 1)
CreateCategory("ShieldHero", 1)
CreateCategory("TokyoRevengers", 1)
CreateCategory("VinlandSaga", 1)
CreateCategory("Parasyte", 1)
CreateCategory("NoGameNoLife", 1)
CreateCategory("SAO", 1)
CreateCategory("DeathNote", 1)
CreateCategory("SamuraiChamploo", 1)

// ============================== 2 ============================== //
CreateCategory("Nagatoro", 2)
CreateCategory("IWantToEatYourPancreas", 2)
CreateCategory("YourLieInApril", 2)
CreateCategory("YourName", 2)
CreateCategory("Steins;Gate", 2)
CreateCategory("VioletEvergarden", 2)

// ============================== 3 ============================== //
CreateCategory("7seeds", 3)
CreateCategory("BtheBeginning", 3)
CreateCategory("CautiousHero", 3)
CreateCategory("GoblinSlayer", 3)
CreateCategory("ShieldHero", 3)
CreateCategory("CaroleAndTuesday", 3)
CreateCategory("IWantToEatYourPancreas", 3)
CreateCategory("SamuraiChamploo", 3)
CreateCategory("Steins;Gate", 3)

// ============================== 4 ============================== //
CreateCategory("DemonSlayer", 4)
CreateCategory("DrStone", 4)
CreateCategory("FireForce", 4)
CreateCategory("JujutsuKaisen", 4)
CreateCategory("ThePromisedNeverland",4)
CreateCategory("TokyoRevengers", 4)
CreateCategory("VinlandSaga", 4)
CreateCategory("Nagatoro", 4)

// ============================== 5 ============================== //
CreateCategory("Erased", 5)
CreateCategory("IWantToEatYourPancreas", 5)
CreateCategory("YourLieInApril", 5)
CreateCategory("YourName", 5)
CreateCategory("VioletEvergarden", 5)

// ============================== 6 ============================== //
CreateCategory("AssassinationClassroom", 6)
CreateCategory("SNK", 6)
CreateCategory("DemonSlayer", 6)
CreateCategory("FairyTail", 6)
CreateCategory("HxH", 6)
CreateCategory("MHA", 6)
CreateCategory("OnePiece", 6)
CreateCategory("SAO", 6)
CreateCategory("DeathNote", 6)

// ============================== 7 ============================== //
CreateCategory("Haikyu", 7)
CreateCategory("KurokoBasket", 7)
CreateCategory("CaroleAndTuesday", 7)
CreateCategory("FoodWars", 7)
CreateCategory("YourLieInApril", 7)

// ============================== 8 ============================== //
CreateCategory("CautiousHero", 8)
CreateCategory("ShieldHero", 8)
CreateCategory("NoGameNoLife", 8)
CreateCategory("SAO", 8)

// ============================== 9 ============================== //
CreateCategory("BtheBeginning", 9)
CreateCategory("Parasyte", 9)
CreateCategory("DeathNote", 9)
CreateCategory("Steins;Gate", 9)

// ============================== A1 ============================== //

function CreateCategory(source, number){
    var goodcategorie = document.getElementById("categories " + number);
    if(goodcategorie == null) return;
    var name;
    if(source == "7seeds" || source == "../7seeds"){name = "7 seeds"}
    if(source == "AssassinationClassroom" || source == "../AssassinationClassroom"){name = "Assassination Classroom"}
    if(source == "SNK" || source == "../SNK"){name = "Attack on titans"}
    if(source == "BtheBeginning" || source == "../BtheBeginning"){name = "B the Beginning"}
    if(source == "CautiousHero" || source == "../CautiousHero"){name = "Cautious Hero"}
    if(source == "DemonSlayer" || source == "../DemonSlayer"){name = "Demon Slayer"}
    if(source == "DrStone" || source == "../DrStone"){name = "Dr Stone"}
    if(source == "FairyTail" || source == "../FairyTail"){name = "Fairy Tail"}
    if(source == "FireForce" || source == "../FireForce"){name = "Fire Force"}
    if(source == "GoblinSlayer" || source == "../GoblinSlayer"){name = "Goblin Slayer"}
    if(source == "Haikyu" || source == "../Haikyu"){name = "Haikyū!!"}
    if(source == "HxH" || source == "../HxH"){name = "Hunter x Hunter"}
    if(source == "JujutsuKaisen" || source == "../JujutsuKaisen"){name = "Jujutsu Kaisen"}
    if(source == "KurokoBasket" || source == "../KurokoBasket"){name = "Kuroko Basket"}
    if(source == "MHA" || source == "../MHA"){name = "My Hero Academia"}
    if(source == "OnePiece" || source == "../OnePiece"){name = "One Piece"}
    if(source == "ThePromisedNeverland" || source == "../ThePromisedNeverland"){name = "The Promised Neverland"}
    if(source == "ShieldHero" || source == "../ShieldHero"){name = "The Rising of Shield Hero"}
    if(source == "TokyoRevengers" || source == "../TokyoRevengers"){name = "Tokyo Revengers"}
    if(source == "VinlandSaga" || source == "../VinlandSaga"){name = "Vinland Saga"}
    if(source == "Parasyte" || source == "../Parasyte"){name = "Parasyte"}
    if(source == "NoGameNoLife" || source == "../NoGameNoLife"){name = "No Game No Life"}
    if(source == "SAO" || source == "../SAO"){name = "Sword Art Online"}
    if(source == "CaroleAndTuesday" || source == "../CaroleAndTuesday"){name = "Carole And Tuesday"}
    if(source == "Nagatoro" || source == "../Nagatoro"){name = "Don't Toy With Me, Miss Nagatoro"}
    if(source == "Erased" || source == "../Erased"){name = "Erased"}
    if(source == "FoodWars" || source == "../FoodWars"){name = "Food Wars"}
    if(source == "IWantToEatYourPancreas" || source == "../IWantToEatYourPancreas"){name = "I want to eat your pancreas"}
    if(source == "YourLieInApril" || source == "../YourLieInApril"){name = "Your Lie In April"}
    if(source == "YourName" || source == "../YourName"){name = "Your Name"}
    if(source == "DeathNote" || source == "../DeathNote"){name = "Death Note"}
    if(source == "SamuraiChamploo" || source == "../SamuraiChamploo"){name = "Samurai Champloo"}
    if(source == "Steins;Gate" || source == "../Steins;Gate"){name = "Steins;Gate"}
    if(source == "VioletEvergarden" || source == "../VioletEvergarden"){name = "Violet Evergarden"}
// ===================================== //
    var newLi = document.createElement("li");
    newLi.className = "categorie";
// ===================================== //
    var newCategory = document.createElement("div");
    newCategory.className = "image-container";
// ===================================== //
    var newSpan = document.createElement("span");
    newSpan.className = "image-span";
    // ===================================== //
    var newCategory3 = document.createElement("div");
    newCategory3.className = "spawn";
    // ===================================== //
    var newImg = document.createElement("img");
    newImg.src = "" + source + "/images/icon.jpg";
// ===================================== //
    newSpan.appendChild(newImg);
    newCategory.appendChild(newSpan);
    newCategory.appendChild(newCategory3);
    newLi.appendChild(newCategory);
// ===================================== //
    var newCategory2 = document.createElement("div");
    newCategory2.className = "title-container-categorie";
// ===================================== //
    var newP = document.createElement("p");
    newP.innerHTML = "" + name + "";
// ===================================== //
    newCategory2.appendChild(newP);
    newLi.appendChild(newCategory2);

    goodcategorie.appendChild(newLi);
    if(!source.includes("../")){
        var link = "'" + source + "/" + source + ".php" + "'";
        newSpan.setAttribute('onclick','transitionToPage(' + link + ', this)') ;
    } else {
        var source_split = source.split("/");
        var link2 =  "'" + source + "/" + source_split[1] + ".php" + "'";
        newSpan.setAttribute('onclick','transitionToPage(' + link2 + ', this)') ;
    }
}





function favorites(src){
    console.log(src);
}

indexCat = 0;
var numberCat;
var widthCat;
var allul = 0;


getAllul()
resize()
shufflecon()

categorieShow(0, 1)
categorieShow(0, 2)
categorieShow(0, 3)
categorieShow(0, 4)
categorieShow(0, 5)
categorieShow(0, 6)
categorieShow(0, 7)
categorieShow(0, 8)
categorieShow(0, 9)

window.onresize = function() {resize()}

function resize(){
    categorieReset()
    var w = window.outerWidth;
    numberCat = 5;
    if (w >= 768) {numberCat = 4}
    if (w >= 992) {numberCat = 5}
    if (w >= 1200) {numberCat = 9}

    widthCat = -26
    if (w >= 768) {widthCat = -26}
    if (w >= 992) {widthCat = -20}
    if (w >= 1200) {widthCat = -10}
}

function getAllul(){
    ul = document.getElementsByClassName('categories');
    allul = ul.length;
    shufflecat(allul);
}

function shufflecat(n){
    for(j = 1; j <= n; j++){
        var test = "categories " + j;
        test2 = document.getElementById(test)
        for (var i = test2.children.length; i >= 0; i--) {
            test2.appendChild(test2.children[Math.random() * i | 0]);
        }
    }    
}

function shufflecon(){
    var ulcont = document.getElementById('container-container');
    if(ulcont == null) return;
    for (var i = ulcont.children.length; i >= 0; i--) {
        ulcont.appendChild(ulcont.children[Math.random() * i | 0]);
    }
}

function categorieShow(signe, catename){
    var name = "categories " + catename;
    ul = document.getElementById(name);
    if(ul == null) return;
    li = ul.getElementsByClassName('categorie');
    var max = li.length - numberCat;

    next = document.getElementById('next-cat ' + catename);
    prev = document.getElementById('prev-cat ' + catename);

    if(li.length <= numberCat) {
        next.style.display = "none";
        prev.style.display = "none";
        return
    }
    else if(signe <= 0){
        ul.style.transform = "translateX(" + 0 + "vw)";
        next.style.display = "inline";
        prev.style.display = "none";
        indexCat = 0;
        return;
    }
    else if(signe >= max){
        next.style.display = "none";
        prev.style.display = "inline";
        indexCat = max;
    }
    else{
        next.style.display = "inline";
        prev.style.display = "inline";
    }
    ul.style.transform = "translateX("+ widthCat * indexCat + "vw)";
}

function categorieReset(){
    ul = document.getElementsByClassName('categories')
    for(i = 0; i < ul.length; i++){
        ul[i].style.transform = "translateX(0)"
    }
}
function categoriePlus(n, b){
    categorieShow(indexCat = indexCat + n, b);
}