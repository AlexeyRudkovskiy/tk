<div class="employer">
    <div class="employer-photo">
        <img src="{{ $employer->photo->getThumbnailPath('employer-photo') }}" />
    </div>
    <div class="employer-description">
        @if(isset($detailed) && $detailed)
            <h1 class="employer-full-name">{{ $employer->full_name }}</h1>
        @else
            <a href="{{ route('employees.show', $employer )}}"><h1 class="employer-full-name">{{ $employer->full_name }}</h1></a>
        @endif
        <p>@lang('app.employees.work_from', [ 'date' => $employer->work_from ])</p>
        {!! $employer->getSmallDescriptionFormatted() !!}
    </div>
</div>