@switch(Route::currentRouteName())
    @case('footer_dark')
        <footer class="footer footer-dark">
        @break

        @case('footer_fixed')
            <footer class="footer footer-fixed">
            @break

            @default
                <footer class="footer">
            @endswitch
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 p-0 footer-left">
                        <p class="mb-0">Copyright © {{ date('Y') }} <?php echo  $general_setting['app_copyright'] ?? ''; ?>. All rights reserved.</p>

                    </div>
                    <div class="col-md-6 p-0 footer-right">
                        <p class="mb-0"></p>
                    </div>
                </div>
            </div>
        </footer>
