<!DOCTYPE html>
<html lang="en">
<head>
	<title>Test ajax call to Impac! API</title>
</head>

<body>
	<h1>Test ajax call</h1>
	<p>Look at the console and to the source to see what's happening.</p>
	<p>My problems:</p>
	<p>Using the parameters you gave <a href="https://gist.github.com/cesar-tonnoir/f30b30916b8c507f0c6a">here</a>, all I get is a 401 status with "<pre>{"message": "Unauthorized Action"}</pre>" response.</p>
	<p>I then tried to use different parameters names (user/username/owner, password/pass/sso_session), and different values for user, password or even URL (those provided, my demo account credentials), but it was never satisfying.</p>
	<p>As you will see in the source of this page, a set of data coming from my demo account returned me a piece of JSON: <pre>{"content":{"organizations":["org-fnur"],"total":{"period":"MONTHLY","employees":0,"average_rate":0.0,"currency":null},"employees":[]}}</pre> but as an error as it's JSON and not JSONP, and I'm asking for JSONP.</p>

	<p>Am I making a mistake or is there an error in the credentials you gave me?<br />
		I know I have to retrieve data through a ROR app, and I'm currently working on it but will it avoid the problem?</p>

<script type="text/javascript" src="scripts/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {

// Working with my demo account and an active session
  	$.ajax({
		url: "https://api-impac.maestrano.com/api/v1/get_widget",
		method: "GET",
		data: {
			owner: "usr-4kyk",
			sso_session: "be1339e60e179779ff18ea7696d75f1930134b0e",
			metadata: {
				organization_ids: ["org-fnur"],
				hist_parameters: {
					from: "2015-01-01",
					to: "2015-07-31",
					period: "WEEKLY"
				}
			},
			engine: "hr/employees_list",
		},
		dataType: "JSONP",
		success: function (data) {
console.log("success demo", data);
		},
		error: function (data) {
console.log("error demo", data);
		}
	});


// Not working with test credentials
 	$.ajax({
		url: "https://api-impac-uat.maestrano.io/api/v1/get_widget",
		method: "GET",
		data: {
			username: "72db99d0-05dc-0133-cefe-22000a93862b",
			password: "_cIOpimIoDi3RIviWteOTA",
			metadata: {
				organization_ids: ["org-fbte"]
			},
			engine: "hr/employees_list"
		},
		dataType: "JSONP",
		success: function (data) {
console.log("success test", data);
		},
		error: function (data) {
console.log("error test", data);
		}
	});
});
</script>
</body>
</html>