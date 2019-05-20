jQuery(document).ready(function($){
	$(window).scroll(function(){
        if ($(this).scrollTop() < 200) {
			$('#smoothup') .fadeOut();
        } else {
			$('#smoothup') .fadeIn();
        }
    });
	$('#smoothup').on('click', function(){
		$('html, body').animate({scrollTop:0}, 'fast');
		return false;
		});
});
tinymce.init({
  selector: 'textarea',
  height: 150,
  menubar: false,
  elementpath: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: '//www.tinymce.com/css/codepen.min.css'
});
	
	var element = "#dZUpload";
	var myDropzone = new Dropzone(element,{
		url: "senddropzone.php",
        addRemoveLinks: true,
		uploadMultiple: true,
		maxFilesize: 51,
		maxThumbnailFilesize: 51,
		createImageThumbnails: true,
		parallelUploads: 100,
		maxFiles: 100,
		autoProcessQueue: false,
        success: function (file,response) 
        {
        	swal({
  				title: "REQUESTING SCREENSHOTS",
  				text: "Form Submission Successful!",
  				icon: "success",
			});
			location.reload();
		},
		init: function() {
			dzClosure = this;
			document.getElementById("screenshot_submit").addEventListener("click", function(e) 
			{
				if(checkFileUploaded()){
					if (dzClosure.getQueuedFiles().length > 0) {
						$("#no_attachments_flag").val('0');
						e.stopImmediatePropagation();
						e.preventDefault();
						e.stopPropagation();
						dzClosure.processQueue();
					}
				}
			});
			this.on("complete", function(file) 
			{
				// alert("hii");
				// console.log("file",file);
            if (file.size > 25*1024*1024) {
                this.removeFile(file);
                $("#span_file_size_error").show();
                $('html, body').animate({
			        scrollTop: $("#screenshotForm").offset().top
			    }, 1000);
                return false;
            }else{
                $("#span_file_size_error").hide();
			}
			});
			//send all the form data along with the files:
			this.on("sendingmultiple", function(data, xhr, formData) {
				//formData.append($('form').serializeArray());
				var inputs = $('#screenshotForm :input');
				var values = {};
				inputs.each(function() {
					var name = $(this).attr('name');
					var val = $('[name="'+name+'"]').val();
					if(name=='geo_target' || name=='content_target' || name=='network'){
						val = $('input[name='+name+']:checked').val();
                    }
					formData.append(name, val);
				});
					formData.append("special_instruction", tinyMCE.get('special_instruction').getContent());
					formData.append("campaign_id", tinyMCE.get('campaign_id').getContent());
			});
		}
	});

	function isEmpty(str) {
		return (!str || 0 === str.length);
	}
	function checkFileUploaded(){
		var inputs_val = $('#screenshotForm .required_fields');
		var check = true;
		inputs_val.each(function() {
			var name_field = $(this).attr('name');
			var field_val = $('[name="'+name_field+'"]').val();
			if(name_field=='campaign_id'){
				field_val = tinyMCE.get('campaign_id').getContent();
			}
			if(isEmpty(field_val)){
				if(typeof ($("#span_"+name_field)) !== 'undefined' && $("#span_"+name_field).length > 0){
					$("#span_"+name_field).show();
					check = false;
				}
			}else{
				$("#span_"+name_field).hide();
			}
		});
		if(check == false){
			$('html, body').animate({
		        scrollTop: $("#screenshotForm").offset().top
		    }, 1000);
		}
		return check;
	}
	
	function processForm()
	{	
		swal({
  				title: "REQUESTING SCREENSHOTS",
  				text: "Form Submission Successful!",
  				icon: "success",
  				timer: 9000
			});
		//return false;
		//window.location.href = "miq.php";
		

	}

	$(window).load(function(){
		tinymce.remove('#showOnYes');
		tinymce.remove('#showOnYesContent');
		tinymce.remove('#sites_publishers');
	});
