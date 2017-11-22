$(function(){
	$("#data").DataTable();
	$("button[name=show-pass]").on('click', function(){
		var change = $(this).attr('data-change');
		var res = change % 2;

		if(change == 'true'){
			$(this).attr({'data-change':'false'});
			$("input[name=password]").attr({'type':'text'});
			$("button[name=show-pass] > i").attr({'class':'glyphicon glyphicon-eye-open'});
		} else {
			$(this).attr({'data-change':'true'});
			$("input[name=password]").attr({'type':'password'});
			$("button[name=show-pass] > i").attr({'class':'glyphicon glyphicon-eye-close'});
		}
	});
	$("input[name=tanggal]").datepicker({'format':'yyyy-mm-dd','autoclose':true});
	$("button[name=select-date]").on('click', function(){
		$("input[name=tanggal]").datepicker('show');
	});
	$("input[name=jam_masuk]").datetimepicker({'format':'HH:mm'});
	$("input[name=jam_keluar]").datetimepicker({'format':'HH:mm'});
	$("button[name=select-time1]").on('click', function(){
		$("input[name=jam_masuk]").datetimepicker('toggle');
	});
	$("button[name=select-time2]").on('click', function(){
		$("input[name=jam_keluar]").datetimepicker('toggle');
	});
});

function konfirmasi()
{
	var tanya = confirm('Apakah Anda yakin akan menghapus data ini ?');
	if(tanya == true){
		return true;
	} else {
		return false;
	}
}