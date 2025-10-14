const removeProductButtons = document.getElementsByClassName("remove")
for (var i = 0; i < removeProductButtons.length; i++) {
    removeProductButtons[i].addEventListener("click", function(event) {
        event.target.parentElement.parentElement.remove()
    })
}



const addToCartButtons = document.getElementsByClassName("btnaddcart")
for (var i = 0; i < addToCartButtons.length; i++) {
    addToCartButtons[i].addEventListener("click", addProductToCart)
}

function addProductToCart(event) {
    const button = event.target
    const productInfos = button.parentElement.parentElement.parentElement.parentElement
    const productImage = productInfos.getElementsByClassName("imgproduto")[0].src
    const productTitle = productInfos.getElementsByTagName("h1")[1].innerText
    const productPrice = productInfos.getElementsByClassName("preconovo")[0].innerText
    
    let newCartProduct = document.createElement("div")
    newCartProduct.classList.add("row")

    newCartProduct.innerHTML = 
    `
    <div class="col-md-4 text-end">
        <img src="${productImage}" class="imgproduto">
    </div>
    <div class="col-4 text-center align-content-center">
        <h1>${productTitle}</h1>
        <div><br>
            <h2 class="preconovo">${productPrice}</h2>
        </div>
    </div>
    `

    const tableBody = document.querySelector("row")
    tableBody.append(newCartProduct)
    console.log(tableBody)
}