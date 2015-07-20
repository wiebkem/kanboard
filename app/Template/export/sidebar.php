<div class="sidebar">
    <h2><?= t('Exports') ?></h2>
    <ul>
        <li>
            <?= $this->url->link(t('Tasks'), 'export', 'tasks', array('project_id' => $project['id'])) ?>
        </li>
        <li>
            <?= $this->url->link(t('Subtasks'), 'export', 'subtasks', array('project_id' => $project['id'])) ?>
        </li>
        <li>
            <?= $this->url->link(t('Task transitions'), 'export', 'transitions', array('project_id' => $project['id'])) ?>
        </li>
        <li>
            <?= $this->url->link(t('Daily project summary'), 'export', 'summary', array('project_id' => $project['id'])) ?>
        </li>
    </ul>
    <div class="sidebar-collapse"><a href="#" title="<?= t('Hide sidebar') ?>"><i class="fa fa-chevron-left"></i></a></div>
    <div class="sidebar-expand" style="display: none"><a href="#" title="<?= t('Expand sidebar') ?>"><i class="fa fa-chevron-right"></i></a></div>
</div>