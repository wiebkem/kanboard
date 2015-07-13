<section class="sidebar-container" id="task-section">

    <?= $this->render('task/sidebar', array('task' => $task)) ?>

    <div class="sidebar-content">
        <?= $this->render('task/details', array(
            'task' => $task,
            'project' => $project,
            'recurrence_trigger_list' => $this->task->recurrenceTriggers(),
            'recurrence_timeframe_list' => $this->task->recurrenceTimeframes(),
            'recurrence_basedate_list' => $this->task->recurrenceBasedates(),
        )) ?>

        <?= $this->render('task/time', array('task' => $task, 'values' => $values, 'date_format' => $date_format, 'date_formats' => $date_formats)) ?>
        <?= $this->render('task/show_description', array('task' => $task)) ?>
        <?= $this->render('tasklink/show', array('task' => $task, 'links' => $links, 'link_label_list' => $link_label_list)) ?>
        <?= $this->render('subtask/show', array('task' => $task, 'subtasks' => $subtasks, 'project' => $project)) ?>
        <?= $this->render('task/timesheet', array('task' => $task)) ?>
        <?= $this->render('file/show', array('task' => $task, 'files' => $files, 'images' => $images)) ?>
        <?= $this->render('task/comments', array('task' => $task, 'comments' => $comments, 'project' => $project)) ?>
    </div>
</section>