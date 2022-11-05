const grabNode=(className, callback)=>{
  grabPart = Array.from(document.getElementsByClassName(className));
  grabPart.map((key) => {
      callback(key)
  });
}

const addToCart = () => {
  pushDataToCart();

  grabNode('gmnu',(key)=>{
    const btn = key.querySelector(".cartButton")
    const foodId = btn.getAttribute("data-id");
    const userId = btn.getAttribute("user-id"); 
    const foodName = key.querySelector(".data-name").innerHTML.trim();
    const foodDetails = key.querySelector(".data-details").innerHTML.trim() ?? "";
    const foodPrice =parseInt(key.querySelector(".data-price").innerHTML.trim().replace("tk",''));

    btn.addEventListener("click", () => {
     
      pushDataToCart({foodId,foodName,foodPrice,foodDetails,userId});
    });
  })
};

const pushDataToCart = async (dataObj = null) => {
 
  displayMsg = document.getElementById("msg");
  cartElement = document.getElementById("grabCart");
  
  var formData = new FormData();
  if(dataObj != null){
    
    const {foodId,foodName,foodPrice,foodDetails,userId} = dataObj  
    console.log(dataObj)
    formData.append('userId', userId);
    formData.append('foodId', foodId);
    formData.append('foodName', foodName);
    formData.append('foodPrice', foodPrice);
    formData.append('foodDetails', foodDetails);
    
  }

  const response = await fetch(
    `http://localhost/src/cartJson.php?${dataObj}`,{
      method: "POST",
      body: formData 
    }
  );
  
  const data = await response.json();
  console.log(data)
  cartElement.innerHTML = `${data.nProductInCart}`;
 
  if(dataObj !=null){ 
    displayMsg.innerHTML = `${data.msg}`;
    setTimeout(()=>{
        displayMsg.innerHTML = ``
    },900)
    }
};



addToCart()
