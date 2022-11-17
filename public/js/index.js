toastr.options.preventDuplicates=true;

$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    // Show Data Into Table 
    $('#country-list-table').DataTable({
        processing:true,
        serverSide: true,
        ajax:"/country-list",
        columns:[
            {data:'id',name:'id'},
            {data:'country_name',name:'country_name'},
            {data:'country_city',name:'country_city'},
            {data:'action',name:'action'},
        ]
    });

    // Add Data To Database 
    $('#add-country').on('submit',function(e){
        e.preventDefault(); 
        // toastr.options.timeOut = 1500; // 1.5s
        // toastr.success('Click Button');
        let form=this;
        $.ajax({
            url:$(form).attr('action'),
            method:$(form).attr('method'),
            data:new FormData(form),
            processData: false,
            contentType: false,
            dataType:'json',
            beforeSend:function(){
                $(form).find('span.error-text').text('');
            },
            success:function(data){
                console.log(data);
                if(data.code==0){
                    $.each(data.error,function(prefix,val){
                        $(form).find('span.'+prefix+'_error').text(val[0]);
                    });
                }else{
                    $(form)[0].reset();
                    $('#country-list-table').DataTable().ajax.reload();
                    toastr.success(data.msg);
                }
            }
        });
    })
    
    // Edit Data using modal 
    $(document).on('click','#editBtn',function(){
        let country_id = $(this).data('id');
        console.log(country_id);
        $.get('edit-country',{country_id}, function(data){
            console.log(data.details.country_name);
            $('.editCountry').modal('show');
            $('.editCountry').find('input[name=country_id]').val(data.details.id);
            $('.editCountry').find('input[name=country_name]').val(data.details.country_name);
            $('.editCountry').find('input[name=country_city]').val(data.details.country_city);

        },'json');
    });

    // Update Data 
    $('#update-country').on('submit',function(e){
        e.preventDefault(); 
        // toastr.options.timeOut = 1500; // 1.5s
        // toastr.success('Click Button');
        let form=this;
        $.ajax({
            url:$(form).attr('action'),
            method:$(form).attr('method'),
            data:new FormData(form),
            processData: false,
            contentType: false,
            dataType:'json',
            beforeSend:function(){
                $(form).find('span.error-text').text('');
            },
            success:function(data){
                console.log(data);
                if(data.code==0){
                    $.each(data.error,function(prefix,val){
                        $(form).find('span.'+prefix+'_error').text(val[0]);
                    });
                }else{
                    $(form)[0].reset();
                    $(this).modal('hide');
                    $('#country-list-table').DataTable().ajax.reload();
                    toastr.success(data.msg);
                }
            }
        });
    })
    
});