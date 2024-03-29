<?php $styles = ['admin'];
include APPROOT . "/views/fragments/header.php"; ?>
<div class="row">
  <?php include APPROOT . "/views/fragments/adminnav.php"; ?>
  <main>


  <h1 class="text-center">Create serie</h1>



    <form class="form" enctype="multipart/form-data" method="POST" action="/admin/upload/serie" validation>
      <div class="row">
        <div class="col">
          <div class="form-row">
            <div class="form-group col">
              <label for="">Name</label>
              <input type="text" name="name" id="" class="form-control" placeholder="name" aria-describedby="helpId">
              <!-- <small id="helpId" class="text-muted"></small> -->
            </div>

            <div class="form-group col">
              <label for="">Rating</label>
              <input type="number" name="rating" min="0" max="5" id="" class="form-control" placeholder="rating">
            </div>



          </div>
          <div class="form-row">
            <div class="form-group col">
              <label for="">Serie Status</label>
              <select class="custom-select" name="seriestatus" id="">
                <option value="continuing" >Continuing</option>
                <option value="ended" selected>Ended</option>
              </select>
            </div>


            <div class="form-group col">
              <label for="">Year</label>
              <input type="number" name="year" min="1800" max="2050" id="" class="form-control" placeholder="rating">
            </div>
          </div>
          <div>
          <h2>Description</h2>
          <div class="editor">
            <textarea id="editor" name="description"></textarea>
          </div>
        </div>
        </div>

        <div>
          <img class="placeholder" src="/images/thumbnail-placeholder.png" id="thumbnail" alt="">
          <div>
            <label class="btn btn-secondary" type="button" for="name" >
              Upload thumbnail
            <input type="file" accept="image/*" id="name" name="file" onchange="changeThumbnail(event,'thumbnail')" style="display:none">
            </label>
          </div>
          
        </div>

        
      </div>


      <div>
        <button type="button" name="" id="" class="btn btn-secondary btn-lg ">Cancel </button>
        <button type="submit" name="" id="" class="btn btn-success btn-lg">Save</button>
      </div>

    </form>













  </main>
</div>





<?php $js = ['admin']; include APPROOT . "/views/fragments/footer.php"; ?>