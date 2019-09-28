<?php 
include 'conn.php';
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Work</th>
            <th>Salary</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $sql = "SELECT a.name, a.id as id_user, b.name as work, c.salary FROM name a, work b, salary c WHERE a.id_work = b.id AND a.id_salary = c.id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <th scope="row"><?php echo $row["name"] ?></th>
                <td><?php echo $row["work"] ?></td>
                <td><?php echo $row["salary"] ?></td>
                <td><img src="img/edit.png" width="10%">
                <a onclick="deleteUser(<?php echo $row["id_user"] ?>)" ><img src="img/trash.png" width="10%"></a></td>
            </tr>
        <?php }
        } ?>
    </tbody>
</table>