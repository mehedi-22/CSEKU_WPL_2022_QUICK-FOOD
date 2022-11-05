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
    return 1;
  });

  console.log("hello");
};
