<?php
require "database.php";
include_once "views/component/layout.php";
?>
<div class="shadow p-4">
    <div class="container d-flex justify-content-between">
    <a href="/" class="text-success"><i class="fa-solid fa-arrow-left"></i> back</a>
   

        <a href="/lga-result" class="btn btn-success">View LGA result</a>
   
</div>
</div>

<div class="container">
    <div class="row row-cols-1 row-cols-md-2 mt-5">
    <div class="col">
    <div class="row row-cols-1 row-cols-md-2">
<div class="form-group col">
					<label for="inputState" class="form-label">State</label>
					<select name="state_id" class="form-select" id="inputState">
						<option>Select State</option>
                        <?php
                        $sql = $conn->query("SELECT * FROM `states` WHERE state_id = 25 ");
                                        while ($row = $sql->fetch_assoc()) {
                                           ?>
                                        <option value="<?= $row['state_id'] ?>"><?= $row['state_name'] ?></option>
                                        <?php
                                        }
                                    ?>
						
					  </select>
				  </div>

				  <div class="col">
					<label for="InputLGA" class="form-label">LGA</label>
					<select name="lga_id" class="form-select" id="InputLGA">
						<option>Select LGA</option>
					  </select>
				  </div>
                  </div>
                  
                  <div class="row row-cols-1 row-cols-md-2">
<div class="form-group col">
					<label for="inputWard" class="form-label">Ward</label>
					<select name="ward_id" class="form-select" id="inputWard">
						<option>Select Ward</option>
						
					  </select>
				  </div>

				  <div class="col">
					<label for="InputPU" class="form-label">Polling Unit</label>
					<select name="pu_id" class="form-select" id="InputPU">
						<option>Select Polling unit</option>
					  </select>
				  </div>
                  </div>

                  </div>


                  <div class="col mt-3">
                  <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Party</th>
                        <th scope="col">No of Vote</th>
                        </tr>
                    </thead>
                    <tbody id="result">
                        
                    </tbody>
                    </table>
                  </div>
</div>
</div>







<?php
include_once "views/component/footer.php";
?>
