<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <h3>viewallusers</h3>
    <div class="bg-secondary rounded p-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>User Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // echo "<pre>";
                // print_r($SelectAllUsers['Data']);
                $count = 1;
                foreach ($SelectAllUsers['Data'] as $key => $value) { ?>
                    <tr>
                        <td><?php echo $count ; ?></td>
                        <td><?php echo $value->username; ?></td>
                        <td><?php echo $value->gender; ?></td>
                        <td><?php echo $value->email; ?></td>
                        <td><a href="edituser?id=<?php echo $value->id; ?>">Edit</a> </td>
                    </tr>
                <?php $count++;  } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Recent Sales End -->