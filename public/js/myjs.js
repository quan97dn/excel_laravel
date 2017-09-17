var controllers = {
	init: function() {
		controllers.registerEvent();
	},
	registerEvent: function() {
		controllers.setButtonIcon(); // set register icon .
		controllers.setConfirmButton(); // set register confirm button .
		controllers.setOnclickSubmitForm(); // set register submit form .
		controllers.setButtonDeleteAll(); // set register button delete all .
		controllers.setActiveMenu(); // set register active menu .
		controllers.setChangeImage(); // set register change image .
	},
	setButtonIcon: function() {

		// set icon buttton html .
		$('.btn-view').html('<em class="fa fa-eye"></em>');
		$('.btn-create').html('<em class="fa fa-plus-circle"></em>');
		$('.btn-update').html('<em class="fa fa-pencil"></em>');
		$('.btn-delete').html('<em class="fa fa-trash"></em>');
		$('.btn-delete-all').html('<em class="fa fa-trash-o"></em>');
		$('.btn-back').html('<em class="fa fa-arrow-left"></em>');
		$('.btn-save').html('<em class="fa fa-floppy-o"></em>');
		$('.btn-reset').html('<em class="fa fa-refresh"></em>');
		$('.btn-resetPass').html('<em class="fa fa-retweet"></em>');
		
	},
	setConfirmButton: function() {

		// set confirm massage button delete
		$('.btn-delete ,.btn-delete-all').on('click', function() {
			var x = confirm("Are you sure you want to delete?");
	        if (x)
	          return true;
	        else
	          return false;
		});

	},
	setOnclickSubmitForm: function() {

		// set event onclick button submit delete
		$('.btn-delete-all').on('click', function() {
			$('#frmChecked').submit();
		});

		// set event onclick button submit create
		$('.btn-save').on('click', function() {
			$('#frmCreate').submit();
		});

		// set event onclick button submit update
		$('.btn-update').on('click', function() {
			$('#frmUpdate').submit();
		});

		// set event onclick button submit reset
		$('.btn-reset').on('click', function() {
			$('#btnReset').click();
		});

	},
	setButtonDeleteAll:function() {

		// set checked btn delete all .
		$('.btn-delete-all').attr("disabled", true);
		$('tbody.question').on('change', function() {
			var ck = $('tbody.question').find('input[type="checkbox"]:checked').length;
			if(ck > 0)
				$('.btn-delete-all').attr("disabled", false);
			else 
				$('.btn-delete-all').attr("disabled", true);
		});

	},
	setActiveMenu:function() {
		// set active memu .
		var url = window.location.pathname;
		if(url.search('users') > 0) $('.menu > li').addClass('active');
	},
	setChangeImage:function() {

		// set change image .
		$('#changephoto').on('click', function() {

			$('#changImage').click();

			$("#changImage").on('change', function(){
				$('#frmChangeImage').submit();
			});
				
		});

	}
}

controllers.init(); // ready js

