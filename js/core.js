var global_tpl = {
	loading : 
		'<div class="blockUI loading_blockUI" id="J_loading_wrap">'+
			'<div class="overlay overlay_black"></div>'+
			'<div class="content"></div>'+
		'</div>',
	alert : 
		'<div class="blockUI alert_blockUI" id="J_alert_wrap">'+
			'<div class="overlay overlay_white"></div>'+
			'<div class="content"></div>'+
		'</div>',
	confirm :
		'<div class="blockUI confirm_blockUI" id="J_confrim_wrap">'+
			'<div class="overlay overlay_white"></div>'+
			'<div class="content">'+
				'<div class="content_inner"></div>'+
				'<div class="btn_box">'+
					'<a class="btn btn-default btn_cancel" href="javascript:;" role="button">取消</a>'+
					'<a class="btn btn-primary btn_confirm" href="javascript:;" role="button">确定</a>'+
				'</div>'+
			'</div>'+
		'</div>'
}

function showLoading(text){
	if($('#J_loading_wrap').length == 0){
		$('body').append(global_tpl.loading);
	}
	$('#J_loading_wrap .content').text(text);
	$('#J_loading_wrap').show();
}
function hideLoading(){
	$('#J_loading_wrap').hide();
}
function showAlert(text){
	if($('#J_alert_wrap').length == 0){
		$('body').append(global_tpl.alert);
	}
	$('#J_alert_wrap .content').text(text);
	$('#J_alert_wrap').show();
}
function hideAlert(){
	$('#J_alert_wrap').hide();
}
function showConfirm(text){
	if($('#J_confrim_wrap').length == 0){
		$('body').append(global_tpl.confirm);
	}
	$('#J_confrim_wrap .content_inner').text(text);
	$('#J_confrim_wrap').show();
}
function hideConfirm(){
	$('#J_confrim_wrap').hide();
}
$('#J_confrim_wrap').undelegate().delegate({
	'click':function(){
		hideConfirm();
	}
});