<?php require APP_ROOT . '/views/inc/header.php' ?>
<a href="<?php echo URL_ROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="card card-body bg-light mt-5">
   <h3>Add work</h3>
   <p>Create a new work</p>
   <form action="<?php echo URL_ROOT; ?>?url=posts/store" method="POST">
      <div class="form-group">
         <label for="name">Name: <sup>*</sup></label>
         <input type="text" name="name" class="form-control form-control">
      </div>
      <div class="form-group">
         <label for="name">Start date: <sup>*</sup></label>
         <input type="date" name="start_date" class="form-control form-control">
      </div>
      <div class="form-group">
         <label for="name">End date: <sup>*</sup></label>
         <input type="date" name="end_date" class="form-control form-control">
      </div>
      <div class="form-group">
         <label for="status">Status</label>
         <select class="form-control" id="status" name="status">
            <option value="1">Planning</option>
            <option value="2">Doing</option>
            <option value="3">Complete</option>
         </select>
      </div>
      <input type="submit" class="btn btn-success" value="Submit" />
   </form>
</div>
<?php require APP_ROOT . '/views/inc/footer.php' ?>