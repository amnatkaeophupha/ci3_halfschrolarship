$(document).ready(function(){

    // เมื่อเลือกจังหวัด
    $('#address_province').on('change', function(){
        var province_code = $(this).val();

        // เคลียร์อำเภอ/ตำบล/zip เดิม
        $('#address_amphoe').html('<option value="">-- เลือกอำเภอ/เขต --</option>');
        $('#address_district').html('<option value="">-- เลือกตำบล/แขวง --</option>');
        $('#address_zipcode').val('');

        if(province_code !== ''){
            $.ajax({
                url: 'http://localhost/halfschrolarship/index.php/welcome/get_amphoe',
                type: 'POST',
                dataType: 'json',
                data: {province_code: province_code},
                success: function(response){
                    var options = '<option value="">-- เลือกอำเภอ/เขต --</option>';
                    $.each(response, function(index, item){
                        options += '<option value="'+ item.amphoe_code +'">'+ item.amphoe_name_th +'</option>';
                    });
                    $('#address_amphoe').html(options);
                },
                error: function(){
                    alert('ไม่สามารถดึงข้อมูลอำเภอได้');
                }
            });
        }
    });

    // เมื่อเลือกอำเภอ
    $('#address_amphoe').on('change', function(){
        var amphoe_code = $(this).val();

        // เคลียร์ตำบล/zip เดิม
        $('#address_district').html('<option value="">-- เลือกตำบล/แขวง --</option>');
        $('#address_zipcode').val('');

        if(amphoe_code !== ''){
            $.ajax({
                url: 'http://localhost/halfschrolarship/index.php/welcome/get_district',
                type: 'POST',
                dataType: 'json',
                data: {amphoe_code: amphoe_code},
                success: function(response){
                    var options = '<option value="">-- เลือกตำบล/แขวง --</option>';
                    $.each(response, function(index, item){
                        // ใส่ zip_code เป็น data-zip ไว้ที่ option
                        options += '<option value="'+ item.district_code +'" data-zip="'+ item.zip_code +'">'+ item.district_name_th +'</option>';
                    });
                    $('#address_district').html(options);
                },
                error: function(){
                    alert('ไม่สามารถดึงข้อมูลตำบลได้');
                }
            });
        }
    });

    // เมื่อเลือกตำบล → ใส่ zip ให้เอง
    $('#address_district').on('change', function(){
        var zip = $('#address_district option:selected').data('zip');
        $('#address_zipcode').val(zip ? zip : '');
    });

});
