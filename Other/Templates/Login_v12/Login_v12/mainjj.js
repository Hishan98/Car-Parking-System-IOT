firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
      // User is signed in.
  
      window.location.href = "http://www.w3schools.com";
  
    } else {
      // No user is signed in.
      // document.getElementById("user_div").style.display = "none";
      // document.getElementById("login_div").style.display = "block";
  
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
  
  function logout(){
    firebase.auth().signOut();
  }
  