$(function(){
	var formWidth = $('.bootstrap-admin-login-form').innerWidth();
    var alertPadding = parseInt($('.alert').css('padding'));
    $('.alert').width(formWidth - 2 * alertPadding);
    $('.close').click(function(){
    	$('.alert').hide();	
    })
    
})
function del(type,id){
	$.post('/del',{id:id,type:type},function(data){
		if(data.status=='ok'){
			alert(data.message);
			location.reload();
		}else{
			alert(data.message);
		}
	})
}
function login(){
	var username = $('#username').val();
	var password = $('#password').val();
	if(username=='' || password==''){
		$('.alert').show();
	}else{
		$.post('/log',{username:username,password:password},function(data){

		},'json')
	}
}