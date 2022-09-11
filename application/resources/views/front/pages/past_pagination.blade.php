<div class="primary-table">
    <div class="table-responsive">
        <table class="table" id="pastsearch">
            <thead>
                <tr>
                    <th scope="col">{{ __('Nama Konselor') }}</th>
                    <th scope="col">{{ __('Tanggal') }}</th>
                    <th scope="col">{{ __('Waktu') }}</th>
                    <th scope="col">{{ __('Status') }}</th>
                    <th scope="col">{{ __('Saran') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pastappall as $papp)
                <tr>
                    <td>
                        <div class="user-info">
                            <img class="user-image" src="{{ isset($papp->doctor->user->image) ? asset(path_user_image().$papp->doctor->user->image) : ''}}" alt="{{ __('doctor-image') }}" />
                            <h3 class="user-name">{{isset($papp->doctor->user->name) ? $papp->doctor->user->name : ''}}</h3>
                        </div>
                    </td>
                    <td>{{$papp->appdate}}</td>
                    <td>{{Carbon\Carbon::parse($papp->slot->start_time)->format('H:i A')}}-{{Carbon\Carbon::parse($papp->slot->end_time)->format('H:i A')}}</td>
                    <td>
                        @if (Carbon\Carbon::parse($papp->appdate) < Carbon\Carbon::today() && $papp->status == 0)
                        <span class="text-warning">
                            {{ __('No action taken by doctor') }}
                        </span>
                        @elseif(Carbon\Carbon::parse($papp->appdate) < Carbon\Carbon::today() && $papp->status == 1)
                        <span class="text-danger">
                            {{ __('Cancelled') }}
                        </span>
                        @elseif($papp->status == 3)
                        <span class="text-danger">
                            {{ __('Cancelled by Doctor') }}
                        </span>
                        @elseif($papp->status == 1)
                        <span class="text-warning">
                            {{ __('Doctor Approved') }}
                        </span>
                        @elseif ($papp->status == 2)
                        <span class="completed">
                            {{ __('Completed') }}
                        </span>
                        @else
                        <span class="text-info">
                            {{ __('Pending for approval') }}
                        </span>
                        @endif
                    </td>
                    @if (Carbon\Carbon::parse($papp->appdate) < Carbon\Carbon::today() && $papp->status == 0)
                    <td><a class="prescription-btn btndisable" href="javascript:void(0)" data-toggle="popover" title="{{ __('No Prescription') }}" data-content="{{ __('Prescription Not Available!') }}" role="button">{{ __('Lihat Saran') }}</a></td>
                    @elseif (Carbon\Carbon::parse($papp->appdate) < Carbon\Carbon::today() && $papp->status == 1)
                    <td><a class="prescription-btn btndisable" href="javascript:void(0)" data-toggle="popover" title="{{ __('No Prescription') }}" data-content="{{ __('Prescription Not Available!') }}" role="button">{{ __('Lihat Saran') }}</a></td>
                    @elseif ($papp->status == 2)
                    <td><a class="prescription-btn " href="#" role="button" data-toggle="modal" data-target="#ViewPrescription{{$papp->id}}">{{ __('Lihat Saran') }}</a></td>
                    @else
                    <td><a class="prescription-btn btndisable" href="javascript:void(0)" data-toggle="popover" title="{{ __('Belum ada saran') }}" data-content="{{ __('Saran belum ada!') }}" role="button">{{ __('Lihat Saran') }}</a></td>
                    @endif
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
            </tbody>
        </table>
    </div>
    <div class="pagination-past mt-30">
        {{ view_html($pastappall->links('vendor.pagination.simple-bootstrap-4')) }}
    </div>
</div>
