<?php
   require("./mvc/views/components/header.php");
   require("./mvc/views/components/navbar.php");
  if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    echo "<script type='text/javascript'>alert('$message');</script>";
    unset($_SESSION['message']);
  }
?>

<div class="container">
  <a href="/mini-project/home/insert" class="btn btn-primary" role="button" ><span>&#43;</span> Thêm mới nhân viên</a>
  <table class="table mt-2 table-striped table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col" style="width: 7%">ID</th>
      <th scope="col">Họ tên</th>
      <th scope="col">Email</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col" style="width: 10%">Update</th>
      <th scope="col" style="width: 10%">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($row = mysqli_fetch_array($data["EmployeeList"])){
       ?>
    <tr>
      <th scope="row"><?php echo $row['id'] ?></th>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['phone'] ?></td>
      <td>
        <a href="/mini-project/home/update/<?php echo $row['id'] ?>" class="btn btn-success btn-sm" role="button" >
          <i class="fa fa-pencil-square-o"></i>
        </a>
      </td>
      <td><a href="/mini-project/home/delete/<?php echo $row['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" class="btn btn-danger btn-sm" role="button" ><i class="fa fa-trash"></i></a></td>
    </tr>
    <?php }?>
  </tbody>
</table>
</div>
