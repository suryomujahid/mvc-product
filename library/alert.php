<!-- Alert -->
<?php
if (@$_SESSION['is_success'] == '1') {
?>
    <script>
        $("#alert-create").removeClass('d-none');
    </script>
<?php
}

if (@$_SESSION['is_success'] == '2') {
?>
    <script>
        $("#alert-update").removeClass('d-none');
    </script>
<?php
}

if (@$_SESSION['is_success'] == '3') {
?>
    <script>
        $("#alert-delete").removeClass('d-none');
    </script>
<?php
}

if (@$_SESSION['is_success'] == 'false') {
?>
    <script>
        $("#alert-error").removeClass('d-none');
    </script>
<?php
}
?>