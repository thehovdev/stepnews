$(document).ready(function()
{
    $(document).on('click', '#add-field', function(e)
    {
        e.preventDefault();
        console.log("sss"); 
        $count = $('.sub').last().attr('name');
        $i = $count.indexOf('[');
        $count = $count[$i+1]
        $count++;
        console.log($count);
        $n = $count+1;
        $('#subs').append('<p class=\"text-muted m-0\"> - ' + $n + ' -</p> <input autocomplete=\"off\" type=\"text\" class=\"form-control mt-2 mb-2 sub\" name=\"subitems[' + $count + '][name]\" placeholder=\"Enter subitem\"> <input autocomplete=\"off\" type=\"text\" class=\"form-control mt-2 mb-2 sub\" name=\"subitems[' + $count + '][route_name]\" placeholder=\"Enter route name\">');
    });


    $('.toggle-class').change(function() {
        console.log("toggle");
        var type = $(this).data('type');
        var id = $(this).data('id'); 
        var status = $(this).data('status'); 
        
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

          console.log(type);

          $.ajax({
            url: "/helper",
            type:"POST",
            data: {id:id, type:type},
            success:function(data){
                if(type == 'item'){
                    $("input[data-menuid='" + id +"']").each(function (params) {

                        if($(this).data('status') == status)
                            $(this).parent().addClass('active focus');
                        else
                            $(this).parent().removeClass('active focus');
                    });
                }
            },error:function(){ 
                console.log("error!!!!");
            }
        }); 

     
    })
});


