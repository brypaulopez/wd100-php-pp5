let plusClass = document.querySelector(".plusClass");
let minusClass = document.querySelector(".minusClass");
let num
let a = 1;

plusClass.addEventListener("click", ()=> {
    a++;
    console.log(a);
    num = document.querySelector("#qty-id").value = a;
});

minusClass.addEventListener("click", () => {
    if (a > 1) {
        a--;
        console.log(a);
        num = document.querySelector("#qty-id").value = a;
    }
})

const cartNotif = () => {
    alert();
}