//for spotlight effect
const spotlights = document.querySelectorAll('.spotlight-light');

window.addEventListener('mousemove', function (e) {
    const x = e.pageX;
    const y = e.pageY - window.scrollY;

    for (let i = 0; i < spotlights.length; i++) {
        const rect = spotlights[i].getBoundingClientRect();
        const xPos = ((x - rect.left) / rect.width) * 100;
        const yPos = ((y - rect.top) / rect.height) * 100;
        spotlights[i].style.webkitMaskImage = `radial-gradient(circle at ${xPos}% ${yPos}%, #fff 5em, transparent 30em)`;
    }
});

//for searc

$(document).ready(function(){
    $("#search").on("keyup", function() {
        //checks if the search field is empty or not
        var value = $(this).val().toLowerCase();

        $("#cardHolder .card").each(function() {
            var card = $(this);
            var isSearchMatch = 
                card.find("#productLabel").text().toLowerCase().indexOf(value) > -1 ||
                card.find("#productDesc").text().toLowerCase().indexOf(value) > -1 || 
                card.find("img").attr('alt').toLowerCase().indexOf(value) > -1;

            card.parent().toggle(isSearchMatch);
        });
    });
});


//for Login

let warningText = document.getElementById("warningTextLogIn");
const testName = "asdfasdf";

function checkLogIn() {
    let username = document.getElementById("inputUserName").value;

    ChangeText(warningText, "Username or Password Incorrect.");
}

function checkSignUp() {
    let username = document.getElementById("inputUserName").value;
    let password = document.getElementById("inputPassword").value;
    let repeatPassword = document.getElementById("inputRepeatPassword").value;

    userNameHasSpecialCharacter = HasSpecialCharacter(username);
    userNameExceedsCharacters = IsExceedCharacter(username, 8);


    if (username == "") {
        ChangeText(warningText, "Username can't be empty.");
        return;
    } else if (username.toLowerCase() == testName.toLowerCase()) {
        //check here if username is taken
        ChangeText(warningText, "Username is taken.");
        return;
    }
    
    if (userNameHasSpecialCharacter && userNameExceedsCharacters) {
        ChangeText(warningText, "The username must be atleast 8 characters and must not contain special character/s");
        return;
    } else if (userNameHasSpecialCharacter) {
        ChangeText(warningText, "must not contain special character/s or spaces.");
        return;
    } else if (userNameExceedsCharacters) {
        ChangeText(warningText, "The username must be atleast 8 characters.");
        return;
    }
    
    if (password == "") {
        ChangeText(warningText, "Password can't be empty.");
        return;
    } else if(IsExceedCharacter(password,8)){
        ChangeText(warningText, "Password must be atleast 8 characters.");
        return;
    }

    if(password != repeatPassword){
        ChangeText(warningText, "Password did not match.");
        return;
    }

    ChangeText(warningText, "ACCOUNT CREATED");
    //add account to database
}


function HasSpecialCharacter(text) {
    let normalCharacters = /^[A-Za-z0-9]+$/;

    return !normalCharacters.test(text);
}

function IsExceedCharacter(text, max) {
    let v = text.length;
    if (v >= max) {
        return false;
    } else {
        return true;
    }
}

function ChangeText(textHolder, textString) {

    textHolder.style.display = "block";
    textHolder.innerHTML = textString;
}