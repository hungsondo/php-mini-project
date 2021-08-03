<?php
   require("./mvc/views/components/header.php");
   require("./mvc/views/components/navbar.php");
  if(isset($data['err'])){
    $message = $data['err'];
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
?>



<div class="container">
    <h3>Thêm nhân viên</h3>
    <form action="/mini-project/home/postInsert" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Họ và tên</label>
    <input type="text" class="form-control"  name="name" required  placeholder="Họ và tên">
  </div>
  <div class="form-group">
    <label >Email</label>
    <input type="email" class="form-control"  name="email" required placeholder="Email">
  </div>
  <div class="form-group">
    <label >Số điện thoại</label>
    <input type="text" class="form-control"  name="phone" required placeholder="Số điện thoại">
  </div>
  <button type="submit" class="btn btn-primary">Thêm nhân viên</button>
</form>
</div>