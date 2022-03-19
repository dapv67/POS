@extends('layouts.app')

@section('title', 'Prestamos')

@section('content')
    <div class="container">
        <div class="header mb-2">
            <h1 class="title-modul">PRÉSTAMOS</h1>
            <div class="data-shop">
                <p class="cajero me-4">{{ Auth::user()->name }}</p>
                <p id="fechaHora" class="hora"></p>
            </div>
        </div>

        <div class="tools mb-2">
            <button type="button" class="btn btn-secondary me-2" id="btnEstadoCuenta">
                Estado de cuenta
            </button>
        </div>
        <div class="contenido-interno">
            @include('prestamos.estado-cuenta')
            @include('prestamos.estado-cliente')
        </div>
        
    </div>

    <script>
        $("#estado-cliente").hide();
        $("#estado-cuenta").show();
        
        $("#btnEstadoCliente").click(function(event) {
            $("#estado-cuenta").hide();
            $("#estado-cliente").show();
        });
        $("#btnEstadoCuenta").click(function(event) {
            $("#estado-cliente").hide();
            $("#estado-cuenta").show();
        });

        setInterval(showTime, 1000);

            function showTime() {

                let time = new Date();

                let date = time.getDate();
                let month = time.getMonth() + 1;;
                let year = time.getFullYear();

                let hour = time.getHours();
                let min = time.getMinutes();
                let sec = time.getSeconds();
                am_pm = "AM";

                if (hour > 12) {
                    hour -= 12;
                    am_pm = "PM";
                }
                if (hour == 0) {
                    hr = 12;
                    am_pm = "AM";
                }

                hour = hour < 10 ? "0" + hour : hour;
                min = min < 10 ? "0" + min : min;
                sec = sec < 10 ? "0" + sec : sec;

                let currentTime = `${date}/${month}/${year} ${hour}:${min}:${sec} ${am_pm}`;

                document.getElementById("fechaHora")
                    .innerHTML = currentTime;
            }
            showTime();
    </script>
@endsection
