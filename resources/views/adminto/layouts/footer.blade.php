<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <a href="mailto:{{ auth()->user()->email }}">{{ auth()->user()->fullName }}</a>
            </div>
            <div class="col-md-6">
                <div class="text-md-right footer-links d-none d-sm-block">
                    <a href="https://milwad.ir">درباره ما</a>
                    <a href="javascript:void(0);">راهنما</a>
                    <a href="javascript:void(0);">تماس با ما</a>
                </div>
            </div>
        </div>
    </div>
</footer>
