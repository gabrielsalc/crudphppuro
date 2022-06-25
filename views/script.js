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


