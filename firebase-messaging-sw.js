importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyC9Dx_hkATVu9r0IGB6ET8-x1H3UxBecE8",
    authDomain: "ammart-4f32c.firebaseapp.com",
    projectId: "ammart-4f32c",
    storageBucket: "ammart-4f32c.firebasestorage.app",
    messagingSenderId: "330047977789",
    appId: "1:330047977789:web:56ef430c7c85bf3e3eed54",
    measurementId: "G-G52Z05JCSL"
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    return self.registration.showNotification(payload.data.title, {
        body: payload.data.body ? payload.data.body : '',
        icon: payload.data.icon ? payload.data.icon : ''
    });
});