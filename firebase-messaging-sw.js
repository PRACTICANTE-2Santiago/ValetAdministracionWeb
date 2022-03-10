importScripts('https://www.gstatic.com/firebasejs/8.4.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.4.1/firebase-messaging.js');

var firebaseConfig = {
    apiKey: "AIzaSyDBC4_QSLqM1i_FON92r77xb5TOgp6Q2Vc",
    authDomain: "valetparkinglkm-64b72.firebaseapp.com",
    projectId: "valetparkinglkm-64b72",
    storageBucket: "valetparkinglkm-64b72.appspot.com",
    messagingSenderId: "462450661269",
    appId: "1:462450661269:web:beab903f5e216e162b089c",
    measurementId: "G-CB4KL6W2DC"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);



const messaging = firebase.messaging();


messaging.setBackgroundMessageHandler(function (payload) {
    const title = payload.data.title;
    const options = {
        body: payload.data.body,
        icon: payload.data.icon
    };
    return self.registration.showNotification(title, options);
});
