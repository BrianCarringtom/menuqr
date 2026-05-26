@extends('admin.layout', ['page' => 'dashboard'])

@section('content')
    <style>
        /* 🔥 CONTENEDOR */
        .dashboard-container {
            width: 100%;
            min-height: calc(100vh - 80px);

            display: flex;
            flex-direction: column;
            align-items: center;

            /* 🔥 BAJA TODO */
            justify-content: center;

            text-align: center;

            padding: 40px 20px;
        }

        /* 🔥 TITULO */
        .dashboard-title {
            font-size: clamp(2rem, 5vw, 3.5rem);
            margin-bottom: 28px;
            line-height: 1.2;
        }

        /* 🔥 IMAGEN */
        .dashboard-image {
            width: 100%;
            max-width: 700px;

            border-radius: 20px;

            object-fit: cover;

            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.35);
        }

        /* 🔥 TABLET */
        @media screen and (max-width: 768px) {

            .dashboard-container {

                /* 🔥 BAJA MÁS EN CELULAR */
                justify-content: flex-start;

                padding-top: 120px;
            }

            .dashboard-title {
                margin-bottom: 24px;
            }

            .dashboard-image {
                border-radius: 18px;
            }
        }

        /* 🔥 CELULAR */
        @media screen and (max-width: 480px) {

            .dashboard-container {
                padding-top: 110px;
                padding-left: 14px;
                padding-right: 14px;
            }

            .dashboard-title {
                font-size: 2rem;
                margin-bottom: 20px;
            }

            .dashboard-image {
                border-radius: 16px;
            }
        }
    </style>

    <div class="dashboard-container">

        <h1 class="dashboard-title">
            Bienvenido Admin 👋
        </h1>

        <img src="/images/bienvenida.jpg" class="dashboard-image">

    </div>
@endsection
