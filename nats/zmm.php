<?php
include("includes.php");
include("session.php");
include("../config/config.php");

?>
    <title>ZMM</title>

<style>
    .green {
  color: green;
}

.violet {
  color: violet;
}
.blue{
    color:blue;
}.orange{
    color:orange;
}
.red{
    color:red;
}
.purple{
    color:purple;
}
</style>
</head>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                            <center><strong class="card-title">ZMM [<?php
         $query="SELECT COUNT(*) as buildings FROM buildings WHERE region='ZMM'";
          $data=mysqli_query($connection,$query);
          while($row=mysqli_fetch_assoc($data)){
          echo $row['buildings'];
    }
    ?> Records]</strong></center>
                            </div>
                            <div class="card-body"><?php
            if(isset($_SESSION['status'])){
                ?>
               <center><strong><span> <div class="alert alert-danger" role="alert">
                   <?php echo $_SESSION['status'];
                unset($_SESSION['status']);?>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></strong>
  </button>
                 </div></span></center>
                 
                <?php
                
            }
            elseif(isset($_SESSION['success'])){
                ?>
                <center><strong><span><div class="alert alert-success" role="alert">
                   <?php echo $_SESSION['success'];
                unset($_SESSION['success']);?>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></strong>
  </button>
                 </div></span></center>
                <?php
                
            }
            ?>
                            <table class="table table-striped" id="example">
                                    <thead>
                                        <tr>
                                          <th scope="col">B Name</th>
                                          <th scope="col">B Code</th>
                                          <th scope="col">Status</th>
                                          <th scope="col">Mtr No</th>
                                          <th scope="col">Champs(Sales)</th>
                                          <th scope="col">IAP</th>
                                          <th scope="col">OAP</th>
                                        <th scope="col">Change Status</th>
                                      </tr>
                                  </thead>
                                  <tbody>
    <?php
    
    $sql="SELECT bname,bcode,region,mtrno,champs_sales,iap,oap,shops,apt,id,bstatus from buildings where region='ZMM'";
    $result=$connection->query($sql);
    while($row=$result->fetch_array()){
      ?>
      <tr>
        <td><a data-toggle="modal" data-target="#mediumModal" data-href="getbuild.php?id=<?php echo $row['id']; ?>" class="openPopup"><?php echo $row['bname']?></a></td>
        <td><a data-toggle="modal" data-target="#mediumModal" data-href="getbuild.php?id=<?php echo $row['id']; ?>" class="openPopup"><?php echo $row['bcode']?></a></td>
        <td class="centered colorText"><a data-toggle="modal" data-target="#mediumModal" data-href="getbuild.php?id=<?php echo $row['id']; ?>" class="openPopup"><?php echo $row['bstatus']?></a></td>
        <td><a data-toggle="modal" data-target="#mediumModal" data-href="getbuild.php?id=<?php echo $row['id']; ?>" class="openPopup"><?php echo $row['mtrno']?></a></td>
        <td><a data-toggle="modal" data-target="#mediumModal" data-href="getbuild.php?id=<?php echo $row['id']; ?>" class="openPopup"><?php echo $row['champs_sales']?></a></td>
        <td><a data-toggle="modal" data-target="#mediumModal" data-href="getbuild.php?id=<?php echo $row['id']; ?>" class="openPopup"><?php echo $row['iap']?></a></td>
        <td><a data-toggle="modal" data-target="#mediumModal" data-href="getbuild.php?id=<?php echo $row['id']; ?>" class="openPopup"><?php echo $row['oap']?></a></td>
       <td>
       <button class="btn btn-warning"><a href="updates/zmm.php?id=<?php echo $row['id']; ?>">Edit</i></a></button>
    </td>
    </tr>
    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

</div><!-- .content -->
    <!-- Modal -->

    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div><!--end of modal--><!--End of modal-->
<div class="clearfix"></div>

</div><!-- /#right-panel -->

<!-- Right Panel -->
<script>
  $(document).ready(function(){
    $(document).on('click','.openPopup',function(){
        var dataURL = $(this).attr('data-href');
        $('.modal-body').load(dataURL,function(){
            $('#myModal').modal({show:true});
        });
    }); 
});
</script>
<script>
$(document).ready(function(){
  $(document).on('click','.openPopup',function(){
        var dataURL = $(this).attr('data-href');
        $('.modal-body').load(dataURL,function(){
            $('#myModal').modal({show:true});
        });
    }); 
});
window.addEventListener('DOMContentLoaded', (event) => {
  var els = document.querySelectorAll('.colorText');
  els.forEach(function(cell) {
    if (cell.textContent === "2. Signed") {
      cell.classList.toggle('violet');
    }
    if (cell.textContent === "7. PAP In Service") {
      cell.classList.toggle('green');
    }
    if (cell.textContent === "6. IAP In Service") {
      cell.classList.toggle('blue');
    }
    if (cell.textContent === "8. PAP>10") {
      cell.classList.toggle('orange');
    }
    if (cell.textContent === "4. Fully Installed") {
      cell.classList.toggle('red');
    }
    if (cell.textContent === "3. Cabled") {
      cell.classList.toggle('purple');
    }
  })
})
</script>
    
</body>
</html>
