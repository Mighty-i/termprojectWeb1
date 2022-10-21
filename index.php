<?php
include("check.php");
?>

<!-- $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
if (!empty($_POST['q_name'])) {
  $sql_search = " where position like '%" . $_POST['q_name'] . "%' "; // like '%keyword%'
} else {
  $sql_search = '';
}

$rs = $conn->query("select * from company");
$page = (!empty($_GET['page'])) ? $_GET['page'] : 1;

//get total rows
$rs = $conn->query("select count(id) as num from company $sql_search ");
$totalRow =  $rs->fetch_array()['num'];
$rowPerPage = 5; //5แถว

if ($totalRow == 0)
  $totalPage = 1;
else
  $totalPage = ceil($totalRow / $rowPerPage);

$startRow = ($page - 1) * $rowPerPage;

$rs = $conn->query("select * from company $sql_search limit $startRow,$rowPerPage ");

?> -->

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="icon" href="/img/favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="js/jquery-3.2.1.min.js"></script>
  <script language-="javascript">
    $().ready(function() {
      show(1);
      // search
      $('#btsearch').click(function() {
        show(1);
      });
      $('#btCancel').click(function() {
        $("#id").val("");
        $("#action").val("add"); // คืนค่ากลับไปที่เพิ่มข้อมูล
        $("#txt_companyname").val("");
        $("#txt_position").val("");
        $("#txt_amount").val("");
        $("#txt_salary").val("");
        $("#txt_location").val("");
      });
      // insert
      $('#bt').click(function() {
        $('#bt').attr('disabled', true);
        var data = $("#f").serialize();
        $.ajax({
          type: "POST",
          url: "ajax_fnc.php",
          dataType: "json",
          data: data,
          success: function(data) {
            if (data.status != "ok") {
              $("#report").html(data.msg); // show error
            } else {
              // clear data in form
              $("#id").val("");
              $("#action").val("add"); // คืนค่ากลับไปที่เพิ่มข้อมูล
              $("#txt_companyname").val("");
              $("#txt_position").val("");
              $("#txt_amount").val("");
              $("#txt_salary").val("");
              $("#txt_location").val("");
            }
            show(1); // refresh table
          },
          error: function(data) {
            console.log(data.responseText);
          }
        });
        $('#bt').attr('disabled', false);
      });
    });

    // function edit(id) {
    //   $.ajax({
    //     type: "POST",
    //     url: "ajax_fnc.php",
    //     dataType: "json",
    //     data: "action=edit&id=" + id,
    //     success: function(data) {
    //       $("#id").val(data.Id);
    //       $("#action").val("update");
    //       $("#id").val(data.Id);
    //       $("#txt_companyname").val(data.companyname);
    //       $("#txt_position").val(data.position);
    //       $("#txt_amount").val(data.amount);
    //       $("#txt_salary").val(data.salary);
    //       $("#txt_location").val(data.location);
    //     },
    //     error: function(data) {
    //       console.log(data.responseText);
    //     }
    //   });

    // }

    function del(id)
      {
        if(confirm("ยืนยันการลบข้อมูล"))
        {
          $.ajax({
            type:"POST",
            url:"ajax_fnc.php",
            dataType:"json",
            data:"action=delete&id="+id,
            success:function(data){
              if(data.status!="ok")
              {
                $("#report").html(data.msg) ; // show error
              }
              show(1) ; // refresh table
            },
            error:function(data){
              console.log(data.responseText) ;
            }
          }) ;
        }
      }

    function show(page) {
      $("#showContain").load("ajax_show.php?page=" + page, {
        q_name: $("#q_name").val()
      }, function() {

      });
    }
  </script>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">JOB </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="btn btn-outline-success" aria-current="page" href="index.php">HOME</a>
          </li>

          <li class="nav-item">
            <a class="btn btn-outline-success" data-bs-target="#add1" data-bs-toggle="modal">เพิ่มงาน</a>
          </li>

        </ul>
        <form class="d-flex" role="search" action="javascript:;" method="post">
          <input class="form-control me-2" type="search" name="q_name" id="q_name" placeholder="ตำแหน่ง" aria-label="Search">
          <button class="btn btn-outline-success" type="submit" id="btsearch">Search</button>
        </form>

        <div>
          <a href="logout.php" class="btn btn-danger" type="submit"> Logout </a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container text-center">
    <div class="d-flex justify-content-center">
      <div class="col-center">

        <div id="showContain"></div>


      </div>


    </div>



  </div>
  <div class="modal" id="add1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Insert</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div id="report"></div>
          <form method="post" id="f" action="javascript:;" class="form-horizontal">
            <div class="form-group">
              <label for="txt_companyname" class="col-1 col-form-label">company</label>
              <div class="col-10">
                <input class="form-control" type="text" id="txt_companyname" name="txt_companyname">
              </div>
            </div>
            <div class="form-group">
              <label for="txt_position" class="col-1 col-form-label">position</label>
              <div class="col-10">
                <input class="form-control" type="text" id="txt_position" name="txt_position">
              </div>
            </div>
            <div class="form-group">
              <label for="txt_amount" class="col-1 col-form-label">amount</label>
              <div class="col-10">
                <input class="form-control" type="text" id="txt_amount" name="txt_amount">
              </div>
            </div>
            <div class="form-group">
              <label for="txt_salary" class="col-1 col-form-label">salary</label>
              <div class="col-10">
                <input class="form-control" type="text" id="txt_salary" name="txt_salary">
              </div>
            </div>
            <div class="form-group">
              <label for="txt_location" class="col-1 col-form-label">location</label>
              <div class="col-10">
                <input class="form-control" type="text" id="txt_location" name="txt_location">
              </div>
            </div>
            <div class="modal-footer">
              <label for="bt" class="col-1 col-form-label"></label>
              <div>
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="action" id="action" value="add"> 
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btCancel">Close</button>
                <button class="btn btn-primary" id="bt">Submit</button>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>