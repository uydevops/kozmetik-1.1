@extends('admin.panel.inc.master')
@section('content')
    </head>

    <body>
        <div class="container mt-4">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Resim</th>
                            <th scope="col">Haber Başlığı</th>
                            <th scope="col">Haber Açıklaması</th>
                            <th scope="col">Durumu</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($newsList as $news)
                            <tr>
                                <td><img src="{{ asset($news->image) }}" alt="" width="100">
                                </td>
                                <td>{{ $news->title }}</td>
                                <td>{{ $news->description }}</td>
                                <td>
                                    @if ($news->status == 'active')
                                        <div class="btn btn-success btn-spin"><i class="fa fa-cog fa-spin"></i></div>
                                    @else
                                        <div class="btn btn-danger btn-spin"><i class="fa fa-stop"></i></div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.newsEditForm', $news->id) }}"
                                        class="btn btn-warning btn-action"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.newsDelete', $news->id) }}"
                                        class="btn btn-danger btn-action"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        <!-- Diğer haberler burada eklenebilir -->
                    </tbody>
                </table>
            </div>
        </div>

        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f7f7f7;
            }

            .container {
                margin-top: 40px;
            }

            .table {
                width: 100%;
                border-collapse: collapse;
            }

            thead {
                background-color: #f2f2f2;
            }

            th {
                color: #333;
                padding: 12px;
                text-align: left;
            }

            tbody tr:nth-child(odd) {
                background-color: #f9f9f9;
            }

            tbody tr:nth-child(even) {
                background-color: #ffffff;
            }

            .btn-spin {
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .btn-spin .fa-spin {
                color: #ffffff;
            }

            .btn-action {
                margin-right: 5px;
            }
        </style>
    @endsection
