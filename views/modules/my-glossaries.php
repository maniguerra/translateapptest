<div class="main-content" >
        <div class="row">
          <div class="col-12">
            <h5>
            My Glossaries
            </h5>
          </div>
          <div class="col-5"></div>
          <div class="col-2"><button class="btn btn-lg btn-info" data-toggle="modal" data-target="#modalCreateGlossary">Create Glossary</button></div>
          <div class="col-5"></div>
          
        </div>

        <div class="row">
          <div class="col-12 mt-4">
          <table class="dataTable table-striped">
              <thead>
                <tr>
                  <th>User</th>
                  <th>Topic</th>
                  <th>Language</th>
                  <th>Answers</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  <!-- ==================================
                  GET ALL MY GLOSSARIES
                  ================================== -->
                <?php 

                $myGlossaries = ControllerGlossaries::ctrGetMyGlossaries();

                ?>
                </tbody>
            
            </table>
          </div>
        </div>
</div>

<!-- ==================================
MODAL CREATE GLOSSARY
================================== -->


<!-- Modal -->
<div class="modal fade" id="modalCreateGlossary" tabindex="-1" role="dialog" aria-labelledby="modalCreateGlossary" aria-hidden="true" style="opacity:0.7; margin-top:10vh">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

            <form role="form" method="post">
              <div class="modal-header" style="background-color:#A49393">
                <h5 class="modal-title" id="modalCreateGlossary">Add New Glossary</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body"  style="background-color:#EED6D3">
                <div class="card-body">
                  <div class="form-group">
                    <div class="input-group mb-4">
                      <span class="input-group-prepend"></span>
                      <input type="text" class="form-control input-lg" name="topic" placeholder="Topic" required>
                    </div>

                    <div class="input-group mb-4">
                      <span class="input-group-prepend"></span>
                      <select class="form-control input-lg" name="language" id="language" required>
                        <option value="">Select a language</option>
                        <option value="english">English</option>
                        <option value="spanish">Spanish</option>
                        <option value="french">French</option>
                        <option value="german">German</option>
                      </select>
                      
                    </div>

                    <div class="input-group mb-4">
                      <span class="input-group-prepend"></span>
                      <input type="text" class="form-control input-lg" name="term1" placeholder="First term" required>
                    </div>

                    <div class="input-group mb-4">
                      <span class="input-group-prepend"></span>
                      <input type="text" class="form-control input-lg" name="term2" placeholder="Second term" required>
                    </div>

                    <div class="input-group mb-4">
                      <span class="input-group-prepend"></span>
                      <input type="text" class="form-control input-lg" name="term3" placeholder="Third term" required>
                    </div>

                    <div class="input-group mb-4">
                      <span class="input-group-prepend"></span>
                      <input type="text" class="form-control input-lg" name="term4" placeholder="Fourth term">
                    </div>

                    <div class="input-group mb-4">
                      <span class="input-group-prepend"></span>
                      <input type="text" class="form-control input-lg" name="term5" placeholder="Fifth term">
                    </div>

                    <span class="text-muted small">The first three terms are required</span>
                  </div>
                </div>
              </div>
              <div class="modal-footer"  style="background-color:#A49393">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Glossary</button>
              </div>

              <?php 

              $createGlossary = new ControllerGlossaries();
              $createGlossary -> ctrCreateGlossaryQuery();
              ?>


            </form>

    </div>
  </div>
</div>

