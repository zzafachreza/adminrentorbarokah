<?php
$id = $this->uri->segment(3);
$data = $this->db->query("SELECT * FROM data_$modul a JOIN data_pengguna b ON a.fid_pengguna = b.id_pengguna JOIN data_jenispekerjaan c ON b.fid_jenispekerjaan = c.id_jenispekerjaan WHERE id_$modul='$id'")->row_object();

?>
<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url($modul) ?>"><?php echo ucfirst($judul) ?></a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
      </ol>
</nav>
<div class="container-fluid">

    <div class="card">
      <div class="card-header">
            
    
    <a href="<?php echo site_url($modul) ?>" class="btn btn-ketiga"><i class="flaticon2-left-arrow-1"></i> Kembali</a>
    <a href="<?php echo site_url($modul.'/edit/'.$id) ?>" class="btn btn-utama"><i class="flaticon2-edit"></i> Edit</a>
    
  </div>
        <div class="card-body">

              
           <div class="row">
             <div class="col-sm-8">
                <table class="table table-bordered">
                  <tr style="background-color: #295882">
                    <th colspan="2" style="color:white">Identitas Diri</th>
                  </tr>
                   <?php
                    

                    
                    foreach($this->db->query("SHOW FULL COLUMNS from `data_pengguna` WHERE FIELD IN('nama',
                  'fid_jenispekerjaan',
                  'pekerjaan',
                  'perusahaan',
                  'nomor_id',
                  'pendidikan_terakhir')")->result() as $col){
                    
                    ?>
            
            
    
                  <tr>
                     <td width="40%"><?php echo $col->Comment ?></td>
                      <td><?php

                        if($col->Field=='fid_jenispekerjaan'){
                           echo $data->nama_jenispekerjaan;
                        }elseif($col->Type=='date'){
                           echo Indonesia3Tgl($data->{$col->Field});
                        }else{
                          echo $data->{$col->Field};
                        }

                     ?></td>
                  </tr>

                   <?php }  ?>
                </table>



                <table class="table table-bordered" style="margin-top: 20px">
                  <tr style="background-color: #90DE64">
                    <th colspan="2" style="color:white">Data Training</th>
                  </tr>
                   <?php
                    

                    
                    foreach($this->db->query("SHOW FULL COLUMNS from `data_$modul` WHERE FIELD IN('fbh',
'tanggal_training',
'berlaku_sampai',
'jenis_training',
'bidang_training','judul_training')")->result() as $col){
                    
                    ?>
            
            
    
                  <tr>
                     <td width="40%"><?php echo $col->Comment ?></td>
                      <td><?php

                        if($col->Field=='password'){
                           echo "****************";
                        }elseif($col->Type=='date'){
                           echo Indonesia3Tgl($data->{$col->Field});
                        }else{
                          echo $data->{$col->Field};
                        }

                     ?></td>
                  </tr>

                   <?php }  ?>
                </table>


                 <table class="table table-bordered" style="margin-top: 20px">
                  <tr style="background-color: #2AB674">
                    <th colspan="2" style="color:white">Sertifikat</th>
                  </tr>
                   <?php
                    

                    
                    foreach($this->db->query("SHOW FULL COLUMNS from `data_$modul` WHERE TYPE IN('varchar(444)') AND FIELD NOT IN('foto','qr_code')")->result() as $col){
                    
                    ?>
            
            
    
                  <tr>
                     <td width="40%"><?php echo $col->Comment ?></td>
                      <td><a href="<?php echo site_url().$data->{$col->Field} ?>" class="btn btn-danger">Lihat File</a></td>
                  </tr>

                   <?php }  ?>
                </table>
             </div>
             <div class="col-sm-4">
               <img src="<?php echo site_url().$data->foto ?>" width="100%" style="border-radius: 20px;box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;" />


               <img src="<?php echo site_url().$data->qr_code ?>" width="100%" style="margin-top: 30%" />
             </div>



           </div>



        </div>
    
          </div>
          <div class="card-footer">

          </div>
    
    </div>


</div>



