<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="DataTables/media/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="DataTables/media/js/jquery.dataTables.js"></script>
  </head>
  <body>
    <link rel="stylesheet" type="text/css" href="DataTables/media/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="DataTables/media/js/jquery.dataTables.js"></script>
    <table id="example" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
    <link rel="stylesheet" type="text/css" href="DataTables/media/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="DataTables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
      $(document).ready(function()
        {
          $('#example').DataTable(
            {
              "ajax": 'arrays.txt'
            });
        });
    </script>
    <link rel="stylesheet" type="text/css" href="DataTables/media/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="DataTables/media/js/jquery.dataTables.js"></script>
  </body>
</html>
