searchFood = () => {
  searchValue = document.getElementById("searchId").value.toUpperCase();
  container = document.getElementById("imgContainerId");
  cardArray = Array.from(container.getElementsByClassName("imgClass"));

  cardArray.map((key) => {
    foodName = key
      .getElementsByClassName("foodNameClass")[0]
      .textContent.toUpperCase();
    if (foodName) {
      if (foodName.indexOf(searchValue) < 0) key.style.display = "none";
      else key.style.display = "";
    }
    
  });

 
};



const grabNode=(callback)=>{
    grabPart = Array.from(document.getElementsByClassName('.gbtn'));
    grabPart.map((key) => {
        callback(key)
    });
}

const addToCart = (className, callback,grabClassName='.gBtn') => {
    grabPart = Array.from(document.getElementsByClassName(className));
    grabPart.map((key) => {
        const btn = key.querySelector(grabClassName)
        btn.addEventListener("click", () => {
            callback(key)
      })
    });
};

const callback=async(key)=>{
    id = key.getAttribute('data-id')
     const response = await fetch(`http://localhost/Quick-Food/Database/model/reviewFood.php?id=${id}`);
     const res = response.text();
     console.log(res);
    
}

grabNode("gBtn",callback)