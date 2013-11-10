var pictureSource;   // picture source
var destinationType; // sets the format of returned value
var smallImage;
var realImage;

// Wait for Cordova to connect with the device
document.addEventListener("deviceready", onDeviceReady, false);

// Cordova is ready to be used!
function onDeviceReady() {
    pictureSource = navigator.camera.PictureSourceType;
    destinationType = navigator.camera.DestinationType;
}

// Called when a photo is successfully retrieved
function onPhotoDataSuccess(imageData) {
  // Uncomment to view the base64 encoded image data
  // console.log(imageData);

  // Get image handle
  smallImage = document.getElementById('smallImage');
  realImage = imageData;

  // Unhide image elements
  smallImage.style.display = 'block';

  // Show the captured photo
  // The inline CSS rules are used to resize the image
  smallImage.src = "data:image/jpeg;base64," + imageData;
}

// A button will call this function
function capturePhoto() {
  // Take picture using device camera and retrieve image as base64-encoded string
  navigator.camera.getPicture(onPhotoDataSuccess, onFail, {
    quality: 50,
    destinationType: destinationType.DATA_URL
  });
}

// Called if something bad happens.
function onFail(message) {
  alert('Erro: ' + message);
}

function sendPhoto() {
  var time = new Date().getTime();
  var fileName = "uploads/" + time + ".jpg";

  // Send to EC2.
  var uri = "http://54.225.192.214/index.php";

  // TODO: decode the image on the server side and create the binary file.
  // jQuery.ajax() does not support the transfer of binary data.
  jQuery.ajax({
    url: uri,
    type: "POST",
    data: { image: realImage },
    mimeType: "image/jpeg",
  }).done(function(html) {
    // TODO.
    alert('Here!');
  });
}