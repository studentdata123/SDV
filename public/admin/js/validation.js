
// for  COMMISSION submit confirm //

function commsubval()
{
	
  if($("#sel_year").val()=="")
    {
        $('#sel_year').css({"borderColor":"red"});
        $('#sel_year').focus();
        $("#year_error").html("<font color='red'>Year should not be blank!</font>");
        return false;    
    }else
    {
        $('#sel_year').css({"borderColor":""});
        $("#year_error").html("");
    }

  if($("#sel_month").val()=="")
    {
        $('#sel_month').css({"borderColor":"red"});
        $('#sel_month').focus();
        $("#month_error").html("<font color='red'>Month should not be blank!</font>");
        return false;    
    }else
    {
        $('#sel_month').css({"borderColor":""});
        $("#month_error").html("");
    }

       if($("#sbicom_csv").val()=="")
       {
         $('#sbicom_csv').css({"borderColor":"red"});
         $('#sbicom_csv').focus();
         $("#sbicom_error").html("<font color='red'>Upload field should not be blank!</font>");
         return false;    
       }else{
       	var allowedFiles = [".csv"];
        var fileUpload = $("#sbicom_csv");
        var lblError = $("#sbicom_error");
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
       	if(regex.test(fileUpload.val().toLowerCase())) {
       		$('#sbicom_csv').css({"borderColor":""});
            $("#sbicom_error").html("");
       	}
       	else
        {
        $("#sbicom_csv").css("border", "1px solid red");
        $('#sbicom_csv').focus();
        $('#sbicom_csv').val('');
        $("#sbicom_error").html("<font color='red'>Please upload files having extensions .csv</font>");
        return false;  
        }
       }

    if(confirm("Are you confirm to submit")==true)
        {
            return true;
        }else{
            return false;
        }

}

function cspattlogsubval()
{
  if($("#attd_date").val()=="")
    {
        $('#attd_date').css({"borderColor":"red"});
        $('#attd_date').focus();
        $("#attd_date_error").html("<font color='red'>Date should not be blank!</font>");
        return false;    
    }else
    {
        $('#attd_date').css({"borderColor":""});
        $("#attd_date_error").html("");
    }

       if($("#sbicom_csv").val()=="")
       {
         $('#sbicom_csv').css({"borderColor":"red"});
         $('#sbicom_csv').focus();
         $("#sbicom_error").html("<font color='red'>Upload field should not be blank!</font>");
         return false;    
       }else{
        var allowedFiles = [".csv"];
        var fileUpload = $("#sbicom_csv");
        var lblError = $("#sbicom_error");
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
        if(regex.test(fileUpload.val().toLowerCase())) {
          $('#sbicom_csv').css({"borderColor":""});
            $("#sbicom_error").html("");
        }
        else
        {
        $("#sbicom_csv").css("border", "1px solid red");
        $('#sbicom_csv').focus();
        $('#sbicom_csv').val('');
        $("#sbicom_error").html("<font color='red'>Please upload files having extensions .csv</font>");
        return false;  
        }
       }

    if(confirm("Are you confirm to submit")==true)
        {
            return true;
        }else{
            return false;
        }
}


function newserv(sel){
    
  var table_id = "status_"+(sel); 

   var typed_id = $('#'+table_id).val(); 

    if (typed_id == '3')
    {
      $(".reason_rejnserv").show();
    }
    else
    {
      $(".reason_rejnserv").hide();
    }

    if (typed_id == '5')
    {
      $(".reason_forwrd").show();
    }
    else
    {
      $(".reason_forwrd").hide();
    }
    
}

$(document).ready(function(){
  
  $("#user_type").change(function() {
      var user_type = $('#user_type').val();
      if (user_type == '6')
      {
        $(".showkma_dist").show();
      }
      else
      {
        $(".showkma_dist").hide();
      }
  });

  $("#selectall").click(function(){
        if(this.checked){
            $('.checkboxall').each(function(){
                $(".checkboxall").prop('checked', true);
            })
        }else{
            $('.checkboxall').each(function(){
                $(".checkboxall").prop('checked', false);
            })
        }
    });

});



