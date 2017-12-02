//function stageContent(content) {
//		$("#stage").html(content); 
//	}
//
//	function evaluatePath(path){
//		// clean up the endpoint 
//		var request = path.split("/").pop(); 
//
//		// request the content 
//		if(request == "howItWorks"){
//			$.get("howItWorks.html", stageContent); 
//		}
//
////      else {
////          $.get("home.html", stageContent); 
////      }
//	}
//
//$(function(){
//	evaluatePath(location.pathname); 
//
//	$("nav[role=navigation] a").click(function(e) {
//		// don't follow the href 
//		e.preventDefault(); 
//
//		var request = $(this).attr("href"); 
//
//		history.pushState(null, null, request); 
//
//		evaluatePath(request); 
//	});
//
//	$(window).on("popstate", function() {
//		evaluatePath(location.pathname); 
//	}); 
//}); 

function field_focus(field, fname)
  {
    if(field.placeholder == placeholder)
    {
      field.placeholder = '';
    }
  }

function field_focus(field, lname)
  {
    if(field.placeholder == placeholder)
    {
      field.placeholder = '';
    }
  }

function field_focus(field, username)
  {
    if(field.placeholder == placeholder)
    {
      field.placeholder = '';
    }
  }

  function field_blur(field, username)
  {
    if(field.placeholder == '')
    {
      field.placeholder = placeholder;
    }
  }

function field_focus(field, password)
  {
    if(field.placeholder == placeholder)
    {
      field.placeholder = '';
    }
  }

  function field_blur(field, password)
  {
    if(field.placeholder == '')
    {
      field.placeholder = placeholder;
    }
  }

function field_focus(field, confirmedPass)
  {
    if(field.placeholder == placeholder)
    {
      field.placeholder = '';
    }
  }

  function field_blur(field, confirmedPass)
  {
    if(field.placeholder == '')
    {
      field.placeholder = placeholder;
    }
  }

//Fade in dashboard box
$(document).ready(function(){
    $('.box').hide().fadeIn(1000);
    });

//Stop click event
$('a').click(function(event){
    event.preventDefault(); 
	});