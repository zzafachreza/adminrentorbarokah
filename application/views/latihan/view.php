<?php
$id = $this->uri->segment(3);
$data = $this->db->query("SELECT * FROM data_$modul WHERE id_$modul='$id'")->row_object();

?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo site_url($modul) ?>"><?php echo ucfirst($modul) ?></a></li>
      <li class="breadcrumb-item active" aria-current="page">Detail</li>
    </ol>
</nav>
<div class="container-fluid">

  <div class="card">
    <div class="card-header">
        
  
  <a href="<?php echo site_url($modul) ?>" class="btn bg-ketiga"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
  
  </div>
      <div class="card-body">

          
          <?php
              

              
              foreach($this->db->query("SHOW FULL COLUMNS from `data_$modul` WHERE FIELD !='id_$modul'")->result() as $col){
              ?>
          
          
      <?php 
              
              if($col->Field=="youtube"){
                      ?>
                      
      
                       <div class="form-group col col-sm-6">
                        <label><strong><?php echo ucfirst(str_replace("_"," ",$col->Comment)) ?> </strong></label>
                          <div>
                          <img src="<?php echo 'https://i.ytimg.com/vi/'.$data->{$col->Field}.'/hq720.jpg' ?>" width="300" />
                            <br/><strong><?php echo $data->{$col->Field} ?></strong>
                          </div>

                       </div>
                
                <?php 
                  }else{
                      ?>
                      
                      <div class="form-group col col-sm-6">
                          <label><strong> <?php echo ucfirst(str_replace("_"," ",$col->Comment)) ?> </strong></label>
                         <p><?php echo $data->{$col->Field} ?></p>
                       </div>
                      
                      <?php
                  }
              ?>
              
              
          
              
              
              <?php } ?>
<hr />



</div>
  
      </div>
      <div class="card-footer">

      </div>
  
  </div>


</div>



