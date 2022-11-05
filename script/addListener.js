const updateQuantity = {};

const grabNode = (className, callback) => {
  grabPart = Array.from(document.getElementsByClassName(className));
  grabPart.map((key) => {
    callback(key);
  });
};

const addToCart = (className, callback, grabClassName = ".gBtn") => {
  grabPart = Array.from(document.getElementsByClassName(className));
  grabPart.map((key) => {
    const btn = key.querySelector(grabClassName);
    btn.addEventListener("click", () => {
      id = btn.getAttribute("data-id");
      callback(id);
    });
  });
};

const callback = async (id) => {
  const response = await fetch(
    `http://localhost/Database/model/removeOrder.php?id=${id}`
  );
  console.log(`http://localhost/Database/model/removeOrder.php?id=${id}`);
  window.location = window.location;
};

addToCart("order", callback);

let totalEachPrice = "";
const totalPrice = document.querySelector(".g-total");
let tempTotal = 0;

const updateTotalPrice = () => {
  grabNode("order", (key) => {
    const price = key
      .querySelector(".price")
      .innerHTML.trim()
      .replace("tk", "");
    tempTotal = tempTotal + parseInt(price);
    totalPrice.innerHTML = tempTotal;
  });
  tempTotal = 0;
};

grabNode("order", (key) => {
  const incremnt = key.querySelector(".increment");
  const decremnt = key.querySelector(".decrement");
  const quantity = key.querySelector(".gQuantity");
  const price = key.querySelector(".price");
  const initPrice = price.innerHTML.trim().replace("tk", "");
  const upDatePrice = () => {
    price.innerHTML = parseInt(quantity.innerHTML) * parseInt(initPrice) + "tk"; //+ update
  };
  upDatePrice();

  incremnt.addEventListener("click", () => {
    const foodID = quantity.getAttribute("food-id");
    quantity.innerHTML = parseInt(quantity.innerHTML) + 1;
    console.log(initPrice);
    upDatePrice();
    updateTotalPrice();
    updateQuantity[`i-${foodID}`] = quantity.innerHTML;
  });

  decremnt.addEventListener("click", () => {
    const foodID = quantity.getAttribute("food-id");

    quantity.innerHTML = Math.max(1, parseInt(quantity.innerHTML) - 1);
    upDatePrice();
    updateTotalPrice();
    updateQuantity[`i-${foodID}`] = quantity.innerHTML;
  });
});
updateTotalPrice();

const hndlSubmit = () => {
  const submit = document.querySelector(".button");

  const hndlEvent = async (id, nQuantity) => {
    const res = await fetch(
      `http://localhost/src/hndlcheckout.php?id=${id}&quantity=${nQuantity}`
    );

    return res.text();
  };
  submit.addEventListener("click", () => {
    const promises = [];

    Object.keys(updateQuantity).map((key) => {
      const id = parseInt(key.replace("i-", ""));
      const nQuantity = parseInt(updateQuantity[key]);
      promises.push(hndlEvent(id, nQuantity));
    });

    Promise.all(promises)
      .then((res) => {
        window.location = "payment_nagad.php";
      })
      .catch((e) => {
        alert(e);
        window.location = location;
      });
  });
};
hndlSubmit();
