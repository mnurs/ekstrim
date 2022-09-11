@forelse($pastapp as $apps)
<tr>
    <td>
        <div class="user-info">
            <img class="user-image" src="{{ isset($apps->doctor->user->image) ? asset(path_user_image().$apps->doctor->user->image) : Avatar::create($apps->doctor->user->name)->toBase64()}}" alt="{{ __('doctor-image') }}" />
            <h3 class="user-name">{{$apps->doctor->user->name}}</h3>
        </div>
    </td>
    <td>{{$apps->appdate}}</td>
    <td>{{Carbon\Carbon::parse($apps->slot->start_time)->format('H:i A')}}-{{Carbon\Carbon::parse($apps->slot->end_time)->format('H:i A')}}</td>
    <td>
        @if (Carbon\Carbon::parse($apps->appdate) < Carbon\Carbon::today() && $apps->status == 0)
        <span class="text-warning">
            {{ __('No action taken by counselor') }}
        </span>
        @endif
        @if (Carbon\Carbon::parse($apps->appdate) < Carbon\Carbon::today() && $apps->status == 1)
            <span class="text-danger">
                {{ __('Cancelled') }}
            </span>
            @endif
            @if ($apps->status == 2)
            <span class="completed">
                {{ __('Completed') }}
            </span>
            @endif
        @if ($apps->status == 3)
        <span class="text-danger">
            {{ __('Cancelled by Conselor') }}
        </span>
        @endif
    </td>
    <td>
        @if (Carbon\Carbon::parse($apps->appdate) < Carbon\Carbon::today() && $apps->status == 0)
        <a class="prescription-btn btndisable" href="javascript:void(0)" data-toggle="popover" title="{{ __('No Prescription') }}" data-content="{{ __('Prescription Not Available!') }}" role="button">{{ __('View Prescription') }}</a>
        @endif
        @if (Carbon\Carbon::parse($apps->appdate) < Carbon\Carbon::today() && $apps->status == 1)
        <a class="prescription-btn btndisable" href="javascript:void(0)" data-toggle="popover" title="{{ __('No Prescription') }}" data-content="{{ __('Prescription Not Available!') }}" role="button">{{ __('View Prescription') }}</a>
        @endif
        @if ($apps->status == 3)
        <a class="prescription-btn btndisable" href="javascript:void(0)" data-toggle="popover" title="{{ __('No Prescription') }}" data-content="{{ __('Prescription Not Available!') }}" role="button">{{ __('View Prescription') }}</a>
        @endif
        @if ($apps->status == 2)
        <a class="prescription-btn " href="#" role="button" data-toggle="modal" data-target="#ViewPrescription{{$apps->id}}">{{ __('Lihat Saran') }}</a>
        @endif
    </td>
    <td>
        <ul class="action-area">
            <li><a class="delet-btn action-btn" href="{{route('delete.appointment', $apps->id)}}"><i class="fas fa-trash-alt"></i></a></li>
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
<tr>
    <td colspan='6'>
       {{ view_html($pastapp->links('vendor.pagination.dashboardpatient')) }}
    </td>
</tr>
