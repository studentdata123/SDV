

$('#search_id').click(function(){

  var emp_id = $('#empsearch_text').val().trim();

  //alert(emp_id);

  $.ajax({
            url: 'getsearchuser.php',
            type: 'GET',
            data: {
                emp_id: emp_id
            },
            success: function(returnData){
                //Blank the search_results div.
                //$('#user_id').html('');
                //Parse the result that we got back from search.php
                var results = JSON.parse(returnData);
                //alert(results);
                //var user_id = $('#user_id').val(returnData.user_id);
                //var user_id = val(returnData.user_id);
                //alert(user_id);
                //$('#user_name').val(results.user_name);
                //Loop through the results array and append it to
                //the search_results div.
                // $.each(results, function(key, value){
                //     $('#user_id').append(value + '<br>');
                // });
                //If the results array is empty, display a
                //message saying that no results were found.
               var mnguser =  results.manage_user;

var markup = "<label for='inputEmail3' class='col-sm-2 col-form-label'>Employee Id</label><div class='col-sm-4' ><input name='user_id' id='user_id' class='form-control' value='"+ results.user_id +"' type='text'></div><label for='inputEmail3' class='col-sm-2 col-form-label'>Employee Name</label><div class='col-sm-4' ><input name='user_name' id='user_name' class='form-control' value='"+ results.user_name +"' type='text'></div>";
                //var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + name + "</td><td>" + email + "</td></tr>";
                $('#valueput').append(markup);
                $('#valueput').css("display", "show");
                //$('#search_id').css("pointer-events", "none");
                $('#search_id').attr('disabled','disabled');

                if(mnguser == 1){
                 $('#manage_user').attr('checked','checked');
                }
                if(results.upload_software == 1){
                 $('#upload_software').attr('checked','checked');
                }
                if(results.manage_csp == 1){
                 $('#manage_csp').attr('checked','checked');
                }
                if(results.upload_sbicomm == 1){
                 $('#upload_sbicomm').attr('checked','checked');
                }
                if(results.manage_notification == 1){
                 $('#manage_notification').attr('checked','checked');
                }
                if(results.upload_agreement == 1){
                 $('#upload_agreement').attr('checked','checked');
                }
				        if(results.manage_visitors == 1){
                 $('#manage_visitors').attr('checked','checked');
                }
                if(results.dm_module == 1){
                 $('#dm_module').attr('checked','checked');
                }
                if(results.adhar_managemant == 1){
                 $('#adhar_managemant').attr('checked','checked');
                }
            

                if(results == 0){
                    $('#valueput').html('No results found!');
                    $('#valueput').css("text-align", "center");
                    //$('#valueput').css("display", "none");
                }
            }
        });
});


$('#manage_user').on('change', function(){
   $('#hdmanage_user').val(this.checked ? 1 : 0);
});

 $(document).ready(function() { 
   $('#mobile_no').on('blur', function(){
	  var mobile = $('#mobile_no').val();
	  if (mobile == '') {
		mobile_state = false;
		return;
	  }
	  $.ajax({
		  url: 'checkmobile',
		  type: 'post',
		  data: {
			'mobile_check' : 1,
			'mobile' : mobile,
		  },
		  success: function(response){
			if (response == 'taken' ) {
			  mobile_state = false;
			  $('#mobile_no').css({"borderColor":"red"});
			  $("#mobile_exist").html("<font color='red'>Mobile Number already exist!</font>");
			  $("#mobile_no").reset();
			}

			else if (response == 'not_taken') {
			   mobile_state = true;
			   $('#mobile_no').css({"borderColor":""});
			   $("#mobile_exist").html("");
			 }
		  }
	  });
	 });
	
});