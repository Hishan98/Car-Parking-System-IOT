firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
      // User is signed in.
  
        window.location.href = "Home.html";
  
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
  
  function logout(){
    firebase.auth().signOut();
  }

  //Div color changin function
  function colorChange(){
    //1 = car parked (red)
    //0 = car not parked (red)

    if(bla=1){
      document.getElementById("myDIV").style.backgroundColor = "lightblue";
    }
    else{
      document.getElementById("myDIV").style.backgroundColor = "lightblue";
    }
  }
  