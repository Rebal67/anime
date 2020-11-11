<?php $styles=['admin']; include APPROOT . "/views/fragments/header.php"; ?>
<div class="row">
<?php include APPROOT ."/views/fragments/adminnav.php"; ?>
  <main>
  


  <h1 class="text-center">create serie</h1>


<form class="form" validation>
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
    <h2>Description</h2>
    <div class="editor">
    <textarea id="editor"></textarea>
    </div>
 

</form>













  </main>
</div>





<?php include APPROOT . "/views/fragments/footer.php"; ?>