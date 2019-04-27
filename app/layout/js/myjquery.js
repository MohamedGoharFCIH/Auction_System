$(function()  {
	'use strict';
	//hide placeholder on focus
	$('[placeholder]').focus(function(){
		$(this).attr('data-text',$(this).attr('placeholder'));
		$(this).attr('placeholder','');
	
	}) .blur(function(){
		$(this).attr('placeholder',$(this).attr('data-text'));

	});
	
	// on hover eye icon convert password to text 
	var passfield = $('.password');
	$('.show-pass').hover(function(){
		passfield.attr('type','text');

	} , function ()
	{
		passfield.attr('type','password');
	});

	$('.confirm').click(function () {
		return confirm('Are you Sure? ');

		});
	
	
}); 



		



