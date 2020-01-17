$(document).ready(function () {

    var mymap = L.map('map').setView([ event.latitude, event.longtitude], 13);

    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        subdomains: ['a','b','c']
    }).addTo(mymap);

    var marker = L.marker([event.latitude, event.longtitude]).addTo(mymap);

});
