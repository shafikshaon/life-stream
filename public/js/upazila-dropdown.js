$(document).ready(function() {
    $('select[name="district"]').on('change', function(){
        var districtId = $(this).val();
        if(districtId) {
            $.ajax({
                url: '/upazila/get/'+districtId,
                type:'GET',
                dataType:'json',
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },
                success:function(data) {

                    $('select[name="upazila"]').empty();
                    $('select[name="upazila"]').append('<option value="">Search in all Upazila/ Thana </option>');

                    $.each(data, function(key, value){

                        $('select[name="upazila"]').append('<option value="'+ key +'">' + value + '</option>');
                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="upazila"]').empty();
        }
    });
});
