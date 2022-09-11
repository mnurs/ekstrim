<div class="primary-table">
    <div class="table-responsive">
        <table class="table" id="pastsearch">
            <thead>
                <tr>
                    <th scope="col">{{ __('Nama Pasien') }}</th>
                    <th scope="col">{{ __('Tanggal') }}</th>
                    <th scope="col">{{ __('Waktu') }}</th>
                    <th scope="col">{{ __('Status') }}</th>
                    <th scope="col">{{ __('Saran') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pastapp as $papp)
                <tr>
                    <td>
                        <div class="user-info">
                            <img class="user-image" src="{{ isset($papp->patient->image) ? asset(path_user_image().$papp->patient->image) : Avatar::create($papp->patient->name)->toBase64()}}" alt="{{ __('doctor-image') }}" />
                            <h3 class="user-name">{{$papp->patient->name}}</h3>
                        </div>
                    </td>
                    <td>{{$papp->appdate}}</td>
                    <td>{{Carbon\Carbon::parse($papp->slot->start_time)->format('H:i A')}}-{{Carbon\Carbon::parse($papp->slot->end_time)->format('H:i A')}}</td>
                    <td>
                        @if (Carbon\Carbon::parse($papp->appdate) < Carbon\Carbon::today() && $papp->status == 0)
                        <span class="text-warning">
                            {{ __('No action taken by doctor') }}
                        </span>
                        @endif
                        @if (Carbon\Carbon::parse($papp->appdate) > Carbon\Carbon::today() && $papp->status == 0)
                        <span class="text-warning">
                            {{ __('No action taken by doctor') }}
                        </span>
                        @endif
                        @if (Carbon\Carbon::parse($papp->appdate) == Carbon\Carbon::today() && $papp->status == 0)
                        <span class="text-warning">
                            {{ __('Approval required') }}
                        </span>
                        @endif
                        @if (Carbon\Carbon::parse($papp->appdate) < Carbon\Carbon::today() && $papp->status == 1)
                            <span class="text-danger">
                                {{ __('Cancelled') }}
                            </span>
                        @endif
                        @if (Carbon\Carbon::parse($papp->appdate) > Carbon\Carbon::today() && $papp->status == 1)
                        <span class="text-warning">
                            {{ __('Upcoming') }}
                        </span>
                        @endif
                        @if (Carbon\Carbon::parse($papp->appdate) == Carbon\Carbon::today() && $papp->status == 1)
                        <span class="text-warning">
                            {{ __('Ongoing') }}
                        </span>
                        @endif
                        @if ($papp->status == 2)
                        <span class="completed">
                            {{ __('Completed') }}
                        </span>
                        @endif
                        @if ($papp->status == 3)
                        <span class="text-danger">
                            {{ __('Cancelled by Doctor') }}
                        </span>
                        @endif
                    </td>
                    <td>
                        @if (Carbon\Carbon::parse($papp->appdate) < Carbon\Carbon::today() && $papp->status == 0)
                        <a class="prescription-btn btndisable" href="javascript:void(0)" role="button">{{ __('Lihat Saran') }}</a>
                        @endif
                        @if (Carbon\Carbon::parse($papp->appdate) > Carbon\Carbon::today() && $papp->status == 0)
                        <a class="prescription-btn btndisable" href="javascript:void(0)" role="button">{{ __('Lihat Saran') }}</a>
                        @endif
                        @if (Carbon\Carbon::parse($papp->appdate) == Carbon\Carbon::today() && $papp->status == 0)
                        <a class="prescription-btn btndisable" href="javascript:void(0)" role="button">{{ __('Lihat Saran') }}</a>
                        @endif
                        @if (Carbon\Carbon::parse($papp->appdate) < Carbon\Carbon::today() && $papp->status == 1)
                        <a class="prescription-btn btndisable" href="javascript:void(0)" role="button">{{ __('Lihat Saran') }}</a>
                        @endif
                        @if (Carbon\Carbon::parse($papp->appdate) > Carbon\Carbon::today() && $papp->status == 1)
                        <a class="prescription-btn btndisable" href="javascript:void(0)" role="button">{{ __('Lihat Saran') }}</a>
                        @endif
                        @if (Carbon\Carbon::parse($papp->appdate) == Carbon\Carbon::today() && $papp->status == 1)
                        <a class="prescription-btn" role="button" data-toggle="modal" data-target="#MakePrescription{{$papp->id}}">{{ __('Buat Saran') }}</a>
                        @endif
                        @if ($papp->status == 2)
                        <a class="prescription-btn " href="javascript:void(0)" role="button" data-toggle="modal" data-target="#ViewPrescription{{$papp->id}}">{{ __('Lihat Saran') }}</a>
                        @endif
                        @if ($papp->status == 3)
                        <a class="prescription-btn btndisable" href="javascript:void(0)" role="button">{{ __('Lihat Saran') }}</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination-past mt-30">
        {{ view_html($pastapp->links('vendor.pagination.doctorpast')) }}
    </div>
</div>
