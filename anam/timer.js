const theDay = new Date(2021, 0, 9).getTime();
const newYear = new Date(2021, 0, 1).getTime();

// countdown
let timer = setInterval(function() {

  const today = new Date().getTime();
    let diff = theDay - today;
    if (diff < 0) {
        window.location.replace("https://docs.google.com/document/d/1I-uEh3B81Y6XC8aW57syLQV0-yJ0BsaPrcTVf2CWIlw/edit?usp=sharing");
    }
  // math
    let days = Math.floor(diff / (1000 * 60 * 60 * 24));
    let hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((diff % (1000 * 60)) / 1000);

  // display
    document.getElementById("timer").innerHTML =
    "<div class=\"days\"> \
    <div class=\"numbers\">" + days + "</div>days</div> \
    <div class=\"hours\"> \
    <div class=\"numbers\">" + hours + "</div>hours</div> \
    <div class=\"minutes\"> \
    <div class=\"numbers\">" + minutes + "</div>minutes</div> \
    <div class=\"seconds\"> \
    <div class=\"numbers\">" + seconds + "</div>seconds</div> \
    </div>";

    if (today<newYear) {
        document.getElementById("wishNewYear").innerHTML = '<h2 style="font-size:8em; color:#F6F4F3; text-align:center;" class="blinking">Happy New Year!!</h2>';
    }

}, 1000);