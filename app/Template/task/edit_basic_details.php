<div id="description" class="task-show-section">

    <div class="page-header" id="base-details">
        <div class="page-header">
            <h2><?= t('Base details') ?></h2>
        </div>
            <?= $this->form->label(t('Category'), 'category_id') ?>
            <?= $this->form->select('category_id', $categories_list, $values, $errors, array('tabindex="4"')) ?><br/>
            <?= $this->form->label(t('Color'), 'color_id') ?>
            <?= $this->form->select('color_id', $colors_list, $values, $errors, array('tabindex="5"')) ?><br/>

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
        <?= $this->form->label(t('Complexity'), 'score') ?>
        <?= $this->form->number('score', $values, $errors, array('tabindex="6"')) ?><br/>
        <?php if (! empty($task['swimlane_name'])): ?>
            <h2><?= t('Swimlane') ?></h2>
            <?= t($task['swimlane_name']) ?>
        <?php endif ?>
    </div>

    <div class="page-header" id="time-details">
        <div class="page-header">
            <h2><?= t('Time details') ?></h2>
        </div>
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
        <?= $this->form->label(t('Due Date'), 'date_due') ?>
        <?= $this->form->text('date_due', $values, $errors, array('placeholder="'.$this->text->in($date_format, $date_formats).'"', 'tabindex="7"'), 'form-date') ?><br/>
    </div>

    <div class="page-header" id="assignee">
        <div class="page-header">
            <h2><?= t('Assigned to') ?></h2>
        </div>
        <?php if ($task['assignee_username']): ?>
            <?= t($task['assignee_name'] ?: $task['assignee_username']) ?>
        <?php else: ?>
            <?= t('There is nobody assigned') ?>
        <?php endif ?>
    </div>

    <div class="page-header" id="reference">
        <?php if ($task['reference']): ?>
            <div class="page-header">
                <h2><?= t('Reference') ?></h2>
            </div>
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