<div class="page-header">
    <h2><?= t('Remove a comment') ?></h2>
</div>

<div class="confirm">
    <p class="alert alert-info">
        <?= t('Do you really want to remove this comment?') ?>
    </p>

    <?= $this->render('comment/show', array('comment' => $comment, 'task' => $task, 'preview' => true)) ?>

    <div class="form-actions">
        <?= $this->url->link(t('Yes'), 'comment', 'remove', array('task_id' => $task['id'], 'project_id' => $task['project_id'], 'comment_id' => $comment['id']), true, 'btn btn-red') ?>
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'board', 'show', array('popup' => 'true', 'task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
    </div>
</div>