<script>
$(document).ready(function() {
    // Adjust Balance
    $('.adjust-balance-btn').click(function() {
        const id = $(this).data('id');
        const driver = $(this).data('driver');
        const balance = $(this).data('balance');

        $('#adjust_wallet_id').val(id);
        $('#adjust_driver_name').text(driver);
        $('#adjust_current_balance').text(balance);
        $('#adjustBalanceModal').modal('show');
    });

    $('#adjustBalanceForm').submit(function(e) {
        e.preventDefault();
        const walletId = $('#adjust_wallet_id').val();

        Swal.fire({
            title: 'Processing...',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: `/admin/wallets/${walletId}/adjust-balance`,
            method: 'POST',
            data: $(this).serialize(),
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(response) {
                $('#adjustBalanceModal').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.message,
                    timer: 2000
                }).then(() => location.reload());
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: xhr.responseJSON?.message || 'Failed to adjust balance'
                });
            }
        });
    });

    // Toggle Block
    $('.toggle-block-btn').click(function() {
        const id = $(this).data('id');
        const isBlocked = $(this).data('status');

        if (isBlocked) {
            Swal.fire({
                title: 'Unblock Wallet?',
                text: 'This will allow the driver to use their wallet again.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, Unblock',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    toggleBlockStatus(id, '');
                }
            });
        } else {
            $('#block_wallet_id').val(id);
            $('#blockReasonModal').modal('show');
        }
    });

    $('#blockReasonForm').submit(function(e) {
        e.preventDefault();
        const walletId = $('#block_wallet_id').val();
        const reason = $(this).find('[name="reason"]').val();

        $('#blockReasonModal').modal('hide');
        toggleBlockStatus(walletId, reason);
    });

    function toggleBlockStatus(walletId, reason) {
        Swal.fire({
            title: 'Processing...',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        $.ajax({
            url: `/admin/wallets/${walletId}/toggle-block`,
            method: 'PUT',
            data: {reason: reason},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.message,
                    timer: 2000
                }).then(() => location.reload());
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: xhr.responseJSON?.message || 'Failed to update status'
                });
            }
        });
    }
});
</script>
