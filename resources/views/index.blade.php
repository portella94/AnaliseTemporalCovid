<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Covid Analysis</title>


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">



    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 0;
                opacity: 0;
            }
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"
        integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ=="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@banminkyoz/lightpick@1.2.12/lightpick.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@banminkyoz/lightpick@1.2.12/css/lightpick.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"
        integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <div class="jumbotron mt-3">
            <h1>Análise Temporal</h1>
            <p class="lead">Você deve selecionar o estado, cidade e período para vizualização gráfica.
                {{-- Populate the database <a href="#" onclick="populate();">here</a>. --}}
            </p>
            <div class="bd-example">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Estados
                    </button>
                    <div class="dropdown-menu">
                        @forelse ($states as $state)
                        <a class="dropdown-item" href="#">{{$state}}</a>
                        @empty
                        <a class="dropdown-item" href="#">Nada para listar</a>
                        @endforelse
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Cidades
                    </button>
                    <div class="dropdown-menu">
                        @forelse ($cities as $city)
                        <a class="dropdown-item" href="#">{{$city}}</a>
                        @empty
                        <a class="dropdown-item" href="#">Nada para listar</a>
                        @endforelse
                    </div>
                </div>
                <div class="btn-group">
                    <input type="text" id="datepick" class="form-control form-control-sm" size="50">
                </div>
                @include('graph')
            </div>
        </div>
    </div>
    <script>
        var picker = new Lightpick({
                field: document.getElementById('datepick'),
                singleDate: false,
                // minDate: moment().startOf('month').add(7, 'day'),
                // maxDate: moment().endOf('month').subtract(7, 'day'),
                onSelect: function(start, end){
                    var str = '';
                    str += start ? start.format('Do MMMM YYYY') + ' to ' : '';
                    str += end ? end.format('Do MMMM YYYY') : '...';
            }
        });
    </script>
    <script>
        function populate() {
            showToast("OK");
        }

        function updateGraph() {

        }

        function showToast(text) {
            let x = document.getElementById("snackbar");
            //if(text === undefined || text=== null)
            x.innerHTML=text;
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
    </script>
    <div id="snackbar"></div>
</body>

</html>
