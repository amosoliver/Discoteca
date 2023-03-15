<head>
    <meta charset="UTF-8">
    <title>Título da página</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
</head>

<body>

<div class="gradient-custom">
    <div class="box">
        <div class="box-header">
            <div class="box-title">
                <h1>{{ $title }}</h1>
            </div>
            <br>
        </div>
    </div>
    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table class="datatable table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="10">
                            #
                        </th>
                        <th width="100">
                            Artista
                        </th>
                        <th width="300">
                            História
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($artista as $art)
                        <tr>
                            <td>
                                {{$art->id_artista}}
                            </td>
                            <td width="300">
                                <div class="botton">
                                    <a href="{{route('artista.show',['id_artista' => $art->id_artista])}}">
                                        {{$art->ds_artista}}
                                    </a>
                                </div>
                            </td>
                            <td width="1490">
                                {{$art->historia}}
                            </td>
                            <td>
                                <div class="box-tools">
                                    <a href="{{ route('artista.edit', $art->id_artista) }}"
                                       class="btn-box-tool">EDITAR</a>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
