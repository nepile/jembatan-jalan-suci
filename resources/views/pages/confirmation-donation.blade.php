@extends('layouts.page')

@section('title', 'Cek No. Invoice | Yauma')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">

                <!-- Card Utama -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">

                        <!-- Header Oranye -->
                        <div class="bg-primary text-white py-3 px-4 rounded-top">
                            <h5 class="mb-0 fw-bold">Cek No. Invoice</h5>
                        </div>

                        <!-- Form Cek Invoice -->
                        <div class="p-4">
                            <form action="#" method="GET">
                                <div class="mb-4">
                                    <label for="no_invoice" class="form-label fw-bold text-dark">
                                        No. Invoice
                                    </label>
                                    <input type="text" class="form-control form-control-lg rounded-pill border"
                                        id="no_invoice" name="no_invoice" placeholder="Masukkan No. Invoice" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-primary btn-lg px-5 rounded-pill fw-bold shadow-sm">
                                        Cek Invoice
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
