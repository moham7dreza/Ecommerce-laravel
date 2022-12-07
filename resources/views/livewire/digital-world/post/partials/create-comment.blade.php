@if (auth()->check())
    <div class="comment-form" id="comment-form">
        <h3 class="mb-30">
            {{ $isAnswer == 1 ? 'ارسال پاسخ' : 'ارسال نظر' }}
        </h3>
        <form class="form-contact comment_form" wire:submit.prevent="{{ $isAnswer == 1 ? 'addAnswer' : 'addComment' }}"
              id="commentForm" method="POST">
            @csrf
            {{--        <input type="hidden" name="commentable_id" value="{{ $post->id }}">--}}
            {{--        <input type="hidden" name="commentable_type" value="{{ get_class($post) }}">--}}
            <div class="row">
                <div class="col-12">
                    <div class="form-group">

                        <span wire:dirty wire:target="body" class="mb-3">شما در حال نوشتن نظر برای پست {{ $post->title }} هستین</span>
                        <textarea
                            class="form-control w-100 @error('body') is-invalid @enderror {{$isAnswer == 1 ? 'alert-warning' :''}}"
                            name="body"
                            id="body" cols="30" rows="9" placeholder="متن نظر و تایپ کن ..." wire:model.lazy="body"
                            wire:dirty.class="border-danger">
                        {{ old('body') }}
                    </textarea>
                        @error('body')
                        <br>
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="button button-contactForm" wire:dirty.class="d-none" wire:target="body">
                    {{ $isAnswer == 1 ? 'ارسال پاسخ' : 'ارسال نظر' }}</button>
                @if ($isAnswer == 1 )
                    <button type="submit" class="button button-contactForm" wire:dirty.class="d-none"
                            wire:target="body" wire:click="canselAnswer">انصراف
                    </button>
                @endif
                <div wire:loading wire:target="{{ $isAnswer == 1 ? 'addAnswer' : 'addComment' }}">
                    در حال ارسال نظر
                </div>
            </div>
        </form>
    </div>
@else
    <p class="text-primary text-right">
        <a href="">لطفا جهت ثبت نظر وارد شوید</a>
    </p>
@endif
