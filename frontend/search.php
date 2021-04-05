  <form method='post' action="" onsubmit="return post()">

    <input type="text" id="search" placeholder="Search">

    <input type="submit" value="Post Comment">
  </form>

  
  <?php
        $starting = 0;
        $increase = 2;
        $endpoint = 6;

        for ($starting; $starting < $endpoint; $starting+=$increase) { 
            echo "<br><br><input type='submit' id='paginate".$starting."' onclick='paginate(this.value)' value='".$starting."'><br>";
        }
    ?>
    <span id="paginate_count" style="visibility: hidden"><?php echo $starting; ?></span>

  <h6 id="search_result"></h6>

  <h6 id="paginate_result"></h6>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
    
function post()
{
  document.getElementById("search_result").value="";
  var search = document.getElementById("search").value;
  if(search)
  {
    $.ajax
    ({
      type: 'post',
      url: '../functions/logic.php',
      data: 
      {
         user_search:search
      },
      success: function (response) 
      {
        document.getElementById("search_result").innerHTML=response;
        
      }
    });
  }
  
  return false;
}

function paginate(value){
  count = document.getElementById("paginate_count").innerHTML;

  data = document.getElementById("paginate"+value).value;
  
  if(data)
  {
    $.ajax
    ({
      type: 'post',
      url: '../functions/logic.php',
      data: 
      {
         user_paginate:data
      },
      success: function (response) 
      {
        document.getElementById("search_result").innerHTML=response;
        
      }
    });
  }
  
  return false;
  
}

</script>