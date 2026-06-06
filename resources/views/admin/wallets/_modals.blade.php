{{-- Adjust Balance Modal --}}
<div class="modal fade" id="adjustBalanceModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="adjustBalanceForm">
                <div class="modal-header">
                    <h5 class="modal-title">Adjust Balance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="adjust_wallet_id" name="wallet_id">
                    <p>Driver: <strong id="adjust_driver_name"></strong></p>
                    <p>Current Balance: <strong id="adjust_current_balance"></strong> Bs</p>

                    <div class="mb-3">
                        <label class="form-label">Adjustment Type</label>
                        <select class="form-select" name="type" required>
                            <option value="credit">Credit (Add)</option>
                            <option value="debit">Debit (Subtract)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Amount (Bs)</label>
                        <input type="number" name="amount" class="form-control"
                               step="0.01" min="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Reason</label>
                        <textarea name="reason" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm Adjustment</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Block Reason Modal --}}
<div class="modal fade" id="blockReasonModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="blockReasonForm">
                <div class="modal-header">
                    <h5 class="modal-title">Block Wallet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="block_wallet_id" name="wallet_id">
                    <div class="mb-3">
                        <label class="form-label">Reason for Blocking</label>
                        <textarea name="reason" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Block Wallet</button>
                </div>
            </form>
        </div>
    </div>
</div>
