// document.querySelector('#seleccionar').addEventListener('click',(event) => {
//     event.preventDefault();
//     console.log(event);
//     a = 3;
//     event.stopPropagation();
// },false);
let ban = false;
function hola() {
    event.stopPropagation();
    let a = '<div class="row justify-content-around align-items-center mt-2">';
    let total = 0;
    for (let i = 0; i < event.path[2].length - 1; i++) {
        if(event.path[2][i].value !== "0") {
            ban = true;
            let r = event.path[2][i].name;
            let precio = document.getElementById('pr' + r ).textContent
            precio = precio.substr(0,precio.length - 1);
            total += Number(precio) * Number(document.getElementById('cant' + r ).value);
            a += `<div class="col-12 row">
                <input type="hidden" name="id_comida" value="${r}">
                <input readonly class="col-5 m-0 mb-1 border" name="name_comida" value="${document.getElementById('nam' + r ).textContent}">
                <input readonly class="col-2 m-0 text-center border mb-1" name="cant_comida_pedido" value="${document.getElementById('cant' + r ).value}">
                <input readonly class="col-4 text-right m-0 mb-1 border" name="price_comida" value="${document.getElementById('pr' + r ).textContent}">
                </div>
                `;
        }
    }
    a += "</div>";
    a += `<div class="container row mt-2 pr-4 justify-content-end form-group">
        <label class="col-2 col-form-label m-0 pr-0 text-center" for="total_pedido">Total</label>
        <input readonly class="border col-3 mt-2 text-right" name="total_pedido" id="total_pedido" value="${total}$">
    </div>`;
    a+=`<button type="submit" class="btn btn-outline-danger btn-block">Pedir</button>`;
    console.log(total)
    if (! ban ) document.getElementById("confirmar-pedido").innerHTML = "No has seleccionado ningun plato";
    else document.getElementById("confirmar-pedido").innerHTML = a;

}