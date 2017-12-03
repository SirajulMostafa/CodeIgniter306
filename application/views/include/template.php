<?php $top= isset($top) ? $top:'default'; ?>
<?php $bottom=isset($bottom) ? $bottom:'default'; ?>

<?php include('header.php'); ?>
<?php $this->load->view($top); ?>
<?php include('sidebar.php'); ?>
<?php $this->load->view($main); ?>

<?php include('footer.php'); ?>
<?php $this->load->view($bottom); ?>
<?php $this->load->view('modal/compose'); ?>

