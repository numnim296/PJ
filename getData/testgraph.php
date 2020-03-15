
<!DOCTYPE HTML>
<html>
<head>
<script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-firestore.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-analytics.js"></script>
<script>

  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyAmATixVLrIsLCD9_6Tf7PysW6oQif5VoM",
    authDomain: "webprojectfinal-a0071.firebaseapp.com",
    databaseURL: "https://webprojectfinal-a0071.firebaseio.com",
    projectId: "webprojectfinal-a0071",
    storageBucket: "webprojectfinal-a0071.appspot.com",
    messagingSenderId: "162499703410",
    appId: "1:162499703410:web:d024a3bd470e4e8c6a88eb",
    measurementId: "G-JL5GVH5RYJ"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
  const db = firebase.firestore();
</script>

<script>





</script>
<script>
window.onload = function() {

var array_data = []

  var s = -1
  var chart = new CanvasJS.Chart("chartContainer", {
  	// animationEnabled: true,
  	title:{
  		text: "twitter"
	  },
	  axisX:{
   labelFontSize: 10,
 },
  	axisY: {
  		title: "total",
  		prefix: "",
  		suffix:  "k"
  	},
  	data: [{
  		type: "bar",
  		yValueFormatString: "$#,##0K",
  		indexLabel: "{y}",
		  indexLabelPlacement: "inside",
		  indexLabelFontSize: 10,
  		indexLabelFontWeight: "bolder",
  		indexLabelFontColor: "white",
  		dataPoints: array_data,
  	}]
  });
  chart.render()

  db.collection('data').get().then(snapshot => {
          snapshot.docs.forEach(doc => {

  			var tweetDB = doc.data().tweet
  			var trendDB = doc.data().trend
  			array_data.push({"y":tweetDB,"label":trendDB,"x":s+=1})
        chart.render()
  			console.log(array_data)

          });

  	});
}


</script>
</head>
<body>
	<center>
<div id="chartContainer" style="height: 500px; width: 100%;"></div>
</center>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>

</script>
</body>
</html>
