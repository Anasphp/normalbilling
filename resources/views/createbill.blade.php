<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Billing - Create Bill</title>
  <link rel="icon" href="dist/images/favicon.ico" />
  <!--       <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
  <!--Plugin CSS-->
  <link href="dist/css/plugins.min.css" rel="stylesheet">
  <!--main Css-->
  <link href="dist/css/main.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script type="text/javascript">
         //window.onbeforeunload = function() {
           // return "Dude, are you sure you want to leave?";
          //}
          function addCurrentProduct(){
            if($("#name").val() =="" ||  $("#size").val()=="" || $("#price").val() =="" || $("#quantity").val()=="") {
              alert("All Fields Required");
              return false;
            }
            var bills_id = $("tr[name=row]").attr('id');
            if(bills_id == undefined) {
              bills_id = 0;
            }
              // console.log(bills_id);
              $('#dataTable').css("display","inline-block");
              $('button').css("display","inline-block");
              var formData = {
                name     : $.trim($("#name").val().split('-')[0]),
                size     : $("#size").val(),
                price    : $("#price").val(),
                quantity : $("#quantity").val(),
                bill     : bills_id
              }
              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
              $.ajax({
                type     : "POST",
                url      : '/addCurrentProduct',
                data     : formData,
                cache    : false,
                success  : function(data) {
                  $("#name").val('');
                  $("#size").val('');
                  $("#price").val('');
                  $("#quantity").val('');
                  $('#name').focus();
                  var markup = "<tr id='"+data['bills_id']+"' name='row'><td><input type='checkbox' name='record' id='"+data['orders_id']+"'></td><td>" + data['order_name'] + "</td><td>" + data['order_size'] + "</td><td>" + data['order_price'] + "</td><td>" + data['order_quantity'] + "</td><td>" + data['total_price'] + "</td></tr>";
                  $("#dataTable tbody").append(markup);
                  $("#size").removeAttr('disabled');
                  $("#price").removeAttr('disabled');
                }
              }) 
            }
            $(document).ready(function(){
              $('#quantity').keypress(function (e) {
               var key = e.which;
             if(key == 13)  // the enter key code
             {
              addCurrentProduct();
            }
          });   
              $(".add-product").click(function(){
                addCurrentProduct();
              });

              // Find and remove selected table rows
              $(".delete-product").click(function(){
                var bills_id = $("tr[name=row]").attr('id');
                if(bills_id == undefined) {
                  bills_id = 0;
                }
                $("table tbody").find('input[name="record"]').each(function(){
                  if($(this).is(":checked")){
                   $("input:checkbox[name=record]:checked").each(function () {
                    $.ajax({
                      type     : "POST",
                      url      : '/deleteCurrentProduct',
                      data     : {
                        id: $(this).attr("id"),
                        bill: bills_id
                      },
                      cache    : false,
                      success  : function(data) {

                      }
                    })
                    $(this).parents("tr").remove();
                  });
                 }
               });
              });
            });    

          </script>
          <style type="text/css">
          form{
           margin: 20px 0;
         }
         form input, button{
           padding: 5px;
         }
         table{
           width: 100%;
           margin-bottom: 20px;
           border-collapse: collapse;
         }
         table, th, td{
           border: 1px solid #cdcdcd;
         }
         table th, table td{
           padding: 10px;
           text-align: left;
         }
         .form-select input[type="checkbox"]{
           position:inherit !important;
           visibility: visible;
         }
       </style>
     </head>
     <body>
      @include('header', ['title' => "Create Bill"])
      <!-- main-content-->
      <div class="wrapper">
       @include('sidebar')
       <div id="content">
        <div class="row">
         <div class="col-12 col-sm-12">
          <div class="card redial-border-light redial-shadow mb-4 custom-tabs">
           <div class="card-body" style="height: 904px;">
            <h6 class="header-title pl-3 redial-relative">Create Bill</h6>
            <div class="form-select">
             <form action="addCurrentProduct" method="post">
              <div class="form-group" data-book-index=0>
               <div class="col-xs-3">
                <input type="text" class="form-control" name="bill[name][]" placeholder="Name" id="name" autocomplete="off"  required />
              </div>
              <div class="col-xs-3">
                <input type="text" class="form-control" name="bill[size][]" placeholder="Size" id="size" required />
              </div>
              <div class="col-xs-2">
                <input type="text" class="form-control" name="bill[price][]" placeholder="Price" id="price" required />
              </div>
              <div class="col-xs-2">
                <input type="text" class="form-control" name="bill[price][]" placeholder="Quantity" id="quantity" required/>
              </div>
              <div class="col-xs-1">
                <button type="button" class="btn btn-primary addButton add-product"><i class="fa fa-plus"></i> </button>
                <button type="button" class="btn btn-primary" id="refresh_values"><i class="fa fa-undo"></i> </button>
              </div>
            </div>
          </form>
          <div id="dataTable" style="display: none; width: 982px;">
            <table>
             <thead>
              <tr>
               <th>Select</th>
               <th>Product Name</th>
               <th>Product Size</th>
               <th>Product Prize</th>
               <th>Quantity</th>
               <th>Total</th>
             </tr>
           </thead>
           <tbody>
            <tr>
            </tr>
          </tbody>
        </table>
      </div>
      <div>                
        <button type="button" class="delete-product btn btn-primary btn-xs" style="display: none;">Remove Product</button>
        <a href="{{ route('submitOrder') }}" class=""><button type="button" class="submit-order btn btn-primary btn-xs" style="display: none;">Submit Order</button></a>
        <a href="{{ route('cancelOrder') }}" class=""><button type="button" href="{{ url('cancelOrder') }}" class="cancel-order btn btn-primary btn-xs" style="display: none;">Cancel Order</button></a>                  
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
<!-- End main-content-->
<!-- Top To Bottom-->
<a href="#" class="scrollup text-center redial-bg-primary redial-rounded-circle-50">
 <h4 class="text-white mb-0"><i class="icofont icofont-long-arrow-up"></i></h4>
</a>
<!-- End Top To Bottom-->
<!-- jQuery -->
<script src="dist/js/plugins.min.js"></script>
<script src="dist/js/common.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->


<!-- Import typeahead.js -->
<script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

<!-- Initialize typeahead.js on the input -->
<script>

  $(".form-group").on('click', function() {
    autocomplete();
  });
  $("#refresh_values").on('click', function() {
    $("#size").removeAttr('disabled');
    $("#price").removeAttr('disabled');
    $("#name").val('');
    $("#size").val('');
    $("#price").val('');
    $("#quantity").val('');
    $('#name').focus();
  });

  $("#name").on('keyup', function(e) {
    var value = $("#name").val();
    if (value === '') {
     $("#size").val('');
     $("#price").val('');
   }
   var keyCode = e.keyCode || e.which; 
   if (keyCode == 9 || keyCode == 13) {
     e.preventDefault();
     autocomplete();
   }
 });

  function autocomplete(){
    var value = $("#name").val();
    var pattern = / - /;
    var exists = pattern.test(value);
    if(exists) {
      var formData = {
        value     : value,
      }
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type     : "POST",
        url      : '/getSizePrice',
        data     : formData,
        cache    : false,
        success  : function(data) {
          $("#size").val(data.products_size);
          $("#price").val(data.products_price);
          $("#name").attr('disabled','disabled');
          $("#size").attr('disabled','disabled');
          $("#price").attr('disabled','disabled');
          $('#quantity').focus();
        }
      })
    }
  } 

  $(document).ready(function() {
    var bloodhound = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.whitespace,
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      remote: {
        url: '/user/find?q=%QUERY%',
        wildcard: '%QUERY%'
      },
    });

    $('#name').typeahead({
      hint: true,
      highlight: true,
      minLength: 1
    }, {
      name: 'users',
      source: bloodhound,
      display: function(data) {
        var data = data.products_name+' - '+data.products_size
        return data;
      },
      templates: {
        empty: [
        //'<div class="list-group search-results-dropdown"><div class="list-group-item">Not  found.</div></div>'
        ],
        header: [
        '<div class="list-group search-results-dropdown">'
        ],
        suggestion: function(data) {
          return '<div style="font-weight:normal; margin-top:-10px ! important;" class="list-group-item" id="search" product-id="'+ data.products_id +'">' + data.products_name +' - '+ data.products_size +'</div></div>'
        }
      }
    }); 
  });
</script>

</body>
</html>