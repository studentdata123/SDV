$(document).ready(function(){

    $('#service_type').on('change', function() {

        //alert(this.value);

      if ( this.value == 'Password Reset')

      {

        $(".hidediv").show();

      }

      else

      {

        $(".hidediv").hide();

      }



      if ( this.value == 'Other')

      {

        $(".hidfor_other").show();

      }

      else

      {

        $(".hidfor_other").hide();

      }

    });



    $('#present_absent').on('change', function() {

      if (this.value == 'Present')

      {

        $(".hidedivpr").show();

        $(".hidedivab").hide();

      }

      else

      {

        $(".hidedivab").show();

        $(".hidedivpr").hide();

      }

    });



    // $('#bgldeposit_amount').on('keyup', function() {

    //   //alert('dddd');

    //   var new_amount = parseInt($('#new_amount').val()); 

    //   var mbu_amount = parseInt($('#mbu_amount').val());

    //   var bioupdate_number = parseInt($('#bioupdate_number').val());

    //   var demoupdate_number = parseInt($('#demoupdate_number').val());

    //   var bgldeposit_amount = parseInt($('#bgldeposit_amount').val());

    //   var totbioupdate = (bioupdate_number * 100);

    //   var totdemoupdate = (demoupdate_number * 50);

    //   var totamount = parseInt(new_amount) + parseInt(mbu_amount) + parseInt(totbioupdate) + parseInt(totdemoupdate)

    //   var ammount_difference = parseInt(bgldeposit_amount) - parseInt(totamount);

    //   $("#bioupdate_amount").val(totbioupdate);

    //   $("#demoupdate_amount").val(totdemoupdate);

    //   $("#total_amount").val(totamount);

    //   $("#ammount_difference").val(ammount_difference);

    // });



    $('#bioupdate_number').on('keyup', function() {

      //alert('dddd');

      var bioupdate_number = parseInt($('#bioupdate_number').val());

      var totbioupdate = (bioupdate_number * 100);

      $("#bioupdate_amount").val(totbioupdate);

    });



    $('#demoupdate_number').on('keyup', function() {

      //alert('dddd');

      var demoupdate_number = parseInt($('#demoupdate_number').val());

      var totdemoupdate = (demoupdate_number * 50);

      $("#demoupdate_amount").val(totdemoupdate);

      var new_number = $('#new_number').val(); 

      var mbu_number = $('#mbu_number').val();

      var bioupdate_number = $('#bioupdate_number').val();

      var demoupdate_number = $('#demoupdate_number').val();

      var totnumber = parseInt(0+new_number) + parseInt(0+mbu_number) + parseInt(0+bioupdate_number) + parseInt(0+demoupdate_number)

      $("#total_number").val(totnumber);

    });



    //  $('#bgldeposit_amount').on('keyup', function() {

    //   //alert('dddd');

    //   var new_amount = $('#new_amount').val(); 

    //   var mbu_amount = $('#mbu_amount').val();

    //   var bioupdate_amount = $('#bioupdate_amount').val();

    //   var demoupdate_amount = $('#demoupdate_amount').val();

    //   var totamount = parseInt(0+new_amount) + parseInt(0+mbu_amount) + parseInt(0+bioupdate_amount) + parseInt(0+demoupdate_amount)

    //   $("#total_amount").val(totamount);

    // });


     $('#bgldeposit_amount').on('keyup', function() {
      //alert('dddd');

      var new_amount = $('#new_amount').val(); 

      var mbu_amount = $('#mbu_amount').val();

      var bioupdate_amount = $('#bioupdate_amount').val();

      var demoupdate_amount = $('#demoupdate_amount').val();

      var totamount = parseInt(0+new_amount) + parseInt(0+mbu_amount) + parseInt(0+bioupdate_amount) + parseInt(0+demoupdate_amount)

      $("#total_amount").val(totamount);

      var bgldeposit_amount = $('#bgldeposit_amount').val(); 

      var total_amount = $('#total_amount').val(); 

      var ammount_difference = parseInt(bgldeposit_amount) - parseInt(total_amount);

      $("#ammount_difference").val(ammount_difference);
      if (ammount_difference!=0) {
        $(".hidedirsn").show();
        $('#reason_difference').prop('required',true);
      }else{
        $(".hidedirsn").hide();
        $('#reason_difference').prop('required',false);
      }

    });
});

function Validate() {
  var password = document.getElementById("password").value;
  var cpassword = document.getElementById("cpassword").value;
  if (password != cpassword) {
      alert("Passwords do not match.");
      return false;
  }
  return true;
}