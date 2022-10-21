<?php
include("check.php") ;
include("connect.php") ;
if(!empty($_GET['id']))
{
  $id = $_GET['id'] ;
  $sql = "select * from  company where id='". $id."' limit 1 " ;
  $rs = $conn->query($sql) ;
  $row = $rs->fetch_array() ;
}
else {
  echo "ข้อมูลไม่ครบ" ;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
    <div class="col-md-6">
        <h2>Insert Student</h2>
        <form method="post" action="update.php" class="form-horizontal">
            <div class="form-group">
              <label for="txt_companyname" class="col-1 col-form-label">company</label>
              <div class="col-10">
                <input class="form-control" type="text" id="txt_companyname" name="txt_companyname" value="<?php echo $row['companyname'];?>">
              </div>
            </div>
            <div class="form-group">
              <label for="txt_position" class="col-1 col-form-label">position</label>
              <div class="col-10">
                <input class="form-control" type="text" id="txt_position" name="txt_position" value="<?php echo $row['position'];?>">
              </div>
            </div>
            <div class="form-group">
              <label for="txt_amount" class="col-1 col-form-label">amount</label>
              <div class="col-10">
                <input class="form-control" type="text" id="txt_amount" name="txt_amount" value="<?php echo $row['amount'];?>">
              </div>
            </div>
            <div class="form-group">
              <label for="txt_salary" class="col-1 col-form-label">salary</label>
              <div class="col-10">
                <input class="form-control" type="text" id="txt_salary" name="txt_salary" value="<?php echo $row['salary'];?>">
              </div>
            </div>
            <div class="form-group">
              <label for="txt_location" class="col-1 col-form-label">location</label>
              <div class="col-10">
                <input class="form-control" type="text" id="txt_location" name="txt_location" value="<?php echo $row['location'];?>">
              </div>
            </div>
            <div class="form-group">
            <label for="bt" class="col-1 col-form-label"></label>
            <div class="col-5">
              <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
             <button class="btn btn-primary" id="bt">Submit</button>
            </div>
          </div>
          </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
