@extends('admin.panel.inc.master')
@section('content')
    <!---Content-->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Site Ayarları</h4>
                <div class="float-right">
                    <a href="{{ route('admin.SiteSettingsAddForm') }}" class="btn btn-success"><i class="fa fa-plus"></i> Yeni
                        Ayar Ekle</a>
                </div>
                <div class="basic-form">
                    <form action="{{ route('admin.SiteSettingsPost') }}" method="post">
                        @csrf
                        @foreach ($siteSettings as $settingName => $settingValue)
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">{{ $settingName }}</span>
                                </div>
                                <input type="text" class="form-control" value="{{ $settingValue }}"
                                    name="{{ $settingName }}">
                                <div class="input-group-append">
                                    <a href="{{ route('admin.siteSettingsDelete', $settingName) }}" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                </div>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-warning">
                            <i class="fa fa-lock"></i> Kaydet
                        </button>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
