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
            <div class="page-header" id="base-details">
                <h2><?= t('Base details') ?></h2>
                <?php if ($task['category_name']): ?>
                    <?= t('Category: ') ?>
                    <?= $this->e($task['category_name']) ?><br />
                <?php endif ?>
                <?php if ($task['color_id']): ?>
                    <?= t('Color: ') ?>
                    <?= $this->e($task['color_id']) ?><br />
                <?php endif ?>
                <?= t('Column: ') ?>
                <strong><?= $this->e($task['column_title']) ?></strong>
                (<?= $this->e($task['project_name']) ?>)
                <?= dt('since %B %e, %Y at %k:%M %p', $task['date_moved']) ?><br />
                <?php if ($task['creator_username']): ?>
                    <?= t('Created by %s', $task['creator_name'] ?: $task['creator_username']) ?><br />
                <?php endif ?>
                <?php if ($task['is_active'] == 1): ?>
                    <?= t('Status is open') ?><br />
                <?php else: ?>
                    <?= t('Status is closed') ?><br />
                <?php endif ?>
                <?php if ($project['is_public']): ?>
                    <?= $this->url->link(t('Public link'), 'task', 'readonly', array('task_id' => $task['id'], 'token' => $project['token']), false, '', '', true) ?><br />
                <?php endif ?>
                <?= t('Task position:').' '.$this->e($task['position']) ?><br />
                <?php if ($task['score']): ?>
                    <?= t('Score: ') ?>
                    <?= $this->e($task['score']) ?>
                <?php endif ?>
                <?php if (! empty($task['swimlane_name'])): ?>
                    <h2><?= t('Swimlane') ?></h2>
                    <?= t($task['swimlane_name']) ?>
                <?php endif ?>
            </div>

            <div class="page-header" id="time-details">
                <h2><?= t('Time details') ?></h2>
                <?= dt('Created on %B %e, %Y at %k:%M %p', $task['date_creation']) ?><br />
                <?php if ($task['date_modification']): ?>
                    <?= dt('Last modified on %B %e, %Y at %k:%M %p', $task['date_modification']) ?><br />
                <?php endif ?>
                <?php if ($task['date_started']): ?>
                    <?= dt('Started on %B %e, %Y', $task['date_started']) ?><br />
                <?php endif ?>
                <?php if ($task['date_completed']): ?>
                    <?= dt('Completed on %B %e, %Y at %k:%M %p', $task['date_completed']) ?><br />
                <?php endif ?>
                <?php if ($task['date_due']): ?>
                    <strong><?= dt('Must be done before %B %e, %Y', $task['date_due']) ?></strong><br />
                <?php endif ?>
            </div>

            <div class="page-header" id="assignee">
                <h2><?= t('Assigned to') ?></h2>
                <?php if ($task['assignee_username']): ?>
                    <?= t($task['assignee_name'] ?: $task['assignee_username']) ?>
                <?php else: ?>
                    <?= t('There is nobody assigned') ?>
                <?php endif ?>
            </div>

            <div class="page-header" id="reference">
                <?php if ($task['reference']): ?>
                    <h2><?= t('Reference') ?></h2>
                    <strong><?= t('Reference: %s', $task['reference']) ?></strong>
                <?php endif ?>
                <?php if (! isset($not_editable) && $task['recurrence_status'] != \Model\Task::RECURRING_STATUS_NONE): ?>
                    <strong><?= t('Recurring information') ?></strong>
                    <?= $this->render('task/recurring_info', array(
                        'task' => $task,
                        'recurrence_trigger_list' => $recurrence_trigger_list,
                        'recurrence_timeframe_list' => $recurrence_timeframe_list,
                        'recurrence_basedate_list' => $recurrence_basedate_list,
                    )) ?>
                <?php endif ?>
            </div>
        </div>
    </section>
</section>