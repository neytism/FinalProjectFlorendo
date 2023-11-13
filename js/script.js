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

//go  to top
window.onscroll = function() {
    window.onscroll = function() {
        var topDiv = document.getElementById("goToTop");
        if (topDiv) {
            var scrollPosition = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
            var triggerPosition = 1000; 

            if (scrollPosition < triggerPosition) {
                topDiv.style.display = "none";
            } else {
                topDiv.style.display = "flex";
            }
        }
    };

};

//for search
$(document).ready(function(){
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();

        $(".cardHolder").each(function() {
            var card = $(this);
            var listName = card.find(".name").text().toLowerCase();
            var listLabel = card.find(".alt").text().toLowerCase();
            var listDesc = card.find(".description").text().toLowerCase();
            var listImageAlt = card.find("img").attr('alt');
            listImageAlt = listImageAlt ? listImageAlt.toLowerCase() : null;

            var isSearchMatch = (listName.indexOf(value) > -1) ||
                               (listLabel.indexOf(value) > -1) ||
                               (listDesc.indexOf(value) > -1);
                               
                               if (listImageAlt) {
                                isSearchMatch = isSearchMatch || (listImageAlt.indexOf(value) > -1);
                            }

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
           }, 1000); 

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
           },1000); 
        
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
           },1000); 
        
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
    let itemBrandModel = document.getElementById("inputBrandModel").value;
    let itemProductType = document.getElementById("inputProductType").value;

    let formData = new FormData();
    formData.append('itemName', itemName);
    formData.append('itemDesc', itemDesc);
    formData.append('itemImage', itemImage);
    formData.append('itemPrice', itemPrice);
    formData.append('itemStock', itemStock);
    formData.append('itemBrandModel', itemBrandModel);
    formData.append('itemProductType', itemProductType);
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
           },1000); 
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

function showPassword(event) {
    event.preventDefault();
    var x = document.getElementById("inputPassword");
    var button = event.target;
    if (x.type === "password") {
        x.type = "text";
        button.classList.remove("glyphicon-eye-open");
        button.classList.add("glyphicon-eye-close");
        button.title = "Hide Password";
    } else {
        x.type = "password";
        button.classList.remove("glyphicon-eye-close");
        button.classList.add("glyphicon-eye-open");
        button.title = "Show     Password";
    }
}

//for cart
var checkboxes = document.querySelectorAll('input.cart-checkbox[type="checkbox"]');
var checkedCart = [];

checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
        var orderID = this.getAttribute('data-order-id');
        updateTotalAmount(orderID, this.checked);
    });
});

function updateTotalAmount(orderID, isChecked) {
    var totalAmount = 0;
    var totalQuantity = 0;
    
    checkboxes.forEach(function (checkbox) {
        var row = checkbox.closest('tr');
        var quantity = parseInt(row.querySelector('.quantity').textContent);
        var price = parseFloat(row.querySelector('.price').textContent.replace('₱', ''));
        
        if (checkbox.checked) {
            // Check if valid numbers
            if (!isNaN(quantity) && !isNaN(price)) {
                totalAmount += quantity * price;
                totalQuantity += quantity;
            }
        }
    });
    
    if (isChecked) {
        checkedCart.push(orderID);
    } else {
        var index = checkedCart.indexOf(orderID);
        if (index > -1) {
            checkedCart.splice(index, 1);
        }
    }
    
    if (totalQuantity > 0) {
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

function checkOut(){
    var orderIDs = [...checkedCart];
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'checkOut.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    console.log(orderIDs);
    
    xhr.onload = function() {
        if (this.status == 200) {
            console.log(this.responseText);
            document.location.href = 'checkOut.php';
        }
    };
    
    xhr.send('orderIDsFromCart=' + JSON.stringify(orderIDs));
}

function confirmCheckOut(){
    
    var xhr = new XMLHttpRequest();
     xhr.open('POST', 'checkOutAction.php', true);
     xhr.onload = function() {
        var x = document.getElementById('thanks');
            x.style.display = "flex";
        
     };
     xhr.send();
 
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
            console.log(this.responseText);
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

function showDetails(product, isLoggedIn){
    var x = document.getElementById('productDetailModal');
    
    var details = '<div class="modalHolder" >';
    details += '<div class="productModal" onclick="event.stopPropagation();">';
    details += '<a type="button" class="close" aria-label="Close" onclick="hideProductDetail()"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>';
    details += '<div class="modalContent">';
    details += '<div class="modalImageHolder">';
    details += '<div class="modalImageDiv"><img src="' + product['imagePath'] + '" alt="'+ product['itemName'] +'"></div></div>';
    details += '<div style="width: 45%;">';
    details += '<h2>'+ product['itemName'] +'</h2>';
    details += '<p>'+product['description']+'</p>';
    details += '<p>Brand/Model: ' + product['brand_model'] + '</p>';
    details += '<p>Price: ₱ '+ product['price'] +'</p>';
    details += '<p>Stock: '+product['stock']+' remaining.</p></div></div>';
    
    //details += '<button onclick="addToCart(event,'+ product['product_id'] +'" type="button" class="btn btn-success" aria-label="Save"><span class="glyphicon glyphicon-shopping-cart"></span></button>';
    details += '<button type="button" ';
    
    if (!isLoggedIn){
        details += 'onclick="window.location.href=\'login.php\'"';
    } else{
        details += 'onclick="event.stopPropagation(); addToCart(event,'+ product['product_id'] +')"';
    }

    details += ' class="btn btn-success" aria-label="Save"><span class="glyphicon glyphicon-shopping-cart"></span></button>';
    details += '</div></div>';
    
    x.innerHTML = details;
    x.style.display = 'block';
}

function changeMOP(){
    var value = document.getElementById('modeOfPayment').value;
    var mopHolder = document.getElementById('mopHolder');
    var text = '';

    if(value == "CC"){
        text = "<p style=\"margin-bottom:1px;\" >Full Name</p>\
        <input style=\"display: inline-block !important; padding: 5px 5px; width:100%; margin-bottom: 10px;\" type=\"text\" id=\"inputItemName\" placeholder=\"Nate Florendo, etc.\" required>\
        <p style=\"margin-bottom:1px;\">Expiry Date</p>\
        <input style=\"display: inline-block !important; padding: 5px 5px; width:49%; margin-bottom: 10px;\" type=\"text\" id=\"inputItemName\" placeholder=\"01\" required>\
        <input style=\"display: inline-block !important; padding: 5px 5px; width:49%; margin-bottom: 10px;\" type=\"text\" id=\"inputItemName\" placeholder=\"2023\" required>\
        <p style=\"margin-bottom:1px;\">Card Number</p>\
        <input style=\"display: inline-block !important; padding: 5px 5px; width:69%; margin-bottom: 10px;\" type=\"text\" id=\"inputItemName\" placeholder=\"####-####-####-####\" required>\
        <input style=\"display: inline-block !important; padding: 5px 5px; width:29%; margin-bottom: 10px;\" type=\"text\" id=\"inputItemName\" placeholder=\"CCV\" required>";    
    } else{
        text="";
    }
    

    mopHolder.innerHTML = text;
}

function confirmCheckOut(){
    
   var xhr = new XMLHttpRequest();
    xhr.open('POST', 'checkOutAction.php', true); // replace with your PHP script URL
    xhr.onload = function() {
        var x = document.getElementById('thanks');
        x.style.display = "flex";
        if (this.status == 2000) {
            document.location.href = 'cart.php';
        }
    };
    xhr.send();

}



function hideProductDetail(){
    var x = document.getElementById('productDetailModal');
    x.innerHTML = "";
    x.style.display = 'none';
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