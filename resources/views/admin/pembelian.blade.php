@extends('admin.templates.index')

@section('page-content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pembelian</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table">
                        <thead class="bg-danger text-white">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Daftar</th>
                                <th>Tanggal Pembelian</th>
                                <th>Total Pembelian</th>
                                <th>Status Belanja</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor = 1; ?>
                            @foreach ($pembelian as $p)
                                <tr>
                                    <td><?php echo $nomor; ?></td>
                                    <td>{{ $p->nama }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($dataproduk[$p->idpembelian] as $dp)
                                                <li>
                                                    {{ $dp->nama }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ tanggal(date('Y-m-d', strtotime($p->tanggalbeli))) }}</td>
                                    <td>Rp. {{ number_format($p->totalbeli) }}</td>
                                    <td>{{ $p->statusbeli }}</td>
                                    <td>
                                        <a href="{{ url('admin/pembayaran/' . $p->idpembelian) }}"
                                            class="btn btn-info">Detail</a>
                                    </td>
                                </tr>
                                <?php $nomor++; ?>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
