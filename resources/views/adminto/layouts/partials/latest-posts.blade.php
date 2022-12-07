<div class="row">
    <div class="col-xl-12">
        <div class="card-box">
            <h4 class="header-title mt-0 mb-3">آخرین پست ها</h4>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>عکس پست ها</th>
                        <th>عنوان پست ها</th>
                        <th>وضعیت</th>

                        <th>زمان خوندن</th>
                        <th>امتیاز</th>
                        <th>دسته بندی</th>
                        <th>نویسنده</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dashboardRepo->getLatestPosts() as $post)
                        <tr class="text-center">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                <img src="{{ $post->imagePath() }}" width="80">
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>
                                    <span class="badge badge-{{ $post->cssStatus() }}">
                                        @lang($post->status)
                                    </span>
                            </td>

                            <td>{{ $post->time_to_read }} دقیقه</td>
                            <td>{{ $post->rating }} امتیاز</td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->author->fullName }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
