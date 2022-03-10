var id= <?php echo "1";?>
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
messaging.requestPermission()
    .then(function () {
        console.log('Have a permission');
        return messaging.getToken();
    })
    .then(function (token) {
        saveToken(token);

        console.log(token);
    })
    .catch(function (err) {
        console.log('Error Ocurred');
    })

function saveToken(token) {
    // console.log(token);
    jQuery.ajax({
        data: {
            "token": token,
            "id_usuario": id
        },
        type: "post",
        url: "https://valet.linkom.mx/valet_archivos/token.php",
        success: function (result) {
            console.log(result)
        }
    });

}

messaging.onMessage(function (payload) {
    console.log('onMessage: ', payload);
    var title = payload.notification.title;
    var options = {
        body: payload.notification.body,
        icon: payload.notification.icon

    };
    var myNotification = new Notification(title, options);
});
