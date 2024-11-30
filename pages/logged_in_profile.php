<div class="container">
    <h2>Update Voting Eligibility Details</h2>
    <hr>
    <form method="POST" action=<?php echo "handlers/update-profile.php?user_id={$profile_id}" ?>>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first-name" name="first_name" placeholder="First Name"
                    value=<?php echo $profile['first_name'] ?? "" ?>>
            </div>
            <div class="form-group col-md-4">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last-name" name="last_name" placeholder="Last Name"
                    value=<?php echo $profile['last_name'] ?? "" ?>>
            </div>

            <div class="form-group col-md-4">
                <label for="gender">Gender</label>
                <input type="text" class="form-control" id="gender" name="gender" placeholder="gender" value=<?php echo $profile['gender'] ?? "" ?>>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">Address 1</label>
                <input type="text" class="form-control" id="inputAddress" name=address1
                    placeholder="Apartment, studio, or floor" value=<?php echo $profile['address1'] ?? "" ?>>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress2">Address 2</label>
                <input type="text" class="form-control" id="inputAddress2" name=address2 placeholder="Area" value=<?php echo $profile['address2'] ?? "" ?>>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity" name="city" value=<?php echo $profile['city'] ?? "" ?>>
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" name="state" class="form-control">
                    <option selected><?php echo $profile['state'] ?? "..." ?></option>
                    <option>Andhra Pradesh</option>
                    <option>Arunachal Pradesh</option>
                    <option>Assam</option>
                    <option>Bihar</option>
                    <option>Chhattisgarh</option>
                    <option>Goa</option>
                    <option>Gujarat</option>
                    <option>Haryana</option>
                    <option>Himachal Pradesh</option>
                    <option>Jharkhand</option>
                    <option>Karnataka</option>
                    <option>Kerala</option>
                    <option>Madhya Pradesh</option>
                    <option>Maharashtra</option>
                    <option>Manipur</option>
                    <option>Meghalaya</option>
                    <option>Mizoram</option>
                    <option>Nagaland</option>
                    <option>Odisha</option>
                    <option>Punjab</option>
                    <option>Rajasthan</option>
                    <option>Sikkim</option>
                    <option>Tamil Nadu</option>
                    <option>Telangana</option>
                    <option>Tripura</option>
                    <option>Uttarakhand</option>
                    <option>Uttar Pradesh</option>
                    <option>West Bengal</option>
                    <option>Andaman and Nicobar Islands</option>
                    <option>Andaman and Nicobar Islands</option>
                    <option>Dadra and Nagar Haveli and Daman & Diu</option>
                    <option>The Government of NCT of Delhi</option>
                    <option>Jammu & Kashmir</option>
                    <option>Ladakh</option>
                    <option>Puducherry</option>
                    <option>Lakshadweep</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip" name="zip" value=<?php echo $profile['zip'] ?? "" ?>>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="dateofbirth">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" placeholder="date of birth" value=<?php echo $profile['dob'] ?? "" ?> required>
            </div>
            <div class="form-group col-md-6">
                <label for="constituency_id">Constituency ID</label>
                <input type="text" class="form-control" id="constituency_id" name="constituency_id" value=<?php echo $profile['constituency_id'] ?? "" ?> required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="voter_id">Voter ID</label>
                <input type="text" class="form-control" id="voter_id" name="voter_id" placeholder="Voter ID" value=<?php echo $profile['voter_id'] ?? "" ?> required>
            </div>
            <div class="form-group col-md-6">
                <label for="aadhar_number">Aadhar Number</label>
                <input type="text" name="aadhar_number" class="form-control" id="aadhar_number"
                    placeholder="Aadhar Number" value=<?php echo $profile['aadhar_number'] ?? "" ?> required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary update-profile-button">Update Eligibility</button>
    </form>
</div>