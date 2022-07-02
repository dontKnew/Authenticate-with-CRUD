<?= $this->extend("app") ?>
<?= $this->section("body") ?>

<a href='<?= base_url('/')?>' class="btn btn-success m-2 text-center"> Back</a>
<div class="container" style="margin-top:20px;">
<h1 class="text-primary text-center mt-3 p-2"> <u> Edit Member information :) </u> </h1>
<?php  if(isset($validation)): ?> 
            <div class="alert alert-danger" role="alert">  <?= $validation->listErrors()?> </div>
    <?php endif; ?>    
<hr>
    <form action="<?= base_url('edit-member/'.$member['id'])?>" method="post">
    <div class="mb-3">
        <label for="exampleInputName1" class="form-label">Full name</label>
        <input type="text" value="<?php echo $member['name']?>" class="form-control" name='name'>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" value ="<?php echo $member['email']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mobile Number</label>
        <input type="number" value="<?php echo $member['mobile']?>" class="form-control" id="exampleInputPassword1" name="mobile">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?= $this->endSection() ?>