<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="/assets/image/png" sizes="16x16" href="/assets/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="/assets/css/style.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>

    <div class="flex">

        {{-- Sidebar --}}
        <aside
            class="w-fit py-4 px-3 bg-white my-6 border border-gray-200 rounded-r-2xl flex flex-col justify-between ">
            <div class="">
                <div class="logo border-b border-gray-200 pb-4 mb-4">
                    <h1 class="text-2xl font-semibold text-center">POS</h1>
                </div>
                <div class="flex flex-col gap-8 items-center">
                    <a href="{{ route('dashboard') }}" title="Dashboard"
                        class="{{ request()->routeIs('dashboard') ? ' text-gray-600 ' : 'text-gray-500' }}"><svg
                            xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M6 19h3.692v-5.884h4.616V19H18v-9l-6-4.538L6 10zm-1 1V9.5l7-5.288L19 9.5V20h-5.692v-5.884h-2.616V20zm7-7.77" />
                        </svg></a>


                    @if (Auth::user()->role == 'kasir')
                        <a href="{{ route('transaksi.index') }}" title="Transaksi"
                            class="
                        {{ request()->routeIs('transaksi.index') ? ' text-black ' : 'text-gray-500' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M6.5 16.039q1.31 0 2.547.3t2.453.98V7.508q-1.083-.773-2.386-1.16q-1.305-.386-2.614-.386q-.9 0-1.576.107t-1.501.4q-.23.077-.327.222Q3 6.835 3 7.008v9.015q0 .27.192.394t.423.03q.548-.185 1.267-.297t1.618-.111m6 1.28q1.216-.678 2.453-.98t2.547-.3q.9 0 1.618.111t1.267.296q.23.096.423-.029t.192-.394V7.008q0-.173-.096-.308q-.096-.134-.327-.23q-.825-.293-1.501-.4T17.5 5.961q-1.31 0-2.613.386q-1.304.387-2.387 1.16zm-.5 1.137q-.235 0-.432-.059t-.376-.15q-1.09-.595-2.27-.902T6.5 17.04q-.78 0-1.534.13q-.753.131-1.466.42q-.544.217-1.022-.131T2 16.496V6.831q0-.371.195-.689t.547-.442q.881-.388 1.833-.563T6.5 4.962q1.47 0 2.866.423q1.398.423 2.634 1.23q1.237-.807 2.634-1.23t2.866-.423q.973 0 1.925.175t1.833.563q.352.125.547.442t.195.689v9.665q0 .614-.516.943q-.517.328-1.1.111q-.693-.27-1.418-.39q-.724-.121-1.466-.121q-1.24 0-2.421.306t-2.271.901q-.18.093-.376.151q-.197.059-.432.059m1.885-9.508q0-.11.076-.222t.18-.168q.763-.346 1.613-.53q.85-.182 1.746-.182q.48 0 .91.053t.886.153q.129.03.224.135q.096.104.096.257q0 .252-.15.366t-.402.052q-.37-.075-.757-.103q-.388-.028-.807-.028q-.804 0-1.573.154q-.77.154-1.46.43q-.257.099-.42-.005t-.162-.362m0 5.423q0-.11.076-.231q.076-.123.18-.178q.725-.346 1.613-.52q.888-.173 1.746-.173q.48 0 .91.053t.886.153q.129.03.224.135q.096.104.096.257q0 .252-.15.366t-.402.052q-.37-.075-.757-.103q-.388-.028-.807-.028q-.784 0-1.544.16q-.76.161-1.45.457q-.258.118-.44-.003t-.181-.397m0-2.692q0-.11.076-.222t.18-.168q.763-.347 1.613-.53q.85-.182 1.746-.182q.48 0 .91.053t.886.153q.129.03.224.134q.096.104.096.258q0 .252-.15.366t-.402.051q-.37-.075-.757-.102q-.388-.028-.807-.028q-.804 0-1.573.154q-.77.153-1.46.43q-.257.098-.42-.005q-.162-.105-.162-.362" />
                            </svg>
                        </a>
                    @endif

                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('users.index') }}" title=" Data User"
                            class="{{ request()->routeIs('users.index') ? ' text-black ' : 'text-gray-500' }}"><svg
                                xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-width="1.5">
                                    <circle cx="12" cy="6" r="4" />
                                    <path
                                        d="M20 17.5c0 2.485 0 4.5-8 4.5s-8-2.015-8-4.5S7.582 13 12 13s8 2.015 8 4.5Z" />
                                </g>
                            </svg></a>
                        <a href="{{ route('barang.index') }} " title="Data Barang"
                            class="{{ request()->routeIs('barang.index') ? ' text-black ' : 'text-gray-500' }}"><svg
                                xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 20 20">
                                <path fill="currentColor"
                                    d="M11 3a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1zm4 0h-3v2h3zm-1.5 4a.5.5 0 0 1 .5.5v5.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L13 13.293V7.5a.5.5 0 0 1 .5-.5M4 12a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1zm4 0H5v2h3zm-5.5 1a.5.5 0 0 1 .5.5V15a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1.5a.5.5 0 0 1 1 0V15a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-1.5a.5.5 0 0 1 .5-.5" />
                            </svg></a>
                        <a href="{{ route('JenisBarang.index') }}" title=" Data Jenis Barang"
                            class="{{ request()->routeIs('JenisBarang.index') ? ' text-black ' : 'text-gray-500' }}"><svg
                                xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 20 20">
                                <path fill="currentColor"
                                    d="M11 3a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1zm4 0h-3v2h3zm-1.854 4.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L14 8.707V14.5a.5.5 0 0 1-1 0V8.707l-1.146 1.147a.5.5 0 0 1-.708-.708zM4 12a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1zm4 0H5v2h3zm-5.5 1a.5.5 0 0 1 .5.5V15a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1.5a.5.5 0 0 1 1 0V15a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-1.5a.5.5 0 0 1 .5-.5" />
                            </svg></a>
                    @endif


                </div>
            </div>

            <div class="">
                <a href="{{ route('logout') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M14.945 1.25c-1.367 0-2.47 0-3.337.117c-.9.12-1.658.38-2.26.981c-.524.525-.79 1.17-.929 1.928c-.135.737-.161 1.638-.167 2.72a.75.75 0 0 0 1.5.008c.006-1.093.034-1.868.142-2.457c.105-.566.272-.895.515-1.138c.277-.277.666-.457 1.4-.556c.755-.101 1.756-.103 3.191-.103h1c1.436 0 2.437.002 3.192.103c.734.099 1.122.28 1.4.556c.276.277.456.665.555 1.4c.102.754.103 1.756.103 3.191v8c0 1.435-.001 2.436-.103 3.192c-.099.734-.279 1.122-.556 1.399s-.665.457-1.399.556c-.755.101-1.756.103-3.192.103h-1c-1.435 0-2.436-.002-3.192-.103c-.733-.099-1.122-.28-1.399-.556c-.243-.244-.41-.572-.515-1.138c-.108-.589-.136-1.364-.142-2.457a.75.75 0 1 0-1.5.008c.006 1.082.032 1.983.167 2.72c.14.758.405 1.403.93 1.928c.601.602 1.36.86 2.26.982c.866.116 1.969.116 3.336.116h1.11c1.368 0 2.47 0 3.337-.116c.9-.122 1.658-.38 2.26-.982s.86-1.36.982-2.26c.116-.867.116-1.97.116-3.337v-8.11c0-1.367 0-2.47-.116-3.337c-.121-.9-.38-1.658-.982-2.26s-1.36-.86-2.26-.981c-.867-.117-1.97-.117-3.337-.117z" />
                        <path fill="currentColor"
                            d="M15 11.25a.75.75 0 0 1 0 1.5H4.027l1.961 1.68a.75.75 0 1 1-.976 1.14l-3.5-3a.75.75 0 0 1 0-1.14l3.5-3a.75.75 0 1 1 .976 1.14l-1.96 1.68z" />
                    </svg>
                </a>
            </div>

        </aside>

        {{-- Main --}}
        <main class="flex-1 bg-gray-100 min-h-screen p-8 ">
            @yield('content')
        </main>




    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->



    <!--**********************************
        Scripts
    ***********************************-->
    <script src="/assets/plugins/common/common.min.js"></script>
    <script src="/assets/js/custom.min.js"></script>
    <script src="/assets/js/settings.js"></script>
    <script src="/assets/js/gleek.js"></script>
    <script src="/assets/js/styleSwitcher.js"></script>

    <script src="/assets/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>



</body>

</html>
