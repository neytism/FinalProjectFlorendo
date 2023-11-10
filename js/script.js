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

//for search
$(document).ready(function(){
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();

        $(".cardHolder").each(function() {
            var card = $(this);
            var listName = card.find(".name").text().toLowerCase();
            var listLabel = card.find(".alt").text().toLowerCase();
            var listDesc = card.find(".description").text().toLowerCase();

            var isSearchMatch = (listName.indexOf(value) > -1) ||
                               (listLabel.indexOf(value) > -1) ||
                               (listDesc.indexOf(value) > -1);

            card.toggle(isSearchMatch);
        });
    });
});

//for Login
function checkLogin(event) {
    event.preventDefault();
  
    let warningText = document.getElementById("warningTextLogIn");

    let uname = document.getElementById("inputUserName").value;
    let pword = document.getElementById("inputPassword").value;
  
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'loginAction.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        
        if(this.responseText == "success"){

            ChangeText(warningText, "Redirecting you to home page...", "rgba(37, 255, 37, 0.13)");
            setTimeout(function(){
                document.location.href = '../index.php';
           }, 2000); 

        } else{
            ChangeText(warningText, this.responseText,"rgba(255, 37, 37, 0.13)");
        }
    };

    xhr.send('uname=' + uname + '&pword=' + pword);

  };

  //for Signup
function checkSignUp(event) {
    event.preventDefault();
    
    let warningText = document.getElementById("warningTextLogIn");
    
    let username = document.getElementById("inputUserName").value;
    let firstName = document.getElementById("inputFirstName").value;
    let lastName = document.getElementById("inputLastName").value;
    let email = document.getElementById("inputEmail").value;
    let phone = document.getElementById("inputPhone").value;
    let address = document.getElementById("inputAddress").value;
    let password = document.getElementById("inputPassword").value;
    let repeatPassword = document.getElementById("inputRepeatPassword").value;
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'signupAction.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        
        if(this.responseText == "success"){
            ChangeText(warningText, this.responseText, "rgba(37, 255, 37, 0.13)");
            setTimeout(function(){
                document.location.href = 'login.php';
           },2000); 
        
        } else{
            ChangeText(warningText, this.responseText, "rgba(255, 37, 37, 0.13)");
        }
    };
    
    xhr.send('uname=' + username + '&fname=' + firstName + '&lname=' + lastName + '&email=' + email + '&phone=' + phone + '&address=' + address + '&pword=' + password + '&rpword=' + repeatPassword);

}

  //for inquiry
  function checkInquiry(event) {
    event.preventDefault();
    
    let warningText = document.getElementById("warningTextLogIn");
    
    let firstName = document.getElementById("inputFirstName").value;
    let lastName = document.getElementById("inputLastName").value;
    let email = document.getElementById("inputEmail").value;
    let phone = document.getElementById("inputPhone").value;
    let concern = document.getElementById("inputConcern").value;
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'customerCareAction.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        
        if(this.responseText == "success"){
            ChangeText(warningText, "inquiry sent, redirecting to home...", "rgba(37, 255, 37, 0.13)");
            setTimeout(function(){
                document.location.href = '../index.php';
           },2000); 
        
        } else{
            ChangeText(warningText, this.responseText, "rgba(255, 37, 37, 0.13)");
        }
    };
    
    xhr.send('fname=' + firstName + '&lname=' + lastName + '&email=' + email + '&phone=' + phone + '&concern=' + concern);

}

//add product
function checkAddProd(event, phpFile, itemID) {
    event.preventDefault();

    let warningText = document.getElementById("warningText");
    
    let itemName = document.getElementById("inputItemName").value;
    let itemDesc = document.getElementById("inputItemDescription").value;
    let itemImage = document.getElementById("inputItemImage").files[0];
    let itemPrice = document.getElementById("inputItemPrice").value;
    let itemStock = document.getElementById("inputItemStock").value;

    let formData = new FormData();
    formData.append('itemName', itemName);
    formData.append('itemDesc', itemDesc);
    formData.append('itemImage', itemImage);
    formData.append('itemPrice', itemPrice);
    formData.append('itemStock', itemStock);
    if (itemID) {
        formData.append('itemID', itemID)
    }
    

    var xhr = new XMLHttpRequest();
    xhr.open('POST', phpFile, true);
    xhr.onload = function() {
        console.log(this.responseText);
        if(this.responseText.trim() == "success"){
            
            ChangeText(warningText, this.responseText, "rgba(37, 255, 37, 0.13)");
            setTimeout(function(){
                document.location.href = 'productList.php';
           },2000); 
        } else{
            ChangeText(warningText, this.responseText, "rgba(255, 37, 37, 0.13)");
        }
    };

    xhr.send(formData);
}

//add to cart
function addToCart(event, itemID) {
    event.preventDefault();

    var element = document.getElementById("notification");
    element.classList.remove("fadeInOut");
    void element.offsetWidth;
    element.classList.add("fadeInOut");

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'addToCartAction.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.send('itemID=' + itemID);

}

//for cart
function removeItemFromCart(event, orderID) {
    event.preventDefault();


    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'removeItemFromCartAction.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (this.status == 200) {
        location.reload();
        
        }
    };
    
    xhr.send('orderID=' + orderID);

}


var checkboxes = document.querySelectorAll('input.cart-checkbox[type="checkbox"]');



checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
        updateTotalAmount();
    });
});

function updateTotalAmount() {
    var totalAmount = 0;
    var totalQuantity = 0;
    
    
    checkboxes.forEach(function (checkbox) {
        
        if (checkbox.checked) {
            var row = checkbox.closest('tr');
            var quantity = parseInt(row.querySelector('.quantity').textContent);
            var price = parseFloat(row.querySelector('.price').textContent.replace('₱', ''));
            
            // Check if valid numbers
            if (!isNaN(quantity) && !isNaN(price)) {
                totalAmount += quantity * price;
                totalQuantity += quantity;
            }
        }
    });

    if (totalQuantity >= 0) {
        document.querySelector('.total-amount').textContent = '₱ ' + totalAmount.toFixed(2);
        document.querySelector('.total-quantity').textContent = 'CHECKOUT (' + totalQuantity + ')';
    } else {
        document.querySelector('.total-amount').textContent = 'No items selected';
        document.querySelector('.total-quantity').textContent = 'CHECKOUT';
    }
}

var plusButtons = document.querySelectorAll('plus-btn');

function increaseQuantity(event, orderID){
    var plusButton = event.target;
    var row = plusButton.closest('tr');
    var quantityElement = row.querySelector('.quantity');
    var quantity = parseInt(quantityElement.textContent);
    var newQuantity = 0;
    
    // Check if valid number
    if (!isNaN(quantity)) {
        newQuantity = quantity + 1;
        quantityElement.textContent = newQuantity;
    }
    
    updateTotalAmount();
    updateQuantity(orderID, newQuantity);
}

var minusButtons = document.querySelectorAll('minus-btn');

function decreaseQuantity(event, orderID){
    var minusButtons = event.target;
    var row = minusButtons.closest('tr');
    var quantityElement = row.querySelector('.quantity');
    var quantity = parseInt(quantityElement.textContent);
    var newQuantity = 0;
    
    // Check if valid number
    if (!isNaN(quantity)) {
        newQuantity = quantity - 1;
        if(newQuantity < 0){
            newQuantity = 0;
        }
        quantityElement.textContent = newQuantity;
    }
    
    updateTotalAmount();
    updateQuantity(orderID, newQuantity);
}

function updateQuantity(orderID, value) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_quantity.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        console.log(this.responseText);
    };

    xhr.send('order_id=' + orderID + '&value=' + value);
    
}

function deleteItem(event, productID) {
    event.preventDefault();
    
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'productDelete.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    
    xhr.onload = function() {
        if (this.status == 200) {
            document.location.href = 'productList.php';
        
        }
    };
    
    xhr.send('productID=' + productID);

}

function deleteInquiry(event, inquiryID) {
    event.preventDefault();
    
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'concernDelete.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    
    xhr.onload = function() {
        if (this.status == 200) {
            document.location.href = 'concernList.php';
        
        }
    };
    
    xhr.send('inquiryID=' + inquiryID);

}

function deleteUser(event, userID) {
    event.preventDefault();


    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'userDelete.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (this.status == 200) {
            document.location.href = 'userList.php';
        
        }
    };
    
    xhr.send('userID=' + userID);

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

function ChangeText(textHolder, textString, color) {

    textHolder.style.backgroundColor = color;
    textHolder.style.display = "block";
    textHolder.innerHTML = textString;
}