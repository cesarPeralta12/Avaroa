<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    $('#select-all').click(function() {
        $('.record-checkbox').prop('checked', this.checked);
        $('#bulk-delete').prop('disabled', !this.checked);
    });

    $('.record-checkbox').change(function() {
        $('#bulk-delete').prop('disabled', $('.record-checkbox:checked').length === 0);
    });

    $('#bulk-delete').click(function() {
        let ids = $('.record-checkbox:checked').map(function() { return this.value; }).get();
        if (ids.length === 0) return;

        Swal.fire({
            title: 'Delete selected items?',
            text: "This cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Yes, delete'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post("{{ $bulkUrl }}", {
                    ids: ids,
                    _token: '{{ csrf_token() }}'
                }, () => location.reload());
            }
        });
    });

    $('.delete-record').click(function() {
        let url = $(this).data('url');
        Swal.fire({
            title: 'Delete this record?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Delete'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({ url: url, type: 'DELETE', data: { _token: '{{ csrf_token() }}' }, success: () => location.reload() });
            }
        });
    });
});
</script>
