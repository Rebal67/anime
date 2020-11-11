<?php $styles = ['admin'];
include APPROOT . "/views/fragments/header.php"; ?>
<div class="row">
  <?php include APPROOT . "/views/fragments/adminnav.php"; ?>
  <main>


  <h1 class="text-center">Create serie</h1>



    <form class="form" validation>
      <div class="row">
        <div class="col">
          <div class="form-row">
            <div class="form-group col">
              <label for="">name</label>
              <input type="text" name="name" id="" class="form-control" placeholder="name" aria-describedby="helpId">
              <!-- <small id="helpId" class="text-muted"></small> -->
            </div>

            <div class="form-group col">
              <label for="">rating</label>
              <input type="number" name="" max="5" id="" class="form-control" placeholder="rating">
            </div>



          </div>
          <div class="form-row">
            <div class="form-group col">
              <label for="">Serie Status</label>
              <select class="custom-select" name="" id="">
                <option selected>Continuing</option>
                <option value="">Ended</option>
              </select>
            </div>


            <div class="form-group col">
              <label for="">Year</label>
              <input type="number" name="" max="2050" id="" class="form-control" placeholder="rating">
            </div>
          </div>
          <div>
          <h2>Description</h2>
          <div class="editor">
            <textarea id="editor"></textarea>
          </div>
        </div>
        </div>

        <img class="placeholder" src="/images/thumbnail-placeholder.png" alt="">

        
      </div>


      <div>
        <button type="button" name="" id="" class="btn btn-secondary btn-lg ">Cancel </button>
        <button type="button" name="" id="" class="btn btn-success btn-lg">Save</button>
      </div>

    </form>













  </main>
</div>





<?php $js = ['admin']; include APPROOT . "/views/fragments/footer.php"; ?>