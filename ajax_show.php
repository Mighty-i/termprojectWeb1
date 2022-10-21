<?php
include("check.php") ;
include("connect.php");

$page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
if (!empty($_POST['q_name'])) {
    $sql_search = " where position like '%" . $_POST['q_name'] . "%' "; // like '%keyword%'
} else {
    $sql_search = '';
}

//get total rows
$rs = $conn->query("select count(Id) as num from company $sql_search ");
$totalRow =  $rs->fetch_array()['num'];
$rowPerPage = 5; //5แถว

if ($totalRow == 0)
    $totalPage = 1;
else
    $totalPage = ceil($totalRow / $rowPerPage);

$startRow = ($page - 1) * $rowPerPage;

$rs = $conn->query("select * from company $sql_search limit $startRow,$rowPerPage ");
?>

<?php
if (mysqli_num_rows($rs)) {
    while ($row = mysqli_fetch_assoc($rs)) {
?>
        <div class="shadow-lg bg-white p-2 mt-2 rounded-7" style="width:50rem">
            <table class="table">

                <tr>
                    <th>company</th>
                    <th>position</th>
                    <th>amount</th>

                </tr>
                <td>
                    <?php echo $row["companyname"] ?>
                </td>
                <td>
                    <?php echo $row["position"] ?>
                </td>
                <td>
                    <?php echo $row["amount"] ?>
                </td>
                <tr>
                    <th>salary</th>
                    <th>location</th>
                </tr>
                <td>
                    <?php echo $row["salary"] ?>
                </td>
                <td>
                    <?php echo $row["location"] ?>
                </td>
                <td>
                    <!-- <a href="#" onclick="edit('<?php echo $row['Id'] ?>');" data-bs-target="#add1" data-bs-toggle="modal">
                    <i class="btn btn-outline-success">edit</i> -->
                    <a href="#" onclick="javascript:del('<?php echo $row['Id']?>');">
                    <i class="btn btn-outline-success" id="bt"> delete </i>
                </a> 
                
                </td>
            </table>
        </div>
<?php
    }
}
?>
<br>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item disabled">
            <a href="#" class="page-link">
                <?php echo 'TotalRows:', $totalRow, '/TotalPages:', $totalPage; ?>
            </a>
        </li>
        <?php
        for ($i = 1; $i <= $totalPage; $i++) {
        ?>
            <li <?php echo ($i == $page) ? ' class="page-item active"' : '' ?>>
                <a class="page-link" href="javascript:show(<?php echo $i; ?>)">
                    <?php echo $i; ?>
                </a>
            </li>
        <?php
        }
        ?>
    </ul>
</nav>
<ul class="pagination">
</ul>