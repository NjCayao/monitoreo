function togglePasswordVisibility() {
    const passwordInput = document.getElementById("password");
    const passwordToggle = document.querySelector(".password-toggle");
    
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      passwordToggle.classList.remove("far", "fa-eye-slash");
      passwordToggle.classList.add("far", "fa-eye");
    } else {
      passwordInput.type = "password";
      passwordToggle.classList.remove("far", "fa-eye");
      passwordToggle.classList.add("far", "fa-eye-slash");
    }
  }


 
// consulta de reniec

$('#buscar_dni').click(function() {
  dni = $('#dni').val();
  $.ajax({
      url: 'reniec/consultaDNi.php',
      type: 'post',
      data: 'dni=' + dni,
      dataType: 'json',
      success: function(r) {
        if(r.numeroDocumento==dni){
          var apellidos = r.apellidoPaterno + ' ' + r.apellidoMaterno;
          $('#lastname').val(apellidos);          
          $('#name').val(r.nombres);
      }else{
          alert(r.error);
      }
      console.log(r)
      }
  });
});



// obligar a jalar mis estilos primero
function moveCustomStylesToFront() {
  var head = document.getElementsByTagName('head')[0];
  var customStyles = document.getElementById('custom-styles');

  if (customStyles) {
      head.insertBefore(customStyles, head.firstChild);
  }
}

moveCustomStylesToFront();