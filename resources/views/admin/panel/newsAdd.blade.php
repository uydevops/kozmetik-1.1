@extends('admin.panel.inc.master')
@section('content')

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <div class="container mt-5">
        <h2>Haber Ekleme Formu</h2>
        <form action="{{route('admin.newsAdd')}}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Haber Başlığı</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Haber Açıklaması</label>
                <textarea class="ckeditor form-control" id="description" name="description" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="keywords">Anahtar Kelimeler</label>
                <input type="text" class="form-control" id="keywords" name="keywords" required>
            </div>
            <div class="form-group">
                <label for="content">Haber İçeriği</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Haber Resmi</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <div class="form-group">
                <label for="status">Haber Durumu</label>
                <select class="form-control" id="status" name="status">
                    <option value="passive">Pasif</option>
                    <option value="active">Active</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Haber Ekle</button>
        </form>
    </div>
@endsection
