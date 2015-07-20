<div class="page-header">
    <h2><?= t($this->e('Task #'.$task['id'])) ?><br />
    <?= t($this->e('Title: ')) ?><?= $this->form->text('title', $values, $errors, array('autofocus', 'required', 'maxlength="200"', 'tabindex="1"')) ?></h2><br/>
</div>

<section id="task-section">
<form method="post" action="<?= $this->url->href('task', 'update', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>" autocomplete="off">

    <?= $this->form->csrf() ?>

    <div class="edit-task-details" style="float:left; width: 50%">
        <?= $this->render('task/edit_description', array('task' => $task, 'values' => $values, 'errors' => $errors)) ?>
        <?= $this->render('tasklink/show', array('task' => $task, 'links' => $links, 'link_label_list' => $link_label_list)) ?>
        <?= $this->render('subtask/show', array('task' => $task, 'subtasks' => $subtasks, 'project' => $project)) ?>
        <?= $this->render('task/edit_time', array('task' => $task)) ?>
        <?= $this->render('file/show', array('task' => $task, 'files' => $files, 'images' => $images)) ?>
        <?= $this->render('task/comments', array('task' => $task, 'comments' => $comments, 'project' => $project, 'values' => $values, 'errors' => $errors)) ?>

    </div>
    <div class="edit-task-basic-details" style="float:right; width: 45%">
        <?= $this->render('task/edit_basic_details', array('task' => $task, 'project' => $project, 'values' => $values, 'errors' => $errors)) ?>
    </div>

    <div class="form-actions" style="float: right">
        <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue" tabindex="10">
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'board', 'show', array('project_id' => $task['project_id']), false, 'close-popover') ?>
    </div>
</form>
</section>
