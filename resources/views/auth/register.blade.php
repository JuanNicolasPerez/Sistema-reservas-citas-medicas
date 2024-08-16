<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de reservas de citas medicas</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css?v=3.2.0') }}">
    <script nonce="9e471d7a-0753-4581-bae2-f2a1c078b8d6">
        try {
            (function(w, d) {
                ! function(bt, bu, bv, bw) {
                    if (bt.zaraz) console.error("zaraz is loaded twice");
                    else {
                        bt[bv] = bt[bv] || {};
                        bt[bv].executed = [];
                        bt.zaraz = {
                            deferred: [],
                            listeners: []
                        };
                        bt.zaraz._v = "5773";
                        bt.zaraz.q = [];
                        bt.zaraz._f = function(bx) {
                            return async function() {
                                var by = Array.prototype.slice.call(arguments);
                                bt.zaraz.q.push({
                                    m: bx,
                                    a: by
                                })
                            }
                        };
                        for (const bz of ["track", "set", "debug"]) bt.zaraz[bz] = bt.zaraz._f(bz);
                        bt.zaraz.init = () => {
                            var bA = bu.getElementsByTagName(bw)[0],
                                bB = bu.createElement(bw),
                                bC = bu.getElementsByTagName("title")[0];
                            bC && (bt[bv].t = bu.getElementsByTagName("title")[0].text);
                            bt[bv].x = Math.random();
                            bt[bv].w = bt.screen.width;
                            bt[bv].h = bt.screen.height;
                            bt[bv].j = bt.innerHeight;
                            bt[bv].e = bt.innerWidth;
                            bt[bv].l = bt.location.href;
                            bt[bv].r = bu.referrer;
                            bt[bv].k = bt.screen.colorDepth;
                            bt[bv].n = bu.characterSet;
                            bt[bv].o = (new Date).getTimezoneOffset();
                            if (bt.dataLayer)
                                for (const bG of Object.entries(Object.entries(dataLayer).reduce(((bH, bI) => ({
                                        ...bH[1],
                                        ...bI[1]
                                    })), {}))) zaraz.set(bG[0], bG[1], {
                                    scope: "page"
                                });
                            bt[bv].q = [];
                            for (; bt.zaraz.q.length;) {
                                const bJ = bt.zaraz.q.shift();
                                bt[bv].q.push(bJ)
                            }
                            bB.defer = !0;
                            for (const bK of [localStorage, sessionStorage]) Object.keys(bK || {}).filter((bM => bM
                                .startsWith("_zaraz_"))).forEach((bL => {
                                try {
                                    bt[bv]["z_" + bL.slice(7)] = JSON.parse(bK.getItem(bL))
                                } catch {
                                    bt[bv]["z_" + bL.slice(7)] = bK.getItem(bL)
                                }
                            }));
                            bB.referrerPolicy = "origin";
                            bB.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(bt[bv])));
                            bA.parentNode.insertBefore(bB, bA)
                        };
                        ["complete", "interactive"].includes(bu.readyState) ? zaraz.init() : bt.addEventListener(
                            "DOMContentLoaded", zaraz.init)
                    }
                }(w, d, "zarazData", "script");
                window.zaraz._p = async j => new Promise((k => {
                    if (j) {
                        j.e && j.e.forEach((l => {
                            try {
                                const m = d.querySelector("script[nonce]"),
                                    n = m?.nonce || m?.getAttribute("nonce"),
                                    o = d.createElement("script");
                                n && (o.nonce = n);
                                o.innerHTML = l;
                                o.onload = () => {
                                    d.head.removeChild(o)
                                };
                                d.head.appendChild(o)
                            } catch (p) {
                                console.error(`Error executing script: ${l}\n`, p)
                            }
                        }));
                        Promise.allSettled((j.f || []).map((q => fetch(q[0], q[1]))))
                    }
                    k()
                }));
                zaraz._p({
                    "e": ["(function(w,d){})(window,document)"]
                });
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>
</head>

<body class="hold-transition login-page"
    style=" background-image: url('{{ url('assets/img/about.jpg') }}');
            background-repeat: no-repeat;
            background-size: 100vw 100vh;
            background-attachement: fixed">

    <div class="login-box">

        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>SIS</b>MEDICAL</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Registro de usuario</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row">
                        <label for="name" class="col-form-label text-md-end">Nombre: </label>

                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label for="email" class="col-form-label text-md-end">Correo: </label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label for="password" class="col-form-label text-md-end">Contraseña: </label>

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label for="password-confirm" class="col-form-label text-md-end">Comfirmar contraseña: </label>

                        <div class="col-md-12">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                Registrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ url('dist/js/adminlte.min.js?v=3.2.0') }}"></script>
</body>

</html>