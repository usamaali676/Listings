
<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{asset('assets/scripts/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/jquery-migrate-3.3.2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/mmenu.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/chosen.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/rangeslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/tooltips.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/dropzone.js')}}"></script>
{{-- <script src="{{ asset('assets/js/app.js') }}" defer></script> --}}

<!-- Leaflet // Docs: https://leafletjs.com/ -->

{{-- <script>
$(document).ready( function () {
    $('table').DataTable();
</script> --}}
// <!-- Opening hours added via JS (this is only for demo purpose) -->
<script>
$(".opening-day.js-demo-hours .chosen-select").each(function() {
	$(this).append(''+
        '<option></option>'+
        '<option>Closed</option>'+
        '<option>1 AM</option>'+
        '<option>2 AM</option>'+
        '<option>3 AM</option>'+
        '<option>4 AM</option>'+
        '<option>5 AM</option>'+
        '<option>6 AM</option>'+
        '<option>7 AM</option>'+
        '<option>8 AM</option>'+
        '<option>9 AM</option>'+
        '<option>10 AM</option>'+
        '<option>11 AM</option>'+
        '<option>12 AM</option>'+
        '<option>1 PM</option>'+
        '<option>2 PM</option>'+
        '<option>3 PM</option>'+
        '<option>4 PM</option>'+
        '<option>5 PM</option>'+
        '<option>6 PM</option>'+
        '<option>7 PM</option>'+
        '<option>8 PM</option>'+
        '<option>9 PM</option>'+
        '<option>10 PM</option>'+
        '<option>11 PM</option>'+
        '<option>12 PM</option>');
});
</script>
@php
    $state = \App\Models\State::all();
@endphp

<script>
    function newMenuItem() {
		var newElem = $('tr.pricing-list-item.pattern').first().clone();
		newElem.find('input').val('');
		newElem.appendTo('table#pricing-list-container');
	}

	if ($("table#pricing-list-container").is('*')) {
		$('.add-pricing-list-item').on('click', function(e) {
			e.preventDefault();
			newMenuItem();
		});

		// remove ingredient
		$(document).on( "click", "#pricing-list-container .delete", function(e) {
			e.preventDefault();
			$(this).parent().parent().remove();
		});

		// add submenu
		$('.add-pricing-submenu').on('click', function(e) {
			e.preventDefault();

			var newElem = $(''+
				'<tr class="pricing-list-item ">'+
					'<td>'+
						'<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>'+
                        '<input type="hidden" name="area_id[]" id="">'+
						'<div class="fm-input"><input type="text" placeholder="Area Name" name="areaserve[]" /></div>'+
                        '<div class="fm-input price-name"><select name="state_id[]" id="state"><option value="">Please Select</option>@foreach ($state as $item)<option value="{{$item->id}}">{{$item->name}}</option>@endforeach</select></div>'+
						'<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>'+
					'</td>'+
				'</tr>');

			newElem.appendTo('table#pricing-list-container');
		});

		$('table#pricing-list-container tbody').sortable({
			forcePlaceholderSize: true,
			forceHelperSize: false,
			placeholder : 'sortableHelper',
			zIndex: 999990,
			opacity: 0.6,
			tolerance: "pointer",
			start: function(e, ui ){
			     ui.placeholder.height(ui.helper.outerHeight());
			}
		});
 	}


    // Unit character
    var fieldUnit = $('.pricing-price').children('input').attr('data-unit');
    $('.pricing-price').children('input').before('<i class="data-unit">'+ fieldUnit + '</i>');



	/*----------------------------------------------------*/
	/*  Notifications
	/*----------------------------------------------------*/
	$("a.close").removeAttr("href").on('click', function(){

		function slideFade(elem) {
			var fadeOut = { opacity: 0, transition: 'opacity 0.5s' };
			elem.css(fadeOut).slideUp();
		}
		slideFade($(this).parent());

	});</script>
// <script>

//     Dropzone.options.dropzone =
//          {
// 	    maxFiles: 5,
//             maxFilesize: 4,
//             //~ renameFile: function(file) {
//                 //~ var dt = new Date();
//                 //~ var time = dt.getTime();
//                //~ return time+"-"+file.name;    // to rename file name but i didn't use it. i renamed file with php in controller.
//             //~ },
//             acceptedFiles: ".jpeg,.jpg,.png,.gif",
//             addRemoveLinks: true,
//             timeout: 50000,
//             init:function() {

// 				// Get images
// 				var myDropzone = this;
// 				$.ajax({
// 					url: business/store,
// 					type: 'GET',
// 					dataType: 'json',
// 					success: function(data){
// 					//console.log(data);
// 					$.each(data, function (key, value) {

// 						var file = {name: value.name, size: value.size};
// 						myDropzone.options.addedfile.call(myDropzone, file);
// 						myDropzone.options.thumbnail.call(myDropzone, file, value.path);
// 						myDropzone.emit("complete", file);
// 					});
// 					}
// 				});
// 			},
//             removedfile: function(file)
//             {
// 				if (this.options.dictRemoveFile) {
// 				  return Dropzone.confirm("Are You Sure to "+this.options.dictRemoveFile, function() {
// 					if(file.previewElement.id != ""){
// 						var name = file.previewElement.id;
// 					}else{
// 						var name = file.name;
// 					}
// 					//console.log(name);
// 					$.ajax({
// 						headers: {
// 							  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// 							  },
// 						type: 'POST',
// 						url: delete_url,
// 						data: {filename: name},
// 						success: function (data){
// 							alert(data.success +" File has been successfully removed!");
// 						},
// 						error: function(e) {
// 							console.log(e);
// 						}});
// 						var fileRef;
// 						return (fileRef = file.previewElement) != null ?
// 						fileRef.parentNode.removeChild(file.previewElement) : void 0;
// 				   });
// 			    }
//             },

//             success: function(file, response)
//             {
// 				file.previewElement.id = response.success;
// 				//console.log(file);
// 				// set new images names in dropzone’s preview box.
//                 var olddatadzname = file.previewElement.querySelector("[data-dz-name]");
// 				file.previewElement.querySelector("img").alt = response.success;
// 				olddatadzname.innerHTML = response.success;
//             },
//             error: function(file, response)
//             {
//                if($.type(response) === "string")
// 					var message = response; //dropzone sends it's own error messages in string
// 				else
// 					var message = response.message;
// 				file.previewElement.classList.add("dz-error");
// 				_ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
// 				_results = [];
// 				for (_i = 0, _len = _ref.length; _i < _len; _i++) {
// 					node = _ref[_i];
// 					_results.push(node.textContent = message);
// 				}
// 				return _results;
//             }

// };

// </script>

