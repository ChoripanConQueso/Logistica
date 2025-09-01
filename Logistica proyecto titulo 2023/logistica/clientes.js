function openTab(tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    document.getElementById(tabName).style.display = "block";
}

/*COTIZADOR DE ENVIOS*/
function calcularTarifa() {
    const origen = document.getElementById("origen").value;
    const destino = document.getElementById("destino").value;
    const tamaño = parseFloat(document.getElementById("tamaño").value);


    const tarifa = tamaño * 0.1;

    document.getElementById("resultado").textContent = `El costo de envío de ${origen} a ${destino} es $${tarifa}`;
}

/*SEGUIMIENTO DE ENVIOS*/
function realizarSeguimiento() {
    const numeroSeguimiento = document.getElementById("numeroSeguimiento").value;

    document.getElementById("resultadoSeguimiento").textContent = `El número de seguimiento ${numeroSeguimiento} está en tránsito.`;
}

/*SUCURSALES DE ENVIOS*/
function seleccionarSucursal() {
    const seleccion = document.getElementById("sucursal").value;
  
    if (seleccion) {
      const mensaje = `Has seleccionado la sucursal: ${seleccion}`;
      document.getElementById("resultadoSucursal").textContent = mensaje;
    } else {
      document.getElementById("resultadoSucursal").textContent = "Por favor, seleccione una sucursal válida.";
    }
  }

  /*LOGGIN QUE VOY A QUITAR XD*/
document.getElementById("login-button").addEventListener("click", function(event) {
  event.preventDefault();
  document.getElementById("hud").style.display = "block";
});


document.getElementById("close-hud").addEventListener("click", function() {
  document.getElementById("hud").style.display = "none";
});


document.getElementById("login-button-hud").addEventListener("click", function(event) {
  event.preventDefault();
  document.getElementById("hud").style.display = "none";
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;
});
