<html>
<head>
  <meta charset="utf-8">
  <title>JavaScript function to get time differences in minutes between two dates</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>
</head>
<body>
<input type="datetime-local" name="input-time" id="start" onchange="myFunction()">
<input id="end" type="datetime-local" onchange="myFunction()">
<input type="text" id="total-hours" placeholder="Total Hours">
<script>
function myFunction() {

var initialTime = $("#start").val();
if (initialTime == "") {
  alert("Please add Start Time (HH : MM : SS)");
  return;
}
var initialTimeFormat = moment(initialTime);


var endTime = $("#end").val();
if (endTime == "") {
  alert("Please add End Time (HH : MM : SS)");
  return;
}
var endTimeFormat = moment(endTime);

var hr = endTimeFormat.diff(initialTimeFormat,"hours","minutes");

var min = Math.floor(hr / 1000 / 60);
$("#total-hours").val(min);

};
</script>
</html>

