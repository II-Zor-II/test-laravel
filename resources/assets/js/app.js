
// /**
//  * First we will load all of this project's JavaScript dependencies which
//  * includes Vue and other libraries. It is a great starting point when
//  * building robust, powerful web applications using Vue and Laravel.
// //  */

// require('./bootstrap');

window.Vue = require('vue');
Vue.component('fs-template', require('./components/FollowingStreamComponent.vue'));
// *
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.

$(document).ready(function(){

/*Global User data for searching*/
var User = function(id,username){
	this.id = id;
	this.username = username;
};
var path = $("#path").val();
var usersArray = [];

$.get({
		headers: {
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: "/usernames"
		})
		.done(function(response) {
			response.forEach(function(data){
				let user = new User(data.id,data.username);
				usersArray.push(user);
			});
		}).fail(function(){
			console.log("No data");
});

/*--------------------------------------------*/






	$('#signupButton').click(function(){
		window.location.replace("\\");
	});


	$('.deleteTweetButton').click(function(){
		
		if(confirm("are you sure you want to delete this Tweet?")){
			let btn = $(this);
			$.ajax({
				headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  },
			  method: "POST",
			  url: "/tweet/"+ btn.data("tweet-id")+"/delete"
			})
			.done(function() {
			    alert( "Tweet Deleted");
			    window.location.href=window.location.href;
			}).fail(function(){
				alert("Can't delete tweetid:" + btn.data("tweet-id") );
			});

		}

	});

	$("#followButton").click(function(){

		let btn = $(this); 

		$.ajax({
			headers: {
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			method: "POST",
			url: "/follow/" + btn.data("auth-id") + "/" + btn.data("user-id")
		})
		.done(function() {
			alert( "Followed ");
		}).fail(function(){
			alert("Can't Follow" );
		});

	});


	$("#tweetImageUploadBtn").click(function(){
		$("#tweetImageUploadInput").trigger('click');
	});


	$("#showFollowingTweetsBtn").click(function(){
		$(".tweets-wrapper").replaceWith('<div class="tweets-wrapper" id="following-stream-container"><fs-template></fs-template></div>');
		new Vue({
			el: "#following-stream-container"
		})
	});

	$("#searchForm").submit(function(e){
		usersArray.forEach(function(user){	
			this.user = user;	
			if(user.username.toLowerCase().search( $("#searchInputBox").val().toLowerCase())!=-1){

				$("#searchForm").attr("action","/profile/"+user.id);

			}
		});
	});


	$("#searchInputBox").bind("keypress",function(){
		self = this;
		/*
		TODO:

		 search autocomplete here

		*/
	});

});

