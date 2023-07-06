$(document).ready(function () {
  $("#formulario").submit(function (e) {
    e.preventDefault();
    let email = $("input[name=email]").val();
    let password = $("input[name=password]").val();
    var data = {
      email: email,
      password: password
    };
    user = JSON.stringify(data);
    showLoading();
    $.ajax({
      type: "POST",
      url: "controller.php",
      headers: {
        "X-Requested-With": "XMLHttpRequest",
        "Content-Type": "application/json",
      },
      data: user,
      success: function (response) {
        var msg = JSON.parse(response);
        showLoading();
        if(msg.status== true){
          Swal.fire({
            icon: "success",
            title: msg.msg,
            showConfirmButton: false,
            timer: 1500,
          }).then(function () {
            if(msg.type =="admin"){
              location.href = "http://localhost/ejercicio1/admin.php";
            }else{
              location.href = "http://localhost/ejercicio1/normal.php";
            }
          });
        }else{
          Swal.fire({
            icon: "error",
            title: msg.msg,
            showConfirmButton: false,
            timer: 1500,
          })
        }
        
      },
      //timeout: 2000,
    });
    return false;
  });

  function showLoading() {
    Swal.fire({
      title: "Espere un momento",
      allowOutsideClick: false,
      showConfirmButton: false,
      onBeforeOpen: () => {
        Swal.showLoading();
      },
    });
  }
});
