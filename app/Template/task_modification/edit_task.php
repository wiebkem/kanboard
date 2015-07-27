<div class="page-header">
    <h2><?= t($this->e('Task #'.$task['id'])) ?><br />
    <?= t($this->e('Title: ')) ?><?= $this->form->text('title', $values, $errors, array('autofocus', 'required', 'maxlength="200"', 'tabindex="1"')) ?></h2><br/>
</div>

<section id="task-section">
<form method="post" action="<?= $this->url->href('taskmodification', 'update', array('task_id' => $task['id'], 'project_id' => $task['project_id'], 'ajax' => $ajax)) ?>" autocomplete="off">

    <?= $this->form->csrf() ?>

    <div class="edit-task-details" style="float:left; width: 50%">
        <?= $this->render('task_modification/edit_description', array('task' => $task, 'values' => $values, 'errors' => $errors)) ?>
        <?= $this->render('task_modification/edit_time', array(
            'task' => $task,
            'values' => $values,
            'date_format' => $date_format,
            'date_formats' => $date_formats
        )) ?>


    </div>
    <div class="edit-task-basic-details" style="float:right; width: 45%">
        <?= $this->render('task_modification/edit_basic_details', array(
            'task' => $task,
            'values' => $values,
            'errors' => $errors,
            'date_format' => $date_format,
            'date_formats' => $date_formats,
            'colors_list' => $colors_list,
            'users_list' => $users_list,
            'categories_list' => $categories_list
        )) ?>
    </div>

    <div class="form-actions" style="float: right">
        <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue" tabindex="10">
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'board', 'show', array('popup' => 'true', 'task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
    </div>
</form>
</section>