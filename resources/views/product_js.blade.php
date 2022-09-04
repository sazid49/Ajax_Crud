<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    // satart show all product
    function allData() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/all-product",
            success: function(response) {
                let data = "";
                $.each(response, function(key, value) {
                    data = data + "<tr>"
                    data = data + "<td>" + value.id + "</td>"
                    data = data + "<td>" + value.name + "</td>"
                    data = data + "<td>" + value.price + "</td>"
                    data = data + "<td>"
                    data = data + "<a class='btn btn-primary' data-toggle='modal' data-target='#producteditmodal' onclick='editPeoduct("+value.id+")'>Edit</a>"
                    data = data + "<a class='btn btn-danger' onclick='deletePeoduct("+value.id+")'>Delete</a>"
                    data = data + "</td>"
                    data = data + "</tr>"
                })
                $('tbody').html(data);
            }
        })
    }
    allData();
    // end show all product

    //  satart clear data
    function clearData() {
        $('#name').val('');
        $('#price').val('');
        $('#nameError').val('');
        $('#priceError').val('');
    }
    //  end clear data

    // start Add Product
    function addData() {

        let name = $('#name').val();
        let price = $('#price').val();
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                name: name,
                price: price
            },
            url: "/add-product/",
            success: function(data) {
                $("#productaddmodal").modal('hide');
                allData();
                clearData();

                // window.location.reload();
                // $('#productaddmodal').modal('hide');
                // console.log('data added');
            },
               error: function(error) {
                $('#nameError').text(error.responseJSON.errors.name);
                $('#priceError').text(error.responseJSON.errors.price);
            }
        })
    }
    // End Add Product

    // Start Edit Product

    function editPeoduct(id)
    {
       $.ajax({
          type:'GET',
          dataType:'json',
          url:'/product/edit/'+id,
          success:function(data)
          {
              $('#ename').val(data.name);
              $('#eprice').val(data.price);
              $('#id').val(data.id);
          }
       });
    }

    // End Edit Product

    // Start Update Product
       function updateP()
       {
           let id = $('#id').val();
            let name= $('#ename').val();
            let price= $('#eprice').val();
            $.ajax({
                type:'post',
                dataType:'json',
                data:{name:name,price:price},
                url :'/product/edit/'+id,
                success: function(data) {
                    allData();
                    clearData();
                    $("#producteditmodal").modal('hide');
                },
                  error: function(error) {
                // $('#nameError').text(error.responseJSON.errors.name);
                // $('#priceError').text(error.responseJSON.errors.price);
                $('#enameError').text(error.responseJSON.errors.name);
                $('#epriceError').text(error.responseJSON.errors.price);
            }
            })
       }
    // end Update Product

    // delete product

    function deletePeoduct(id)
    {
        $.ajax({
          type:'get',
          dataType:'json',
          url:'/product/delete/'+id,
          success:function(data)
          {
            allData();
          }
       });
    }
</script>
