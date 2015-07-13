<section id="main">
    <div class="page-header">
        <h2><?= $this->e('#'.$task['id'].' '.$task['title']) ?></h2>
    </div>
    <section class="sidebar-container" id="task-section">
        <div class="task-details" style="float:left; width: 50%">
            <?= $this->render('task/show_description', array('task' => $task)) ?>
            <?= $this->render('tasklink/show', array('task' => $task, 'links' => $links, 'link_label_list' => $link_label_list)) ?>
            <?= $this->render('subtask/show', array('task' => $task, 'subtasks' => $subtasks, 'project' => $project)) ?>
            <?= $this->render('task/timesheet', array('task' => $task)) ?>
            <?= $this->render('file/show', array('task' => $task, 'files' => $files, 'images' => $images)) ?>
            <?= $this->render('task/comments', array('task' => $task, 'comments' => $comments, 'project' => $project)) ?>
        </div>
        <div class="task-basic-details" style="float:right; width: 45%">
            <?= $this->render('task/show_basic_details', array('task' => $task, 'project' => $project)) ?>
        </div>
    </section>
</section>