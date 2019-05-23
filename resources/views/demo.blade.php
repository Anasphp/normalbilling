<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script> 
<script>

$(function()
{
   $( "#q" ).autocomplete({
    source : "{{ url('search/autocomplete') }}",
    minLength: 3,
    select: function(event, ui) {
      console.log('anas');
      $('#q').val(ui.item.value);
    }
  });
});
</script>

<input id="q" placeholder="Search users" name="q" type="text" value="">