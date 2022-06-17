@extends('layouts/laporan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 ml-5 mt-4">
            <div class="text-center lh-1 mb-2">
                <h1 class="fw-bold">Slip Gaji</h1> <span class="fw-normal">CV Sukses Motor</span>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-6">
                            <div> <h2> <span class="fw-bolder">Name :</span> <small class="ms-3"> {{ $gaji->Users->name ?? null }} </small> </h2> </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div> <h2> <span class="fw-bolder">Period :</span> <small class="ms-3"> {{ date("M-Y",strtotime($gaji->periode_gaji)) ?? null }} </small>  </h2> </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div> <h2> <span class="fw-bolder">Absen :</span> <small class="ms-3"> {{ $gaji->absen->jumlah_hadir ?? 0 }} </small> </h2>  </div>
                        </div>
                    </div>


                </div>
                <table class="mt-2 table table-bordered">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Gaji Pokok</th>
                            <td>Rp. {{ number_format($gaji->Users->gaji_pokok, 0, ',', '.') }}</td>

                        </tr>
                        <tr>
                            <th scope="row">Uang Absensi</th>
                            <td>Rp. {{ number_format($gaji->absen->total_uang_absen ?? 0, 0, ',', '.') }}</td>

                        </tr>
                        <tr>
                            <th scope="row">Uang Lembur</th>
                            <td>Rp. {{ number_format($gaji->lembur->total_uang_lembur ?? 0, 0, ',', '.') }}</td>

                        </tr>
                        <tr>
                            <th scope="row" class="mt-5">  </th>
                            <td class="mt-5"> =========== + </td>
                        </tr>
                        <tr class="border-top">
                            <th scope="row">Total Earning</th>
                            <td>Rp. {{ number_format($gaji->total_gaji ?? 0, 0, ',', '.') }}</td>

                        </tr>

                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    <div class="d-flex flex-column mt-2"> <span class="fw-bolder">Palembang, {{ date('d-M-Y') }}</span>
                    <br>
                    <br>
                    <br>
                    <br>
                    (Admin)
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<footer>

</footer>
@endsection
