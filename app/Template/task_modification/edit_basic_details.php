<div id="description" class="task-show-section">

    <div class="page-header" id="base-details">
        <div class="page-header">
            <h2><?= t('Basic details') ?></h2>
        </div>
            <?= $this->form->label(t('Category'), 'category_id') ?>
            <?= $this->form->select('category_id', $categories_list, $values, $errors, array('tabindex="5"')) ?><br/>

            <?= $this->form->label(t('Color'), 'color_id') ?>
            <?= $this->form->select('color_id', $colors_list, $values, $errors, array('tabindex="5"')) ?><br/>

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
        <?= $this->form->label(t('Due Date'), 'date_due') ?>
        <?= $this->form->text('date_due', $values, $errors, array('placeholder="'.$this->text->in($date_format, $date_formats).'"', 'tabindex="7"'), 'form-date') ?><br/>
    </div>

    <div class="page-header" id="assignee">
        <div class="page-header">
            <h2><?= t('Assigned to') ?></h2>
        </div>
        <?= $this->form->select('owner_id', $users_list, $values, array(), array('autofocus')) ?>
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