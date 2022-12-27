@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table id="myTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Producto Folio</th>
                            <th>Producto</th>
                            <th>SKU</th>
                            <th>Order Folio</th>
                            <th>Operacion Folio</th>
                            <th>Total Entrada</th>
                            <th>Total Salida</th>
                            <th>Cantidad</th>
                            <th>Stock</th>
                            <th>Tipo Operacion</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#myTable').on('preXhr.dt', function (e, settings, data) {
                data.from = data['meta'].from;
                data.take = data.length;
                console.log(data.start);
            });

            $('#myTable').on('xhr.dt', function (e, settings, data, json) {
                data.recordsTotal = data['meta'].total;
                console.log(data);
                data.recordsFiltered = 300;
            });

            var table = $('#myTable')
            .dataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: "orders",
                    async: true,
                    dataSrc: function (data) {
                        return data['data'];
                    }
                },
                "columns": [
                    { "data": "product_id" },
                    { "data": "product" },
                    { "data": "sku" },
                    { "data": "order_id" },
                    { "data": "operation" },
                    { "data": "total_in" },
                    { "data": "total_out" },
                    { "data": "quantity" },
                    { "data": "stock" },
                    { "data": "type_operation" },
                ]
            });
        });
    </script>
@endpush
