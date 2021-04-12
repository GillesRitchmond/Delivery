<html>
 <head>
  <title>Delivery Management System</title>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

  <!-- <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script> -->

  <style>
  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
  }
  .box
  {
   width:1270px;
   padding:20px;
   background-color:#fff;
   border:1px solid #ccc;
   border-radius:5px;
   margin-top:25px;
   box-sizing:border-box;
  }
  .orange{
      background-color: orange;
  }
  </style>
 </head>
 <body>
  <div class="container box">
   <h1 align="center">Delivery Management System</h1>
   <br />
   <div class="table-responsive">
   <br />
    <div align="right">
     <button type="button" name="add" id="add" class="btn btn-info">Add</button>
    </div>
    <br />
    <div id="alert_message"></div>
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
      <th>No Facture</th></th>
            <th>Expediteur</th>
            <th>Heure d'envoie</th>
            <th>Receveur</th>
            <th>Heure de Reception</th>
            <th>Temps d'attente</th>
       <th></th>
      </tr>
     </thead>
    </table>
   </div>
  </div>
 </body>
</html>

<script type="text/javascript" language="javascript">
 $(document).ready(function(){
  
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#user_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetch.php",
     type:"POST"
    }
    // ,
    // "createdRow": function( row, data, dataIndex ) {
    //     if ( data[1] == "" ) {        
    //         $(row).addClass('orange');
    //     }
    // }
    
   });
  }

  function update_data(id, column_name, value)
  {
        $.ajax({
            url:"update.php",
            method:"POST",
            data:{id:id, column_name:column_name, value:value},
            success:function(data)
            {
                $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                $('#user_data').DataTable().destroy();
                $('#row').css('background-color','#fd7e14')
                fetch_data();
            }
        });
            setInterval(function(){
            $('#alert_message').html('');
        }, 5000);
    }

    $(document).on('blur', '.update', function(){
        var id = $(this).data("id");
        var column_name = $(this).data("column");
        var value = $(this).text();
        update_data(id, column_name, value);
    });
  
    $('#add').click(function(){
        var html = '<tr id="row">';
        html += '<td contenteditable id="data1"></td>';
        html += '<td contenteditable id="data2"></td>';
        html += '<td contenteditable id="data3"></td>';
        html += '<td contenteditable id="data4"></td>';
        html += '<td contenteditable id="data5"></td>';
        html += '<td contenteditable id="data6"></td>';
        html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
        html += '</tr>';
        $('#user_data tbody').prepend(html);
    });
  
    $(document).on('click', '#insert', function(){
        var numero_fiche = $('#data1').text();
        var envoyeur = $('#data2').text();
        var heure_envoie = $('#data3').text();
        var receveur = $('#data4').text();
        var heure_reception = $('#data5').text();
        var temps_attente = $('#data6').text();
   
        if(numero_fiche != '' && envoyeur != '' && heure_envoie != '' && receveur != '' && heure_reception != '' && temps_attente != '')
        {
            $.ajax({
                url:"insert.php",
                method:"POST",
                data:{numero_fiche:numero_fiche, envoyeur:envoyeur, heure_envoie:heure_envoie, receveur:receveur, heure_reception:heure_reception, temps_attente:temps_attente},
                success:function(data)
                {
                    $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                    $('#row').css('background-color','#fd7e14')
                    $('#user_data').DataTable().destroy();
                    fetch_data();
                }
            });

            setInterval(function(){
                $('#alert_message').html('');
            }, 5000);
        }
        else
        {
            alert("Fields is required");
        }
    });
  
  
    $(document).on('click', '.delete', function(){
        var id = $(this).attr("id");
        if(confirm("Are you sure you want to remove this?"))
        {
            $.ajax({
                url:"delete.php",
                method:"POST",
                data:{id:id},
                success:function(data){
                    $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                    $('#user_data').DataTable().destroy();
                    fetch_data();
                }
            });
            
            setInterval(function(){
                $('#alert_message').html('');
            }, 5000);
        }
    });
});
</script>