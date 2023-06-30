<?php
require "database.php";
include_once "views/component/layout.php";
?>
<div class="shadow p-4">
    <div class="container">
    <a href="/" class="text-success"><i class="fa-solid fa-arrow-left"></i> back</a>
</div>
</div>

<div class="container">
<div class="row mt-5">
<div class="col">
    <form action="/result/store" method="post" id="uploadResultForm">
    <div class="row row-cols-1 row-cols-md-2 mb-2">
<div class="form-group col">
					<label for="inputState" class="form-label">State</label>
					<select name="state_id" class="form-select" id="inputState">
						<option>Select state</option>
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

				  <div class="form-group col">
					<label for="InputLGA" class="form-label">LGA</label>
					<select name="lga_id" class="form-select" id="InputLGA">
						<option></option>
					  </select>
				  </div>
                  </div>
                  
                  <div class="row row row-cols-1 row-cols-md-2 mb-2">
                <div class="form-group col">
					<label for="inputWard" class="form-label">Ward</label>
					<select name="ward_id" class="form-select" id="inputWard">
						<option></option>
						
					  </select>
				  </div>

				  <div class="form-group col">
					<label for="InputPU" class="form-label">Polling Unit</label>
					<select name="pu_id" class="form-select" id="InputPU">
						<option></option>
					  </select>
				  </div>
                  </div>

                  <div class="row row-cols-1 row-cols-md-2">
                <div class="form-group col">
					<label for="inputParty" class="form-label">Party Name</label>
                    <select name="party_id" class="form-select" id="inputParty">
                    <option></option>
                    <?php
                        $sql = $conn->query("SELECT * FROM `party`");
                                        while ($row = $sql->fetch_assoc()) {
                                           ?>
                                        <option value="<?= $row['partyid'] ?>"><?= $row['partyname'] ?></option>
                                        <?php
                                        }
                                    ?>
						
					  </select>
				  </div>

				  <div class="form-group col">
					<label for="inputPartyScore" class="form-label">Party Score</label>
					<input type="number" name="party_score" id="inputPartyScore" class="form-control">
				  </div>
          </div>

          <div class="form-group my-3">
    <label for="inputUser" class="form-label">Your Name</label>
    <input type="text" name="entered_user" class="form-control" id="inputUser">
  </div>
                  </div>
                  

                  <button type="submit" name="upload" class="btn btn-success w-100 mt-3">Upload</button>
                  </form>
                  </div>
</div>
</div>

















<?php
include_once "views/component/footer.php";
?>
