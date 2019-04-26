<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $company->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $company->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Company Users'), ['controller' => 'CompanyUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company User'), ['controller' => 'CompanyUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="companies form large-9 medium-8 columns content">
    <?= $this->Form->create($company) ?>
    <fieldset>
        <legend><?= __('Edit Company') ?></legend>
        <?php
            echo $this->Form->control('cid');
            echo $this->Form->control('name');
            echo $this->Form->control('address');
            echo $this->Form->control('website_url');
            echo $this->Form->control('image_name');
            echo $this->Form->control('image_path');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
