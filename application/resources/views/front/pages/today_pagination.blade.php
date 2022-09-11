<div class="primary-table">
    <div class="table-responsive">
        <table class="table" id="todaypagination">
            <thead>
                <tr>
                    <th scope="col">{{ __('Nama Konselor') }}</th>
                    <th scope="col">{{ __('Kategori') }}</th>
                    <th scope="col">{{ __('Tanggal') }}</th>
                    <th scope="col">{{ __('Waktu') }}</th>
                    <th scope="col">{{ __('Aksi') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($todaysapp as $app)
                <tr>
                    <td>
                        <div class="user-info">
                            <img class="user-image" src="{{ isset($app->doctor->user->image) ? asset(path_user_image().$app->doctor->user->image) : Avatar::create($app->doctor->user->name)->toBase64()}}" alt="{{ __('doctor-image') }}" />
                            <h3 class="user-name">{{$app->doctor->user->name}}</h3>
                        </div>
                    </td>
                    <td>
                        {{$app->doctor->category->name}}
                    </td>
                    <td>{{$app->appdate}}</td>
                    <td>{{Carbon\Carbon::parse($app->slot->start_time)->format('H:i A')}}-{{Carbon\Carbon::parse($app->slot->end_time)->format('H:i A')}}</td>

                    <td>
                        <ul class="action-area">
                            @if ($app->status == 2)
                                <li><a class="prescription-btn " href="#" role="button" data-toggle="modal" data-target="#ViewPrescription{{$app->id}}">{{ __   ('Lihat Saran') }}</a></li>
                            @else
                                <li><a class="delet-btn action-btn" href="{{route('delete.appointment', $app->id)}}"><i class="fas fa-trash-alt"></i></a></li>
                            @endif
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
            </tbody>
        </table>
    </div>
    <div class="pagination-today mt-30">
        {{ view_html($todaysapp->links('vendor.pagination.todaypagi')) }}
    </div>
</div>
