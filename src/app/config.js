/*=============================================
Exportamos la ruta para tomar imágenes
=============================================*/
export let Path = {
  url: "http://localhost:4200/assets/",

  //Cuando necestiemos trabajar con certificado SSL (registro o ingreso con facebook)
  // url: 'https://localhost:4200/assets/'
};

/*=============================================
Exportamos el endPoint de la APIREST de Firebase
=============================================*/
export let Api = {
  url: "https://marketplace-b8644.firebaseio.com/", // YOUR FIREBASE ENDPOINT
};

/*=============================================
Exportamos el endPoint para el registro de usuarios en Firebase Authentication
=============================================*/

export let Register = {
  url:
    "https://identitytoolkit.googleapis.com/v1/accounts:signUp?key=AIzaSyAEjKuE6rV96zwlmLO7JZrg9Bb5qWIjRDw",
};

/*=============================================
Exportamos el endPoint para el ingreso de usuarios en Firebase Authentication
=============================================*/

export let Login = {
  url:
    "https://identitytoolkit.googleapis.com/v1/accounts:signInWithPassword?key=AIzaSyAEjKuE6rV96zwlmLO7JZrg9Bb5qWIjRDw",
};

/*=============================================
Exportamos el endPoint para enviar verificación de correo electrónico
=============================================*/

export let SendEmailVerification = {
  url:
    "https://identitytoolkit.googleapis.com/v1/accounts:sendOobCode?key=AIzaSyAEjKuE6rV96zwlmLO7JZrg9Bb5qWIjRDw",
};

/*=============================================
Exportamos el endPoint para confirmar email de verificación
=============================================*/

export let ConfirmEmailVerification = {
  url:
    "https://identitytoolkit.googleapis.com/v1/accounts:update?key=AIzaSyAEjKuE6rV96zwlmLO7JZrg9Bb5qWIjRDw",
};

/*=============================================
Exportamos el endPoint para tomar la data del usuario en Firebase auth
=============================================*/

export let GetUserData = {
  url:
    "https://identitytoolkit.googleapis.com/v1/accounts:lookup?key=AIzaSyAEjKuE6rV96zwlmLO7JZrg9Bb5qWIjRDw",
};

/*=============================================
Exportamos el endPoint para Resetear la contraseña
=============================================*/

export let SendPasswordResetEmail = {
  url:
    "https://identitytoolkit.googleapis.com/v1/accounts:sendOobCode?key=AIzaSyAEjKuE6rV96zwlmLO7JZrg9Bb5qWIjRDw",
};

/*=============================================
Exportamos el endPoint para confirmar el cambio de la contraseña
=============================================*/

export let VerifyPasswordResetCode = {
  url:
    "https://identitytoolkit.googleapis.com/v1/accounts:resetPassword?key=AIzaSyAEjKuE6rV96zwlmLO7JZrg9Bb5qWIjRDw",
};

/*=============================================
Exportamos el endPoint para enviar la contraseña
=============================================*/

export let ConfirmPasswordReset = {
  url:
    "https://identitytoolkit.googleapis.com/v1/accounts:resetPassword?key=AIzaSyAEjKuE6rV96zwlmLO7JZrg9Bb5qWIjRDw",
};

/*=============================================
Exportamos el endPoint para cambiar la contraseña
=============================================*/

export let ChangePassword = {
  url:
    "https://identitytoolkit.googleapis.com/v1/accounts:update?key=AIzaSyAEjKuE6rV96zwlmLO7JZrg9Bb5qWIjRDw",
};

/*=============================================
Exportamos el endPoint del servidor para administrar archivos
=============================================*/

export let Server = {
  url:
    "http://localhost/mp-angular/src/assets/img/index.php?key=AIzaSyAEjKuE6rV96zwlmLO7JZrg9Bb5qWIjRDw",
};