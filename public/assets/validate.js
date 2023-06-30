$('#uploadResultForm').validate({
    rules: {
        state_id: {
            required : true,
        }, 
         lga_id: {
            required : true,
        }, 
        ward_id: {
            required : true,
        }, 
        pu_id: {
            required : true,
        }, 
        party_id: {
            required : true,
        },                   
         party_score: {
            required : true,
        }, 
        entered_user: {
            required : true,
        }, 
    },
    messages :{
        state_id: {
            required : 'Please Enter State',
        },
        lga_id: {
            required : 'Please Enter LGA',
        },
        ward_id: {
            required : 'Please Enter Ward',
        },
        pu_id: {
            required : 'Please Select PU',
        },
        party_id: {
            required : 'Please Select Party',
        }, 
        party_score: {
            required : 'Please Select party_score',
        },
        entered_user: {
            required : 'Please Enter Your Name',
        },
    },
    errorElement : 'span', 
    errorPlacement: function (error,element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    },
    highlight : function(element, errorClass, validClass){
        $(element).addClass('is-invalid');
    },
    unhighlight : function(element, errorClass, validClass){
        $(element).removeClass('is-invalid');
    },
});
