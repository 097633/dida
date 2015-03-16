<?php
// $Id: user.tpl.php 5 2011-12-02 15:11:22Z east $
// print_r($account);
?>

<h2><?php echo $account->name; ?></h2>

<?php if ($account->content) : ?>
  <?php echo $account->content; ?>
<?php endif;?>