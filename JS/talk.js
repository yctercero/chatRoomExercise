$(function() {
	// sendData.message = document.getElementById("wow");

	$("textarea").on("keyup", function(e) {
		if (e.keyCode == 13) {
			if ($("input[name='send']").is(":checked")) {
				$.ajax({
					url: "responder.php",
					method: "post",
					data: {
						user_id: sendData,
						message: $("textarea[name='message'").val()
					},
					dataType: "json",
					success: function(json) {
						var addOn = $("<div></div>");
						for (i = 0; i < json.length; i++) {

							if (json[i]['users_id'] == sendData){
								$(addOn).append("<div class='loggedUser'><h6>" + json[i]['time'] + "</h6><p>" + json[i]['username'] + ":<br/>" + json[i]['text'] + "</p></div>");
							} else {
								$(addOn).append("<div><h6>" + json[i]['time'] + "</h6><p>" + json[i]['username'] + ":<br/>" + json[i]['text'] + "</p></div>");
							}
							
						}
						$("#display").html(addOn);
						// console.log(json);
						$("textarea[name='message']").val("");
						$("#display").animate({
							scrollTop: $("#display").prop("scrollHeight")
						}, 500);
					},
					error: function(xhr, status, thrown) {
						console.log("Error: " + thrown);
						console.log("Status: " + status);
						console.log(xhr);
					},
					complete: function() {
						console.log("ajax complete");
					}
				}); // end of Ajax
			} // end of if checked validation 	
			else {
				var mes = $("textarea[name='message']").val();
				mes += "<br/>";

			}	
		} // end of if statement 
	}); // on keyup action
	setInterval(function() {
			$.ajax({
				url: "refresh.php",
					method: "post",
					data: {
						user_id: sendData,
					},
					dataType: "json",
					success: function(json) {
						var addOn = $("<div></div>");
						for (i = 0; i < json.length; i++) {

							if (json[i]['users_id'] == sendData){
								$(addOn).append("<div class='loggedUser'><h6>" + json[i]['time'] + "</h6><p>" + json[i]['username'] + ":<br/>" + json[i]['text'] + "</p></div>");
							} else {
								$(addOn).append("<div><h6>" + json[i]['time'] + "</h6><p>" + json[i]['username'] + ":<br/>" + json[i]['text'] + "</p></div>");
							}
							
						}
						$("#display").html(addOn);
						$("#display").animate({
							scrollTop: $("#display").prop("scrollHeight")
						}, 500);
					},
					error: function(xhr, status, thrown) {
						console.log("Error: " + thrown);
						console.log("Status: " + status);
						console.log(xhr);
					},
					complete: function() {
						console.log("ajax complete");
					}
		}); // getting back chat history
	}, 3000); //setting setInterval
}); // ready