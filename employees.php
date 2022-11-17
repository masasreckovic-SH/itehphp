<?php

include('config/db_connect.php');
include('models/Company.php');

$query = "SELECT * FROM employee ORDER BY companyid ASC";
$result = mysqli_query($conn, $query);
$employees = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);


?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<div class="container">
    <div class="row">
        <?php foreach ($employees as $employee) : ?>
            <div class="col s12 m6 l4 xl3">
                <div class="card z-depth-0 radius-card">
                    <img src="img/icon.png" alt="pl" class="icon-card">
                    <div class="card-content center">
                        <h5><?php echo htmlspecialchars($employee['name']); ?></h5>
                        <h6><?php echo htmlspecialchars($employee['position']); ?></h6>
                        <h6>at <?php echo returnCompanyName($employee['companyid']) ?></h6>
                    </div>
                    <div class="card-action right-align radius-card">
                        <a href="employee.php?id=<?php echo $employee['id']; ?>" class="amber-text accent-2 text-darken-2">
                            More Info
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include('templates/footer.php'); ?>

</html>