<div id="description" class="task-show-section">
    <div class="page-header">
        <h2><?= t('Time') ?></h2>
    </div>

    <?php if (empty($values['date_started'])): ?>
        <?= $this->url->link('<i class="fa fa-play"></i>', 'taskmodification', 'start', array('task_id' => $task['id'], 'project_id' => $task['project_id']), false, 'task-show-start-link', t('Set automatically the start date')) ?>
    <?php endif ?>

    <?= $this->form->csrf() ?>
    <?= $this->form->hidden('id', $values) ?>

    <?= $this->form->label(t('Start date'), 'date_started') ?>
    <?= $this->form->text('date_started', $values, array(), array('placeholder="'.$this->text->in($date_format, $date_formats).'"'), 'form-datetime') ?>

    <?= $this->form->label(t('Time estimated'), 'time_estimated') ?>
    <?= $this->form->numeric('time_estimated', $values, array(), array('placeholder="'.t('hours').'"')) ?>

    <?= $this->form->label(t('Time spent'), 'time_spent') ?>
    <?= $this->form->numeric('time_spent', $values, array(), array('placeholder="'.t('hours').'"')) ?>

</div>