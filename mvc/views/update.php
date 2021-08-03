<?php
   require("./mvc/views/components/header.php");
   require("./mvc/views/components/navbar.php");
   if(isset($data['err'])){
    $message = $data['err'];
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
?>

<div class="container">
    <h3>Cập nhật thông tin nhân viên</h3>
    <form action="/mini-project/home/postUpdate/<?php echo $data["id"] ?>" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Họ và tên</label>
    <input type="text"  class="form-control" value="<?php echo $data["name"] ?>"  name="name" required  placeholder="Book Name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control" value="<?php echo $data["email"] ?>"  name="email" required placeholder="Category">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Số điện thoại</label>
    <input type="text" class="form-control" value="<?php echo $data["phone"] ?>"  name="phone" required placeholder="Category">
  </div>
  <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
</div>