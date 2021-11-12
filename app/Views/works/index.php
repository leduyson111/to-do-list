<?php require APP_ROOT . '/views/inc/header.php' ?>
<div class="card card-body mb-3">
    <div class="row">
        <div class="col-3 mr-3 mb-3">
            <a type="button" href="<?php echo URL_ROOT; ?>/works/create" class="btn btn-primary">Create + </a>
        </div>
    </div>
    <div class="card-block">
        <div class="table">
            <table class="table table-sm table-condensed">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['works'] as $work) : ?>
                        <tr>
                            <td><?= $work->name; ?></td>
                            <td><?= $work->start_date; ?></td>
                            <td><?= $work->end_date; ?></td>
                            <td>
                                <?php
                                switch ($work->status) {
                                    case 1:
                                        $status_view = 'Planning';
                                        break;

                                    case 2:
                                        $status_view = 'Doing';
                                        break;

                                    case 1:
                                        $status_view = 'Complete';
                                        break;

                                    default:
                                        $status_view = 'Planning';
                                        break;
                                }
                                echo $status_view;
                                ?>
                            </td>
                            <td>
                                <form>
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div><!-- end div table-responsive -->
    </div>
</div>
<?php require APP_ROOT . '/views/inc/footer.php' ?>