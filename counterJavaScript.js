function stageContent(content) {
		$("#stage").html(content); 
	}

	function evaluatePath(path){
		// clean up the endpoint 
		var request = path.split("/").pop(); 

		// request the content 
		if(request == "howItWorks"){
			$.get("howItWorks.html", stageContent); 
		}

//      else {
//          $.get("home.html", stageContent); 
//      }
	}

$(function(){
	evaluatePath(location.pathname); 

	$("nav[role=navigation] a").click(function(e) {
		// don't follow the href 
		e.preventDefault(); 

		var request = $(this).attr("href"); 

		history.pushState(null, null, request); 

		evaluatePath(request); 
	});

	$(window).on("popstate", function() {
		evaluatePath(location.pathname); 
	}); 
}); 