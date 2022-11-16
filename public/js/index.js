toastr.options.preventDuplicates=true;
var url = "<? echo 154;";
console.log(url);
$(function() {
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
    })
})