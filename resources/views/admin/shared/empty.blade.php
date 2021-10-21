@if($lists->isEmpty())
<section class="content">
    <div class="empty-state-container">
        <img class="empty-state-img" src="{{ asset('backend/images/empty.svg') }}">
        <h3>{{ __('No Records Found') }}</h3>
    </div>
</section>
@endif