<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pena Muda | {{ $tittle }}</title>

    {{-- Boostrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Icon Boostrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    
    {{-- Style CSS --}}
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    {{-- Navigasi --}}

    @include('partials.navbar')

    {{-- End Navigasi --}}

    {{-- Content --}}
    <div class="container mt-3">
        @yield('container')
    </div>

    {{-- End Content --}}

    {{-- Footer --}}

    @include('partials.footer')

    {{-- End Footer --}}

    {{-- Jquery --}}
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>

    {{-- JavaScript --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    {{-- <script>
        let form = document.getElementById('search');

        if(form) {
            form.addEventListener('beforeinput', e => {
            const formdata = new FormData(form);
            let search = formdata.get('search');
            let url = "{{ route('search', "search=") }}"+search
       
            fetch(url)
            .then(response => response.json())
            .then(data => {
            let i;
            let result = "";
            if(data.length === 0){
                result += '<div class="mb-3">Data tidak ditemukan</div>'  
            }
            for (i=0; i < data.length; i++) {
                let jurnalistik = data[i];
                result += `<div class="col">
                            <div class="card h-100 shadow-sm">

                            ${data[i].image}
                            <div class="card-body">
                                <h5 class="card-title">
                                <a href="/jurnalistik/{{ $jurnal->slug }}" class="text-decoration-none">${data[i].judul}</a>
                                </h5>
                                <p>Penulis: ${data[i].penulis}</p>
                                <p>Editor: ${data[i].editor}</p>
                                <p>Category <a href="/jurnalistik?categoryJurnalistik={{ $jurnal->categoryJurnalistik->slug }}" class="text-decoration-none">{{ $jurnal->categoryJurnalistik->name }}</a></p>
                                <hr>
                                <p class="card-text">{{ $jurnal->headline }}</p>
                            </div>
                            <div class="card-footer">
                            <small class="text-muted">{{ $jurnal->created_at->diffForHumans() }}</small>
                            </div>
                            </div>
                        </div>`;
                // console.log(data[i]);
               
            }
            document.getElementById('result').innerHTML = result;
            })
            .catch((err) => console.log(err))
            })
        console.log(form)
        }
    </script> --}}
    
</body>
</html>
