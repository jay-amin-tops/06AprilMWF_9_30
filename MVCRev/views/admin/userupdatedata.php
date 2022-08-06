<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <h3>viewallusers</h3>
    <div class="bg-secondary rounded p-4">
        <div class="card">
            <div class="card-header">
                Edit User
            </div>
            <div class="card-body">
                <?php 
                
                // echo "<pre>";
                // print_r($SelectUsersById['Data'][0]->username);

                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Enter User Name" value="<?php echo $SelectUsersById['Data'][0]->username; ?>" name="username" id="username">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <input type="email" class="form-control" placeholder="Enter Email"  value="<?php echo $SelectUsersById['Data'][0]->email; ?>" name="email" id="email">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <input type="radio" value="Male" <?php if ($SelectUsersById['Data'][0]->gender == "Male") {
                                    echo "checked";
                                }  ?>  name="gender" id="Male"> <label for="Male">Male</label> 
                                <input type="radio" <?php if ($SelectUsersById['Data'][0]->gender == "Female") {
                                    echo "checked";
                                }  ?> value="Female" name="gender" id="Female"> <label for="Female">Female</label> 
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <select class="form-control" name="city" id="city">
                                    <option value="">Select City</option>    
                                <?php foreach ($allCitiesData['Data'] as $key => $value) { ?> <option <?php if ($SelectUsersById['Data'][0]->city == $value->id) {
                                    echo "selected";
                                }  ?>  value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>
<!-- Recent Sales End -->