(function(){
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyCNwLkVZh0_PYxUKGszbXRWsnMTiqA3A-Q",
        authDomain: "carpark-38275.firebaseapp.com",
        databaseURL: "https://carpark-38275.firebaseio.com",
        projectId: "carpark-38275",
        storageBucket: "carpark-38275.appspot.com",
        messagingSenderId: "208390235046",
        appId: "1:208390235046:web:88e1f7809fb311a3bfe567",
        measurementId: "G-ZP6C1C23ZJ"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();

    //Get elements
    const txtEmail = document.getElementById('txtEmail');
    const txtPassword = document.getElementById('txtPassword');
    const btnLogin = document.getElementById('btnlogin');
    const btnSignup = document.getElementById('btnSignUp');
    const btnLogout = document.getElementById('btnLogout');

    //Add login event
    btnLogin.addEventListener('click', e =>{
        //Get Email Password
        const email=txtEmail.value;
        const password=txtPassword.value;
        const auth = firebase.auth();
        //Sign in
        const promise =auth.signInWithEmailAndPassword(email,password);
        promise.catch(e => console.log(e.message));
    });
}());

