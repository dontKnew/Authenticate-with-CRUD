<?= $this->extend("app") ?>
<?= $this->section("body") ?>

    <div class="container">
    <h1 class="text-warning text-center mt-3"> <u> CRUD Operation with Codeigniter 4 </u> </h1>
        <div class="my-4 d-flex justify-content-between">
            <a class="btn btn-outline-primary" href="<?= base_url("add-member")?>">Add Member </a>
            <a class="btn btn-outline-danger" href="<?= base_url("clear-members")?>">Clear Data </a>
        </div>
        <hr class="text-light">
        <?php  if(session()->has("success", "newMember")){ ?> 
            <div class="alert alert-success text-center"> <strong>  <?= session('success')?>  </strong></div>
        <?php } ?>
        <table class="table table-dark text-center table-borderless">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile No.</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($members as $value) { ?>
            <tr>
            <th scope="row">#<?php echo  $value['id'] ?></th>
            <td><?php echo $value['name'] ?></td>
            <td><?php echo $value['email'] ?></td>
            <td><?php echo $value['mobile'] ?></td>
            <td>
                <a href="<?= base_url('edit-member/'.$value['id'])?>" class="btn btn-primary">Edit</a>
                <a href="<?= base_url('delete-member/'.$value['id'])?>" class="btn btn-danger my-1">Delete</a>
            </td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
        <hr>
        <div class="d-flex justify-content-between align-items-center">
        <div> Showing <?= $currentPage ?> out of <?= $pager->getPageCount()?> </div>
        <div class="d-flex">
        <?php if ($pager) :?>
                <?php $pagi_path='index.php/members'; ?>
                <?php $pager->setPath($pagi_path); ?>
                <?= $pager->simpleLinks() ?>
	        <?php endif ?>
        </div>
        </div>

        </div>
<?= $this->endSection() ?>