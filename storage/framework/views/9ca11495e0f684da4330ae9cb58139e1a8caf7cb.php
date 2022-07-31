<?php if(session('swal-error')): ?>

    <script>
        $(document).ready(function (){
            Swal.fire({
                title: 'خطا!',
                 text: '<?php echo e(session('swal-error')); ?>',
                 icon: 'error',
                 confirmButtonText: 'باشه',
      });
        });
    </script>

<?php endif; ?>
<?php /**PATH C:\CODEX\project-toplearn\resources\views/admin/alerts/sweetalert/error.blade.php ENDPATH**/ ?>