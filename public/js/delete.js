function genericDelete(form, obj, noun) {
	var text = "If you delete this " + obj.toLowerCase() + ", you will not be able to recover " + noun;
	var confirmtext = "Yes, delete " + noun + "!";
	var success_text = obj + " was deleted!";

	swal({
		title: "Are you sure?",
		text: text,
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: confirmtext,
		closeOnConfirm: false
		},
		function(){
			$(form).submit();
			swal("Deleted!", success_text, "success");
	});
}

function del_collection(form) {
	genericDelete(form, 'Collection', 'it');
}

function del_note(form) {
	genericDelete(form, 'Note', 'it');
}