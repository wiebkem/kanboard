<section id="main">
        <div class="page-header">
            <h2><?= $this->e('#'.$task['id'].' '.$task['title']) ?></h2>
        </div>
        <div class="task-details" style="float:left; width: 50%">
            <?= $this->render('task/description', array('task' => $task)) ?>
            <?= $this->render('tasklink/show', array('task' => $task, 'links' => $links, 'link_label_list' => $link_label_list)) ?>
            <?= $this->render('subtask/show', array('task' => $task, 'subtasks' => $subtasks, 'project' => $project)) ?>
            <?= $this->render('task/time_tracking_summary', array('task' => $task)) ?>
            <?= $this->render('file/show', array('task' => $task, 'files' => $files, 'images' => $images)) ?>
            <?= $this->render('file/new', array('task' => $task, 'max_size' => ini_get('upload_max_filesize'))) ?>
            <?= $this->render('task/comments', array('task' => $task, 'comments' => $comments, 'project' => $project, 'redirect' => 'task')) ?>
        </div>
        <div class="task-basic-details" style="float:right; width: 45%">
            <?= $this->render('task/show_basic_details', array('task' => $task, 'project' => $project)) ?>
        </div>

    <form method="post" action="<?= $this->url->href('board', 'show', array('taskmodification' => 'edit', 'task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>" autocomplete="off" class="form-task">
        <div class="page-footer">
            <div class="form-actions" style="float: right">
                <input type="submit" value="<?= t('Edit') ?>" class="form-task btn btn-blue"/>
                <?php if (! isset($skip_cancel)): ?>
                    <?= t('or') ?>
                    <?= $this->url->link(t('cancel'), 'board', 'show', array('project_id' => $task['project_id']), false, 'close-popover') ?>
                <?php endif ?>
            </div>
        </div>
    </form>
</section>