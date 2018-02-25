<?php
    $status['selesai']  ='bg-success';
    $status['pending']  ='bg-secondary';
    $status['proses']   ='bg-warning';
    $bg                 = $status['pending'];
    if (isset($detail['status_pengaduan'])) {
        $key_status     = $detail['status_pengaduan'];
        if (isset($status[$key_status])) {
            $bg         =$status[$key_status];
        }
    }
?>

<h4>Keterangan warna</h4>
<div class="row">
    <div class="col">
        <div class="bg-secondary" style="width: 15px;height: 15px;float: left;margin-right: 10px;margin-top:5px;">
        </div>  
        <h5 style="float: left;"><?php echo strtoupper('pending');?></h5>
    </div>
    <div class="col">
        <div class="bg-warning" style="width: 15px;height: 15px;float: left;margin-right: 10px;">
        </div>  
        <h5 style="float: left;"><?php echo strtoupper('proses');?></h5>
    </div>
    <div class="col">
        <div class="bg-success" style="width: 15px;height: 15px;float: left;margin-right: 10px;">
        </div>  
        <h5 style="float: left;"><?php echo strtoupper('selesai');?></h5>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col">
        
    
<div class="card text-white <?php echo $bg;?> mb-3">
  <div class="card-header">
    <?php
        if (isset($detail['id_pengaduan'])) {
            echo strtoupper('pengaduan #'.$detail['id_pengaduan']);
        }
      ?>
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
    <blockquote class="blockquote mb-0">
            <footer class="blockquote-footer">
            <?php echo (isset($detail['waktu_pengaduan']))? strtolower('dibuat pada '.$detail['waktu_pengaduan']) : '';?>
            </footer>   
        </blockquote>
  </div>

</div>

</div>
</div>