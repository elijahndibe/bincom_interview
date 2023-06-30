

$('select[name="state_id"]').on('change', function(){
    var state_id = $(this).val();
    if (state_id) {
        $.ajax({
            url: '/lga/ajax/' + state_id,
            type: "GET",
            dataType:"json",
            success:function(data){
                $('select[name="lga_id"]').html('');
                var d =$('select[name="lga_id"]').empty();
                $.each(data, function(key, value){
                    $('select[name="lga_id"]').append('<option value="'+ value.lga_id + '">' + value.lga_name + '</option>');
             
                });
            },
        });
    } else {
        alert('danger');
    }
    });

    $('select[name="lga_id"]').on('change', function(){
        var lga_id = $(this).val();
        if (lga_id) {
            $.ajax({
                url: '/ward/ajax/' + lga_id,
                type: "GET",
                dataType:"json",
                success:function(data){
                    $('select[name="ward_id"]').html('');
                    var d =$('select[name="ward_id"]').empty();
                    $.each(data, function(key, value){
                        $('select[name="ward_id"]').append('<option value="'+ value.ward_id + '">' + value.ward_name + '</option>');
                 
                    });
                },
            });
        } else {
            alert('danger');
        }
        });

        $('select[name="ward_id"]').on('change', function(){
            var ward_id = $(this).val();
            if (ward_id) {
                $.ajax({
                    url: '/polling-unit/ajax/' + ward_id,
                    type: "GET",
                    dataType:"json",
                    success:function(data){
                        $('select[name="pu_id"]').html('');
                        var d =$('select[name="pu_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="pu_id"]').append('<option value="'+ value.polling_unit_id + '">' + value.polling_unit_name + '</option>');
                     
                        });
                    },
                });
            } else {
                alert('danger');
            }
            });


            // fetch pu result

            $('select[name="pu_id"]').on('change', function(){
                var pu_id = $(this).val();
                if (pu_id) {
                    $.ajax({
                        url: '/pu-results/ajax/' + pu_id,
                        type: "GET",
                        dataType:"json",
                        success:function(data){
                            $('#result').html('');
                            var d =$('#result').empty();
                            $.each(data, function(index, value){
                                let rowNumber = index + 1;
                                let result = `
                                <tr>
                        <th scope="row">${rowNumber}</th>
                        <td>${value.party_abbreviation}</td>
                        <td>${value.party_score}</td>
                        </tr>`
                                $('#result').append(value.party_abbreviation  !== undefined ? result : '<p class="text-center text-danger">No Result Found</p>');
                         
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
                });


                // fetch lga result

                $('select[name="lga_id"]').on('change', function(){
                    var lga_id = $(this).val();console.log(lga_id);
                    if (lga_id) {
                        $.ajax({
                            url: '/lga-results/ajax/' + lga_id,
                            type: "GET",
                            dataType:"json",
                            success:function(data){
                                $('#lga-result').html('');
                                var d =$('#lga-result').empty();
                                let rowNumber = 1;
                                $.each(data, function(key, value){
                                    // console.log("Key:", key);
                                    // console.log("Value:", value);
                                    let lgaResult = `
                                    <tr>
                            <th scope="row">${rowNumber}</th>
                            <td>${key}</td>
                            <td>${value}</td>
                            </tr>`
                                    $('#lga-result').append(lgaResult);
                             
                            rowNumber++    });
                            },
                        });
                    } else {
                        alert('danger');
                    }
                    });