firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
      // User is signed in.
      if(user != null){
        window.location.href = "Home.html";  
      }
  
    } else {
      // No user is signed in.
  
    }
  });

  function login(){
  
    var userEmail = document.getElementById("txtEmail").value;
    var userPass = document.getElementById("txtPassword").value;
  
    firebase.auth().signInWithEmailAndPassword(userEmail, userPass).catch(function(error) {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
  
      window.alert("Error : " + errorMessage);
  
      // ...
    });
  
  }
  