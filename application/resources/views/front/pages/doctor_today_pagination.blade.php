<div class="primary-table">
    <div class="table-responsive">
        <table class="table" id="todaypagination">
            <thead>
                <tr>
                    <th scope="col">{{ __('Nama Pasien') }}</th>
                    <th scope="col">{{ __('Tanggal') }}</th>
                    <th scope="col">{{ __('Waktu') }}</th>
                    <th scope="col">{{ __('Pesan') }}</th>
                    <th scope="col">{{ __('Saran') }}</th>
                    <th scope="col">{{ __('Aksi') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($todaysapp as $app)
                <tr>
                    <td>
                        <div class="user-info">
                            <img class="user-image" src="{{ isset($app->patient->image) ? asset(path_user_image().$app->patient->image) : Avatar::create($app->patient->name)->toBase64()}}" alt="{{ __('doctor-image') }}" />
                            <h3 class="user-name">{{$app->patient->name}}</h3>
                        </div>
                    </td>
                    <td>{{$app->appdate}}</td>
                    <td>{{Carbon\Carbon::parse($app->slot->start_time)->format('H:i A')}}-{{Carbon\Carbon::parse($app->slot->end_time)->format('H:i A')}}</td>
                    <td>{{$app->comment}}</td>
                    <td>
                        @if ($app->status == 2)
                        <a class="prescription-btn" role="button" data-toggle="modal" data-target="#ViewPrescription{{$app->id}}">{{ __('Tampilkan Saran') }}</a>
                        @elseif ($app->status == 3)
                        <span></span>
                        @else
                        <a class="prescription-btn" role="button" data-toggle="modal" data-target="#MakePrescription{{$app->id}}">{{ __('Berikan Saran') }}</a>
                        @endif
                    </td>
                    <td>
                        <ul class="action-area">
                            @if ($app->status == 2)
                            <li><a class="view-btn action-btn cus-w100-pointer" id="{{$app->id}}" >{{ __('Complete') }}</a></li>
                            @else
                            <li><a class="delet-btn action-btn cus-w100-pointer" href="{{route('cancel.appointment', $app->id)}}" >{{ __('Canceled') }}</a></li>
                            @endif
                        </ul>
                    </td>
                </tr>
                @empty
                <tr rowspan="4">
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
    <div class="pagination-today mt-30">
        {{ view_html($todaysapp->links('vendor.pagination.todaypagi')) }}
    </div>
</div>
