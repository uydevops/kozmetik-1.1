@extends('admin.panel.inc.master')
@section('content')


<div class="container mt-5">
    <h2>Haber Ekleme Formu</h2>
    <form action="{{ route('admin.newsAdd') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Haber Başlığı</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Haber Açıklaması</label>
            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
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

<!-- CKEditor Script -->
<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#content'))
        .then(editor => {
            // CKEditor başarıyla oluşturuldu.
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
