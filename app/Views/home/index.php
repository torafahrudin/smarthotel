<?= $this->extend('templates/header'); ?>


<?php if (in_groups('admin')) : ?>
    <?= $this->section('content'); ?>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4>Under Development</h4>

        </div> <!-- container-fluid -->

    </div> <!-- content -->
<?php endif; ?>

<?php if (in_groups('housekeeping')) : ?>
    <?= $this->section('content'); ?>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4>Under Development</h4>

        </div> <!-- container-fluid -->

    </div> <!-- content -->
<?php endif; ?>

<?php if (in_groups('pemilik')) : ?>
    <?= $this->section('content'); ?>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4>Under Development</h4>

        </div> <!-- container-fluid -->

    </div> <!-- content -->
<?php endif; ?>


<?= $this->endSection('content'); ?>