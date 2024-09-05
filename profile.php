<?php
include 'connection.php';
include 'nav.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM address WHERE user_id=$user_id";
$result = $con->query($sql);

$line1 = '';
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $line1 = $row['city'] . ', ' . $row['state'] . ', ' . $row['country'];
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="images/usericon.png" alt="User" class="rounded-circle" width="150">
                    <h4 class="mt-3"><?php echo $_SESSION['name'] . ' ' . $_SESSION['lname']; ?></h4>
                    <p class="text-muted font-size-sm"><?php echo $line1?></p>
                    <!-- <button class="btn btn-primary">Follow</button>
                    <button class="btn btn-outline-primary">Message</button> -->
                </div>
            </div>
            <!-- <div class="card">
                <div class="card-body">
                    Order Details
                </div>
            </div> -->
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $_SESSION['name'] . ' ' . $_SESSION['lname']; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $_SESSION['email']; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone number</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Mobile number</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $line1; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div id="addressInfoContent" class="content-div">
                        <?php
                            // Handle form submissions
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (isset($_POST['editAddress'])) {
                                    // Edit existing address
                                    $user_id = $_SESSION['user_id'];
                                    $address_id = mysqli_real_escape_string($con, $_POST['editAddress']);
                                    $house_no = mysqli_real_escape_string($con, $_POST['inputHouseno']);
                                    $house_name = mysqli_real_escape_string($con, $_POST['inputHousename']);
                                    $line1 = mysqli_real_escape_string($con, $_POST['inputAddress1']);
                                    $line2 = mysqli_real_escape_string($con, $_POST['inputAddress2']);
                                    $city = mysqli_real_escape_string($con, $_POST['inputCity']);
                                    $state = mysqli_real_escape_string($con, $_POST['inputState']);
                                    $pincode = mysqli_real_escape_string($con, $_POST['inputZip']);

                                    // Check if any data has changed before updating
                                    $sql_check = "SELECT * FROM address WHERE address_id = $address_id";
                                    $result_check = $con->query($sql_check);

                                    if ($result_check->num_rows > 0) {
                                        $row = $result_check->fetch_assoc();
                                        if ($row['house_no'] == $house_no && $row['house_name'] == $house_name &&
                                            $row['line1'] == $line1 && $row['line2'] == $line2 &&
                                            $row['city'] == $city && $row['state'] == $state && $row['pincode'] == $pincode) {
                                            echo "<script>alert('No changes made.')</script>";
                                        } else {
                                            $sql_update = "UPDATE address SET house_no='$house_no', house_name='$house_name', line1='$line1', line2='$line2', 
                                                    city='$city', state='$state', pincode='$pincode' WHERE address_id=$address_id AND user_id=$user_id";

                                            if (mysqli_query($con, $sql_update)) {
                                                echo "<script>alert('Address updated successfully')</script>";
                                            } else {
                                                echo "Error updating address: " . mysqli_error($con);
                                            }
                                        }
                                    } else {
                                        echo "Address not found.";
                                    }
                                } elseif (isset($_POST['inputHouseno']) && isset($_POST['inputHousename']) && isset($_POST['inputAddress1']) &&
                                    isset($_POST['inputCity']) && isset($_POST['inputState']) && isset($_POST['inputZip'])) {
                                    // Add new address
                                    $user_id = $_SESSION['user_id'];
                                    $house_no = mysqli_real_escape_string($con, $_POST['inputHouseno']);
                                    $house_name = mysqli_real_escape_string($con, $_POST['inputHousename']);
                                    $line1 = mysqli_real_escape_string($con, $_POST['inputAddress1']);
                                    $line2 = mysqli_real_escape_string($con, $_POST['inputAddress2']);
                                    $city = mysqli_real_escape_string($con, $_POST['inputCity']);
                                    $state = mysqli_real_escape_string($con, $_POST['inputState']);
                                    $pincode = mysqli_real_escape_string($con, $_POST['inputZip']);

                                    $sql_insert = "INSERT INTO address (user_id, house_no, house_name, line1, line2, city, state, country, pincode) 
                                            VALUES ('$user_id', '$house_no', '$house_name', '$line1', '$line2', '$city', '$state', 'India', '$pincode')";

                                    if (mysqli_query($con, $sql_insert)) {
                                        echo "<script>alert('Address added successfully')</script>";
                                    } else {
                                        echo "Error adding address: " . mysqli_error($con);
                                    }
                                }
                            }

                            // Fetch user details and addresses
                            $user_id = $_SESSION['user_id'];

                            // Fetch user details
                            $sql_user = "SELECT * FROM customer WHERE user_id = $user_id";
                            $result_user = $con->query($sql_user);

                            if ($result_user->num_rows > 0) {
                                $user_row = $result_user->fetch_assoc();

                                // Fetch addresses
                                $sql_address = "SELECT * FROM address WHERE user_id = $user_id";
                                $result_address = $con->query($sql_address);

                                if ($result_address->num_rows > 0) {
                                    // Display existing addresses
                                    while ($address_row = $result_address->fetch_assoc()) {
                            ?>
                                        <form class="row g-3 m-3 address-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                            <div class="col-md-6">
                                                <label for="inputHouseno_<?php echo $address_row['address_id']; ?>" class="form-label">House Number<sup>*</sup></label>
                                                <input value='<?php echo $address_row['house_no']; ?>' required type="number" class="form-control" id="inputHouseno_<?php echo $address_row['address_id']; ?>" name="inputHouseno" placeholder="Enter your house number/flat number" min="1" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputHousename_<?php echo $address_row['address_id']; ?>" class="form-label">House Name<sup>*</sup></label>
                                                <input value='<?php echo $address_row['house_name']; ?>' required type="text" class="form-control" id="inputHousename_<?php echo $address_row['address_id']; ?>" name="inputHousename" placeholder="Enter house name" disabled>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputAddress1_<?php echo $address_row['address_id']; ?>" class="form-label">Address 1<sup>*</sup></label>
                                                <input value='<?php echo $address_row['line1']; ?>' required type="text" class="form-control" id="inputAddress1_<?php echo $address_row['address_id']; ?>" name="inputAddress1" placeholder="Apartment, studio, or floor" disabled>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputAddress2_<?php echo $address_row['address_id']; ?>" class="form-label">Address 2</label>
                                                <input value='<?php echo $address_row['line2']; ?>' type="text" class="form-control" id="inputAddress2_<?php echo $address_row['address_id']; ?>" name="inputAddress2" placeholder="Apartment, studio, or floor" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputCity_<?php echo $address_row['address_id']; ?>" class="form-label">City<sup>*</sup></label>
                                                <input value='<?php echo $address_row['city']; ?>' required type="text" class="form-control" id="inputCity_<?php echo $address_row['address_id']; ?>" name="inputCity" disabled>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="inputState_<?php echo $address_row['address_id']; ?>" class="form-label">State<sup>*</sup></label>
                                                <select required id="inputState_<?php echo $address_row['address_id']; ?>" class="form-select" name="inputState" disabled>
                                                    <option selected>Choose...</option>
                                                    <!-- PHP loop to select the saved state -->
                                                    <?php
                                                    $states = array(
                                                        "Andaman and Nicobar Islands", "Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar",
                                                        "Chandigarh", "Chhattisgarh", "Dadra and Nagar Haveli", "Daman and Diu", "Delhi",
                                                        "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jammu and Kashmir", "Jharkhand",
                                                        "Karnataka", "Kerala", "Ladakh", "Lakshadweep", "Madhya Pradesh", "Maharashtra",
                                                        "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Puducherry", "Punjab",
                                                        "Rajasthan", "Sikkim", "Tamil Nadu", "Telangana", "Tripura", "Uttar Pradesh",
                                                        "Uttarakhand", "West Bengal"
                                                    );

                                                    foreach ($states as $state_name) {
                                                        $selected = ($address_row['state'] == $state_name) ? 'selected' : '';
                                                        echo "<option value='$state_name' $selected>$state_name</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="inputZip_<?php echo $address_row['address_id']; ?>" class="form-label">Zip<sup>*</sup></label>
                                                <input value='<?php echo $address_row['pincode']; ?>' required type="text" class="form-control" id="inputZip_<?php echo $address_row['address_id']; ?>" name="inputZip" maxlength="6" disabled>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <button type="button" class="btn btn-primary edit-btn" data-address-id="<?php echo $address_row['address_id']; ?>">Edit Address</button>
                                                <button type="submit" class="btn btn-success save-btn" style="display: none;" data-address-id="<?php echo $address_row['address_id']; ?>">Save Changes</button>
                                                <input type="hidden" name="editAddress" value="<?php echo $address_row['address_id']; ?>">
                                                <button type="button" class="btn btn-danger delete-btn" data-address-id="<?php echo $address_row['address_id']; ?>">Delete Address</button>
                                            </div>
                                        </form>
                            <?php
                                    }
                                } else {
                                    // No addresses found, display form to add new address
                            ?>
                                    <form class="row g-3 m-3 address-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                        <div class="col-md-6">
                                            <label for="inputHouseno" class="form-label">House Number<sup>*</sup></label>
                                            <input required type="number" class="form-control" id="inputHouseno" name="inputHouseno" placeholder="Enter your house number/flat number" min="1">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputHousename" class="form-label">House Name<sup>*</sup></label>
                                            <input required type="text" class="form-control" id="inputHousename" name="inputHousename" placeholder="Enter house name">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputAddress1" class="form-label">Address 1<sup>*</sup></label>
                                            <input required type="text" class="form-control" id="inputAddress1" name="inputAddress1" placeholder="Apartment, studio, or floor">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputAddress2" class="form-label">Address 2</label>
                                            <input type="text" class="form-control" id="inputAddress2" name="inputAddress2" placeholder="Apartment, studio, or floor">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputCity" class="form-label">City<sup>*</sup></label>
                                            <input required type="text" class="form-control" id="inputCity" name="inputCity">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">State<sup>*</sup></label>
                                            <select required id="inputState" class="form-select" name="inputState">
                                                <option selected>Choose...</option>
                                                <!-- PHP loop to select the saved state -->
                                                <?php
                                                $states = array(
                                                    "Andaman and Nicobar Islands", "Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar",
                                                    "Chandigarh", "Chhattisgarh", "Dadra and Nagar Haveli", "Daman and Diu", "Delhi",
                                                    "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jammu and Kashmir", "Jharkhand",
                                                    "Karnataka", "Kerala", "Ladakh", "Lakshadweep", "Madhya Pradesh", "Maharashtra",
                                                    "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Puducherry", "Punjab",
                                                    "Rajasthan", "Sikkim", "Tamil Nadu", "Telangana", "Tripura", "Uttar Pradesh",
                                                    "Uttarakhand", "West Bengal"
                                                );
                                                foreach ($states as $state_name) {
                                                    echo "<option value='$state_name'>$state_name</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="inputZip" class="form-label">Zip<sup>*</sup></label>
                                            <input required type="text" class="form-control" id="inputZip" name="inputZip" maxlength="6">
                                        </div>
                                        <div class="col-12 mt-2">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                            <?php
                                }
                            } else {
                                echo "User not found.";
                            }

                            // Close database connection
                            $con->close();
                            ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const addressId = this.getAttribute('data-address-id');
                const housenoInput = document.getElementById(`inputHouseno_${addressId}`);
                const housenameInput = document.getElementById(`inputHousename_${addressId}`);
                const address1Input = document.getElementById(`inputAddress1_${addressId}`);
                const address2Input = document.getElementById(`inputAddress2_${addressId}`);
                const cityInput = document.getElementById(`inputCity_${addressId}`);
                const stateInput = document.getElementById(`inputState_${addressId}`);
                const zipInput = document.getElementById(`inputZip_${addressId}`);
                const saveButton = document.querySelector(`.save-btn[data-address-id="${addressId}"]`);

                housenoInput.disabled = false;
                housenameInput.disabled = false;
                address1Input.disabled = false;
                address2Input.disabled = false;
                cityInput.disabled = false;
                stateInput.disabled = false;
                zipInput.disabled = false;

                saveButton.style.display = 'inline-block';
                this.style.display = 'none';
            });
        });

        // Handle form submission for save button
        const saveButtons = document.querySelectorAll('.save-btn');
        saveButtons.forEach(button => {
            button.addEventListener('click', function () {
                const addressId = this.getAttribute('data-address-id');
                const housenoInput = document.getElementById(`inputHouseno_${addressId}`).value;
                const housenameInput = document.getElementById(`inputHousename_${addressId}`).value;
                const address1Input = document.getElementById(`inputAddress1_${addressId}`).value;
                const address2Input = document.getElementById(`inputAddress2_${addressId}`).value;
                const cityInput = document.getElementById(`inputCity_${addressId}`).value;
                const stateInput = document.getElementById(`inputState_${addressId}`).value;
                const zipInput = document.getElementById(`inputZip_${addressId}`).value;

                const formData = new FormData();
                formData.append('editAddress', addressId);
                formData.append('inputHouseno', housenoInput);
                formData.append('inputHousename', housenameInput);
                formData.append('inputAddress1', address1Input);
                formData.append('inputAddress2', address2Input);
                formData.append('inputCity', cityInput);
                formData.append('inputState', stateInput);
                formData.append('inputZip', zipInput);

                fetch('<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    location.reload(); 
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error saving changes.');
                });
            });
        });
    });
    </script>
