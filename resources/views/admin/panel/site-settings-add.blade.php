@extends('admin.panel.inc.master')
@section('content')
    <!---Content-->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Site Ayarlar Ekle</h4>
                <div class="float-right">
                    <a href="{{ route('admin.SiteSettingsForm') }}" class="btn btn-primary"><i class="fa fa-list"></i> Ayarlar
                        Listesi</a>
                </div>
                <div class="basic-form">
                    <form action="{{ route('admin.siteSettingsAdd') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-cog"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Ayar Adı (site_phone)"
                                name="settings_name">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-cog"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Ayar Değeri (507 892 84 90)"
                                name="settings_value">
                        </div>
                        <button type="submit" class="btn btn-warning"><i class="fa fa-lock"></i> Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
