$(document).ready(function(){
        let valArray = new Array();

    // Delete Bulk
    $("#selectAll").change(function() {
        valArray = [];

        if(this.checked) {
            $(".box1").prop("checked",true);
            $("#bulk-delete").removeClass("d-none");
            let count =   $(".box1").filter(':checked').length;
            let checksVal = $(".box1").filter(':checked');
            $(".counter").text(count);
            checksVal.each(function () {
                valArray.push($(this).val())
            });
            $(".ids").val(valArray);
        }else {
            $(".box1").prop("checked",false);
            $("#bulk-delete").addClass("d-none");
        }
    });

    $(".box1").change(function () {
        valArray = [];
      let count =   $(".box1").filter(':checked').length;

       if(count >= 2) {
           $("#bulk-delete").removeClass("d-none");
           $(".counter").text(count);
           let checksVal = $(".box1").filter(':checked');
           $(".counter").text(count);
           checksVal.each(function () {
               valArray.push($(this).val())
           });
           $(".ids").val(valArray);
       }else {
           $("#bulk-delete").addClass("d-none");

       }
    });
    // End Delete Bulk



});
