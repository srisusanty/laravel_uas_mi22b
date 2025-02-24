@extends('layouts.front')
@section('contents')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if ($order->status != 'Pembayaran Diterima' && $order->status != 'Pengiriman' && $order->status != 'Diterima')
                        <h1 class="text-center mb-4">Checkout Success</h1>
                    @else
                        <h1 class="text-center mb-4">Invoice</h1>
                    @endif
                    <div class="sec-banner bg0 p-t-80 p-b-50">
                        <div class="container">
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Button Print & Email -->
            <div class="row mb-3">
                <div class="col-12">
                    <button onclick="printInvoice()" class="btn btn-secondary mr-2">
                        <i class="fas fa-print"></i> Print Invoice
                    </button>
                    <button onclick="sendEmail()" class="btn btn-info">
                        <i class="fas fa-envelope"></i> Kirim ke Email
                    </button>
                </div>
            </div>

            <!-- Invoice Content -->


            <div class="row mb-5">
                <div class="col-lg-6" id="invoice-content">
                    <h2>Invoice Order #{{ $order->invoice_number }}</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                            @foreach ($order_items as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                </tr>
                                <?php $total += $item->subtotal; ?>
                            @endforeach
                            <tr>
                                <th colspan="2">Ongkir</th>
                                <th>{{ $order->shipping_courier }}</th>
                                <th>Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}</th>
                            </tr>
                            <tr>
                                <th colspan="3">Total</th>
                                <th>Rp
                                    {{ number_format($total + $order->shipping_cost, 0, ',', '.') }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6">
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Nomor Rekening</h5>
                            <p class="card-text">Silahkan transfer ke nomor rekening berikut:</p>
                            @foreach ($bank as $bankDetail)
                                <hr>
                                <div class="d-flex align-items-center mb-2">
                                    <strong class="mr-2">{{ $bankDetail->bank_name }}</strong>
                                    <span id="rekening-{{ $loop->index }}">{{ $bankDetail->account_number }}</span>
                                    <button onclick="copyToClipboard('rekening-{{ $loop->index }}')"
                                        class="btn btn-sm btn-outline-primary ml-2">
                                        <i class="fas fa-copy"></i> Salin
                                    </button>
                                </div>
                                <p class="card-text">
                                    Atas Nama <strong>{{ $bankDetail->account_name }}</strong>
                                </p>
                            @endforeach
                        </div>
                    </div>
                    @if (!$order->payment)
                        @if ($order->status != 'Pembayaran Diterima' && $order->status != 'Pengiriman' && $order->status != 'Diterima')
                            <form action="{{ route('upload-bukti') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <div class="form-group">
                                    <label for="bukti_transfer">Upload Bukti Transfer</label>
                                    <input type="file" class="form-control" id="bukti_transfer" name="bukti_transfer"
                                        accept=".jpg, .jpeg, .png, .JPG" onchange="validateFile(this)">
                                    <script>
                                        function validateFile(input) {
                                            const file = input.files[0];
                                            if (file) {
                                                const validExtensions = ['image/jpeg', 'image/png', 'image/jpg'];
                                                if (!validExtensions.includes(file.type)) {
                                                    alert('Hanya gambar dengan format jpg, jpeg, atau png yang boleh diupload.');
                                                    input.value = '';
                                                }
                                            }
                                        }
                                    </script>
                                </div>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                        @endif
                    @endif

                </div>
            </div>
        </div>
    </section>

    <!-- CSS untuk print -->
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #invoice-content,
            #invoice-content * {
                visibility: visible;
            }

            #invoice-content {
                position: absolute;
                left: 0;
                top: 0;
            }

            .no-print {
                display: none !important;
            }
        }
    </style>

    <!-- JavaScript untuk fungsi copy, print dan email -->
    <script>
        function copyToClipboard(elementId) {
            const text = document.getElementById(elementId).textContent;
            navigator.clipboard.writeText(text).then(() => {
                // Tampilkan feedback
                alert('Nomor rekening berhasil disalin!');
            }).catch(err => {
                console.error('Gagal menyalin teks: ', err);
            });
        }

        function printInvoice() {
            window.print();
        }

        function sendEmail() {
            const emailBtn = document.querySelector('button[onclick="sendEmail()"]');
            const originalBtnContent = emailBtn.innerHTML;

            // Disable button and show loading state
            emailBtn.disabled = true;
            emailBtn.innerHTML = `
        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
        Mengirim Email...
    `;

            const orderId = "{{ $order->id }}";
            const loading = document.createElement('div');
            loading.classList.add('d-flex', 'justify-content-center');
            loading.innerHTML = `
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    `;
            document.body.appendChild(loading);

            fetch(`/send-invoice-email/${orderId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    document.body.removeChild(loading);
                    // Restore button state
                    emailBtn.disabled = false;
                    emailBtn.innerHTML = originalBtnContent;

                    if (data.success) {
                        alert('Invoice berhasil dikirim ke email Anda!');
                    } else {
                        console.error('Error:', data);
                        alert('Gagal mengirim email. Silakan coba lagi.');
                    }
                })
                .catch(error => {
                    document.body.removeChild(loading);
                    // Restore button state
                    emailBtn.disabled = false;
                    emailBtn.innerHTML = originalBtnContent;

                    console.error('Error:', error);
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                });
        }
    </script>

    <!-- Tambahkan Font Awesome untuk icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
