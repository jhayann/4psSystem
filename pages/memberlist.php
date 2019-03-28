
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">LIST</h1>
           
          </div>    

<div class="card shadow">
    <div class="card-header">Member list</div>
    <div class="card-body" style="overflow-x:scroll">
    <table class="table" id="membertbl">
        <thead>
            <th>Member ID</th>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Middle Initial</th>
            <th>Civil Status</th>
            <th>Barrio</th>
        </thead>
        <tbody>
             <?php
        
       require 'app/autoload.php';
        $db = new Database();
        $db = $db->connect();
        $member = new Member($db);
        $members= $member->read();
        $members=json_decode($members);
            foreach ($members as $m)
            {
                echo '
                <tr class="rows">
                    <td><a class="btn btn-sm btn-primary" href="?page=memberupdate&id='. $m->member_id.'">'.$m->member_id.'</a></td>
                     <td>'. $m->lastname .'</td>
                      <td>'.$m->firstname.'</td>
                       <td>'. $m->middlename.'</td>
                        <td>'. $m->civil_status.'</td>
                         <td>'. $m->barrio.'</td>
                
                </tr>
                ';
            }
            
        ?>
        </tbody>
    </table>
    </div>
</div>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>

    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
<script>
   $(document).ready(function(){
       $('#membertbl').DataTable({
        columnDefs: [ { orderable: false, targets: [0,4,5] } ],
        dom: 'Bfrtip',
         buttons: [
        'excel', 'print', 'pdf'
    ]
    }); 
       
       
      /* $(".rows").click(
        function(e){
           // alert("Clicked on row");
            alert(e.target.innerHTML);
        }); */
       
   });
</script>