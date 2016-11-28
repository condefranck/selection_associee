<?php 
    require_once("config.php");

    // Creation et envoi de la requete
    $query = "SELECT * FROM pays ORDER BY nom_pays";
    $result = mysql_query($query);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Select</title>
</head>
<body>
    <form action="index_submit" method="get" accept-charset="utf-8">
       <p>
          <select name="pays" id="select_pays">
               <option value="">--Choisir un pays--</option>
               <?php while ($row = mysql_fetch_assoc($result)) { ?>
                  <option value="<?php echo $row['id_pays'] ?>"><?php echo utf8_encode($row['nom_pays']); ?></option>
               <?php } ?>
               
           </select> 
       </p>
       <p>
          <select name="pays" id="select_ville" disabled>
               <option value="">--Choisir un pays--</option> 
           </select> 
           <img class="loader" src="img/loader.gif" alt="">
       </p>
    </form>
<script src="js/jquery-2.1.4.js"></script>

<script>
    $(document).ready(function() {
         $(".loader").hide();

         $('#select_pays').change(function() {
           var id = $(this).val();
           if(id == ""){
            $('#select_pays option[value=""]').prop('selected', 'true');
            $('#select_ville').prop('disabled', 'true');
           }    
           else
                {
                  $.ajax({
                    url: "requete_ville.php?id="+id,
                    type: 'GET',
                    success: function(data){
                      console.log(data);
                      var rep = JSON.parse(data);
                      opt='';
                      for (var i = 0; i < rep.ville.length; i++) {
                        opt+='<option value="'+rep.ville[i].id_ville+'">'+rep.ville[i].nom_ville+'</option>';
                      }
                      
                      $('#select_ville').html(opt);
                      $('#select_ville').removeAttr('disabled');
                    },
                    beforeSend: function(){
                        $('.loader').show();
                    },
                    complete: function(){
                        $('.loader').hide();
                    }

                  });
         
                }

        });
    });
   
    
</script>
</body>
</html>