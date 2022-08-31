<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
</script>
<script>

    //   $(document).on('click','#add_product',function(e){
    //      let name=$('#name').val();
    //      let price=$('#price').val();
    //      $.ajax({
    //         type:"POST",
    //         url: "{{ url('add-product') }}",
    //         data:{name:name,price:price},
    //         success:function(res){
    //             if(res.status =='success'){
    //                 window.location.reload();
    //                 $('.table').load(location.href+' .table');
    //             }
    //         },error:function(err)
    //         {
    //            let error = err.responseJSON;
    //            $.each(error.errors,function(index,value){
    //                 $('.errormessage').append('<span class="text-danger">'+value+'</span>'+'<br>')
    //            });
    //         }
    //      });
    //   });

     function allData(){
        $.ajax({
            type:"GET",
            dataType:"json",
            url:"/all-product",
            success:function(response)
            {
                let data="";
               $.each(response,function(key,value){
                  data= data+ "<tr>"
                    data=data+ "<td>"+value.id+"</td>"
                    data=data+ "<td>"+value.name+"</td>"
                    data=data+ "<td>"+value.price+"</td>"
                    data=data+ "<td>"
                    data=data+ "<a href='' class='btn btn-primary'>Edit</a>"
                    data=data+ "<a href='' class='btn btn-danger'>Delete</a>"
                    data=data+ "</td>"


                  data= data+ "</tr>"

               })
               $('tbody').html(data);
            }

        })
     }
     allData();


   function addData()
    {
        let name =$('#name').val();
        let price =$('#price').val();


    }
</script>
