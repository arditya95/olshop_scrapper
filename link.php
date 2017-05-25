<!DOCTYPE html>
<html lang="en">
   <head>
     <meta charset="utf-8">
     <title></title>
     <?php include 'template/head.php'; ?>
   </head>
   <body>
      <div id="wrapper">
         <?php include 'template/navbar.php'; ?>
         <div id="page-wrapper">
            <!-- START -->
            <table id="example" class="table table-striped table-bordered table-hover">
               <tbody class="table table-striped table-bordered table-hover">
                  <th style="text-align:center;" class="text-uppercase">No</th>
                  <th style="text-align:center;" class="text-uppercase">Link</th>
                  <th style="text-align:center;" class="text-uppercase">Status</th>
                  <th style="text-align:center;" class="text-uppercase">Action</th>
                    <?php
                      include_once 'setting\koneksi.php';
                      $query = "SELECT * FROM tb_link";
                      $result = mysqli_query($con,$query);
                      $no=1;
                      while ($row = mysqli_fetch_array($result))
                      {
                        if ($row['label']==1) {
                           $flag="Checked";
                           $warna="success";
                        }
                        if ($row['label']==0) {
                           $flag="Uncheked";
                           $warna="danger";
                        }
                        echo "
                        <tr>
                           <td style='text-align:center;' >".$no."</td>
                           <td> <a href='.$row[link].'>$row[link]</a></td>
                           <td class=$warna style='text-align:center;'>$flag</td>
                           <td style='text-align:center;'>
                           <a href='master\action\delete\delete_link.php?id=$row[id_link]' class='delete'>
                           <i class='fa fa-times' aria-hidden='true'></i>Delete</a>
                           </td>
                        </tr>
                        ";

                        $no++;
                      }
                     ?>
               </tbody>
            </table>
            <!-- END -->
         </div>
         </div>
      <?php include 'template/script.php'; ?>
      <?php include 'template/footer.php'; ?>
   </body>
</html>
