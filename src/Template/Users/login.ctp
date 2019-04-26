<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('uid', ['label' => 'User ID']) ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>