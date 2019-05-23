<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Billing - Set Gst</title>
  <link rel="icon" href="dist/images/favicon.ico" />

  <!--Plugin CSS-->
  <link href="dist/css/plugins.min.css" rel="stylesheet">

  <!--main Css-->
  <link href="dist/css/main.min.css" rel="stylesheet">
  <style>
  * {
    box-sizing: border-box;
  }

  body {
    font: 16px Arial;  
  }

  .autocomplete {
    /*the container must be positioned relative:*/
    position: relative;
    display: inline-block;
  }

  input {
    border: 1px solid transparent;
    background-color: #f1f1f1;
    padding: 10px;
    font-size: 16px;
  }

  input[type=text] {
    background-color: #f1f1f1;
    width: 100%;
  }

  input[type=submit] {
    background-color: DodgerBlue;
    color: #fff;
    cursor: pointer;
  }

  .autocomplete-items {
    position: absolute;
    border: 1px solid #d4d4d4;
    border-bottom: none;
    border-top: none;
    z-index: 99;
    /*position the autocomplete items to be the same width as the container:*/
    top: 100%;
    left: 0;
    right: 0;
  }

  .autocomplete-items div {
    padding: 10px;
    cursor: pointer;
    background-color: #fff; 
    border-bottom: 1px solid #d4d4d4; 
  }

  .autocomplete-items div:hover {
    /*when hovering an item:*/
    background-color: #e9e9e9; 
  }

  .autocomplete-active {
    /*when navigating through the items using the arrow keys:*/
    background-color: DodgerBlue !important; 
    color: #ffffff; 
  }
</style>

<style type="text/css">

body 
{
  font-family: Helvetica;
  font-size: 11px;
  color: #000;
}

h3 
{
  margin: 0px;
  padding: 0px;   
}

.suggestionsBox 
{
  position: absolute;
  left: 30px;
  margin: 10px 0px 0px 0px;
  width: 164px;
  background-color: #d0dae4;
  -moz-border-radius: 7px;
  -webkit-border-radius: 7px;
  border: 2px solid #000; 
  color: #fff;
}

.suggestionList 
{
  margin: 0px;
  padding: 0px;
}

.suggestionList li 
{

  margin: 0px 0px 3px 0px;
  padding: 3px;
  cursor: pointer;
}

.suggestionList li:hover 
{
  background-color: #659CD8;
}

</style>
</head>
<body>
  @include('header', ['title' => ""])

  <!-- main-content-->
  <div class="wrapper">
    @include('sidebar')
    <div id="content">
      <div class="row">
        <div class="col-12 col-sm-12">
          <div class="card redial-border-light redial-shadow mb-4 custom-tabs">
            <div class="card-body" style="height:481px;">
              <h6 class="header-title pl-3 redial-relative">Create Bill</h6>
              <div class="form-select">
                <form id="bookForm" method="post" class="form-horizontal">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <div class="autocomplete" style="width:300px;">
                      <input  type="text" id="myInput" name="myCountry" placeholder="Mysql Data" oninput="myFunction()">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="autocomplete" style="width:300px;">
                      <input id="myCountry" type="text" name="myCountry" placeholder="Country" >
                    </div>
                  </div>
<!--                                     <input type="hidden" name="" id="data">
                                    <div class="col-xs-4">
                                        <input type="text" class="form-control" name="bill[name][]" placeholder="Name" id="product_name" autocomplete="off"/>
                                        <div class="suggestionsBox" id="suggestions" style="display: none; z-index: 999;">
                                            <div class="suggestionList" id="autoSuggestionsList" >
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="text" class="form-control" name="bill[size][]" placeholder="Size" />
                                    </div>
                                    <div class="col-xs-2">
                                        <input type="text" class="form-control" name="bill[price][]" placeholder="Price" />
                                    </div>
                                    <div class="col-xs-1">
                                        <button type="button" class="btn btn-primary addButton"><i class="fa fa-plus"></i></button>
                                      </div> -->
                                    </div>
                                    <!-- The template for adding new field -->
                                    <div class="form-group hide" id="bookTemplate">
                                      <div class="col-xs-4 col-xs-offset-1">
                                        <input type="text" class="form-control" name="bill[name][]" placeholder="Name" id="product_name[0]" autocomplete="off"/>
                                        <div id="product_list[0]"></div>
                                      </div>
                                      <div class="col-xs-4">
                                        <input type="text" class="form-control" name="bill[size][]" placeholder="Size" />
                                      </div>
                                      <div class="col-xs-2">
                                        <input type="text" class="form-control" name="bill[price][]" placeholder="Price" />
                                      </div>
                                      <div class="col-xs-1">
                                        <button type="button" class="btn btn-primary removeButton"><i class="fa fa-minus"></i></button>
                                      </div>
                                    </div>
                                    <!--                                 <button class="btn btn-primary btn-md redial-rounded-circle-50 btn-block" style="width: 347px; margin-left:185px;">Create Bill</button> -->
                                  </form>
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
<!-- <script>
    $(document).ready(function(){

     $('#product_name').keyup(function(){ 
        var query = $(this).val();

        if(query != '')
        {
            var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ route('suggestion.fetch') }}",
              method:"POST",
              data:{query:query, _token:_token},
              success:function(data){
               $('#suggestions').fadeIn();  
               $('#suggestions').html(data);
            }});
        }
     else {
        $('#suggestions').fadeOut(); 
    }
});

     $(document).on('click', 'li', function(){  
        $('#product_name').val($(this).text());  

    });  

 });
</script> -->
<script>
  var countries;
  function myFunction() {
   var query = document.getElementById("myInput").value;
   if(query != '')
   {
    var _token = $('input[name="_token"]').val();
    $.ajax({
      url:"{{ route('suggestion.fetch') }}",
      method:"POST",
      data:{query:query, _token:_token},
      success:function(data){
       autocomplete(document.getElementById("myInput"), data);
     }});
  }
}
//  $('#myInput').input(function(){ 
//     var query = document.getElementById("myInput").value;
//     if(query != '')
//     {
//         var _token = $('input[name="_token"]').val();
//          $.ajax({
//           url:"{{ route('suggestion.fetch') }}",
//           method:"POST",
//           data:{query:query, _token:_token},
//           success:function(data){
//              autocomplete(document.getElementById("myInput"), data);
//         }});
//     }
// });

    // autocomplete(document.getElementById("myInput"),['anas']);

    function autocomplete(inp, arr) {

  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/

  inp.addEventListener("input", function(e) {
    var a, b, i, val = this.value;
    /*close any already open lists of autocompleted values*/
    closeAllLists();
    if (!val) { return false;}
    currentFocus = -1;
    /*create a DIV element that will contain the items (values):*/
    a = document.createElement("DIV");
    a.setAttribute("id", this.id + "autocomplete-list");
    a.setAttribute("class", "autocomplete-items");

    /*append the DIV element as a child of the autocomplete container:*/
    this.parentNode.appendChild(a);
    /*for each item in the array...*/
    for (i = 0; i < arr.length; i++) {
      /*check if the item starts with the same letters as the text field value:*/
      if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
        /*create a DIV element for each matching element:*/
        b = document.createElement("DIV");
        /*make the matching letters bold:*/
        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
        b.innerHTML += arr[i].substr(val.length);
        /*insert a input field that will hold the current array item's value:*/
        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
        /*execute a function when someone clicks on the item value (DIV element):*/
        b.addEventListener("click", function(e) {
          /*insert the value for the autocomplete text field:*/
          inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
            });
        a.appendChild(b);
      }
    }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
    var x = document.getElementById(this.id + "autocomplete-list");
    if (x) x = x.getElementsByTagName("div");
    if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
    });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);

    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
    closeAllLists(e.target);
  });
}

countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"]
autocomplete(document.getElementById("myCountry"), countries);

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/


</script>
</body>
</html>