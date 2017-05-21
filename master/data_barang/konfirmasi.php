<head>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script language="JavaScript" type="text/javascript">
  $(document).ready(function(){
  $("a.delete").click(function(e){
      if(!confirm('Are you sure?')){
          e.preventDefault();
          return false;
      }
      return true;
  });
  });
  </script>
</head>
