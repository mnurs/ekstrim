@forelse($todayrequest as $apps)
<tr>
    <td>
        <div class="user-info">
            <img class="user-image" src="{{ isset($apps->patient->image) ? asset(path_user_image().$apps->patient->image) : Avatar::create($apps->patient->name)->toBase64()}}" alt="{{ __('doctor-image') }}" />
            <h3 class="user-name">{{$apps->patient->name}}</h3>
        </div>
    </td>
    <td>{{$apps->appdate}}</td>
    <td>{{Carbon\Carbon::parse($apps->slot->start_time)->format('H:i A')}}-{{Carbon\Carbon::parse($apps->slot->end_time)->format('H:i A')}}</td>
    <td><span class="completed">
            @if ($apps->status == 0)
            {{ __('No action taken by counselor') }}
            @endif
            @if ($apps->status == 1)
            {{ __('On going') }}
            @endif

            @if ($apps->status == 2)
            {{ __('Completed') }}
            @endif
        </span></td>
    <td>
        <ul class="action-area">
            @if ($apps->status == 0)
                <li><a class="view-btn action-btn cus-w100" href="{{route('approve', $apps->id)}}">{{ __('Approve') }}</a></li>
            @endif
            <li><a class="delet-btn action-btn" href="{{route('cancel.appointment', $apps->id)}}"><i class="fas fa-trash-alt"></i></a></li>
        </ul>
    </td>
</tr>
@empty
<tr>
    <td colspan="6">
        <div>
            <img class="img-fluid w-100" src="{{ asset('uploaded_file/no-data.png') }}" alt="{{ __('image') }}">
        </div>
    </td>
</tr>
@endforelse

