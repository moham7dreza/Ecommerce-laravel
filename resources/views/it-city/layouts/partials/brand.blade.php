<!-- section brand -->
<div class="section padding_layout_1" style="padding: 50px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <ul class="brand_list">
                        @foreach($homeRepo->brands() as $brand)
                            <li><img src="{{ asset('it-next-assets/nvidia-white-logo.png') }}" alt="#"/></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->
