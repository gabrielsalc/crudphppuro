/*// Button DOM
let btn = document.getElementById("btn");
 
// Adding event listener to button
btn.addEventListener("click", () => {
 
    // Fetching Button value
    let btnValue = btn.value;
 
    // jQuery Ajax Post Request
    $.post('../controllers/borrarRoles.php', {
        btnValue: btnValue
    }, (response) => {
        // response from PHP back-end
        console.log(response);
    });
});*/

function borrarRol(idroles) {

    console.log(idroles)
    $.post('../controllers/borrarRoles.php', {
        idroles: idroles
    }, (response) => {
        if(response.error != null){
            console.log(response);
            $(`#popover-${idroles}`).popover({
                trigger: 'manual',
                content: "No puedes Eliminar un rol que tiene asignadas personas",
              })
              $(`#popover-${idroles}`).popover('show')
              setTimeout(() => {
                $(`#popover-${idroles}`).popover('hide')
            }, 1500);


        } else {
            window.location.reload();
        }
    });
  }

  function crearRol(nombre) {

    console.log(nombre)
    $.post('../controllers/insertarRoles.php', {
        nombre: nombre
    }, (response) => {
        if(response.error != null){
            console.log(response);
            $(`#popover-${idroles}`).popover({
                trigger: 'manual',
                content: "Este Rol Ya existe",
              })
              $(`#popover-${idroles}`).popover('show')
              setTimeout(() => {
                $(`#popover-${idroles}`).popover('hide')
            }, 1500);


        } else {
            window.location.reload();
        }
    });
  }

