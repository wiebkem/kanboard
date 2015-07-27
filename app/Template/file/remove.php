<div class="page-header">
    <h2><?= t('Remove a file') ?></h2>
</div>

<div class="confirm">
    <p class="alert alert-info">
        <?= t('Do you really want to remove this file: "%s"?', $this->e($file['name'])) ?>
    </p>

    <div class="form-actions">
        <?= $this->url->link(t('Yes'), 'file', 'remove', array('task_id' => $task['id'], 'project_id' => $task['project_id'], 'file_id' => $file['id']), true, 'btn btn-red') ?>
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'board', 'show', array('popup' => 'true', 'task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
    </div>
</div>