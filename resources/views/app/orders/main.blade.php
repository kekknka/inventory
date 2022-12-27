@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-body">
                <button class="btn btn-sm btn-success" id="addBtn"><ion-icon name="add-outline" size="small"></ion-icon></button>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="pagination"></ul>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <form class="form-inline">
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="text" class="form-control" name="itemSearch" id="inputSearch" required>
                            </div>
                            <button type="button" id="btnFilter" class="btn btn-primary mb-2">Buscar</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
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
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <p class="text-center" id="labelTable">Mostrando registros del 1 al 10 de un total de 20 registros</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('app.orders.add')
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    <script>
        $(document).ready(function() {
            (function ( ) {
                axios.get('/orders')
                .then(function (response) {
                    let data = response.data;
                    construcTable(data.data);
                    constructPaginate(data.links, data.meta);
                    constructInfo(data.meta);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .finally(function () {
                    // always executed
                });
            }) ( );

            function functTable(action){
                axios.get('/orders', {
                    params: {
                        'page': action
                    }
                })
                .then(function (response) {
                    let data = response.data;
                    console.log(data);
                    construcTable(data.data);
                    constructPaginate(data.links, data.meta);
                    constructInfo(data.meta);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .finally(function () {
                    // always executed
                });
            }

            function construcTable(data){
                let tbody = $('#myTable').find('tbody');
                data.forEach(element => {
                    tbody.append($('<tr>').append(
                        $('<td>').text(element.product_id),
                        $('<td>').text(element.product),
                        $('<td>').text(element.sku),
                        $('<td>').text(element.order_id),
                        $('<td>').text(element.operation),
                        $('<td>').text(element.total_in),
                        $('<td>').text(element.total_out),
                        $('<td>').text(element.quantity),
                        $('<td>').text(element.stock),
                        $('<td>').text(element.type_operation),
                    ));
                });
            }

            function constructPaginate(links, meta){
                let paginate = $('.pagination');
                let current_page = meta.current_page;
                //Agregamos "pagination"
                for (let index = 1; index <= meta.last_page; index++) {
                    let active = "";
                    index == current_page ? active = "active" : false;
                    paginate.append('<li class="page-item '+ active +'"><a class="page-link" action="'+ meta.links[index].label +'" href="#">'+ index +'</a></li>');
                }

                // Agregamos "Anterior"
                if(links.prev != null){
                    $('.pagination').prepend('<li class="page-item"><a class="page-link" action="'+ (current_page - 1) +'" href="#">Anterior</a></li>');
                }else{
                    $('.pagination').prepend('<li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>');
                }

                // Agregamos "Siguiente"
                if(links.next != null){
                    $('.pagination').append('<li class="page-item"><a class="page-link" action="'+ (current_page + 1) +'" href="#">Siguiente</a></li>');
                }else{
                    $('.pagination').append('<li class="page-item disabled"><a class="page-link" href="#">Siguiente</a></li>');
                }

                $('.page-item').on('click', function(){
                    let a = $(this).find('.page-link');
                    let action = a.attr('action');
                    $('#myTable').find('tbody').find('tr').remove();
                    $('.pagination').find('li').remove();
                    functTable(action);
                });
            }

            $('#btnFilter').on('click', function(){
                $('#myTable').find('tbody').find('tr').remove();
                $('.pagination').find('li').remove();
                let product = $('#inputSearch').val();
                axios.get('/orders_search', {
                    params: {
                        'product': product
                    }
                })
                .then(function (response) {
                    let data = response.data;
                    construcTable(data.data);
                    constructPaginate(data.links, data.meta);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .finally(function () {
                    // always executed
                });
            });

            function constructInfo(meta){
                let label = $('#labelTable');
                label.text('Mostrando registros del '+ meta.from +' al '+ meta.to +' de un total de '+ meta.total +' registros')
            }

            $('#addBtn').on('click', function(){
                axios.get('/products')
                .then(function (response) {
                    let data = response.data.data;

                    for (let index = 0; index < data.length; index++) {
                        $('#sltProducts').append('<option price="'+ data[index].price_out +'" value="'+ data[index].id +'">'+ data[index].name +'</option>');
                    }
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .finally(function () {
                    // always executed
                });
                $('#addOperation').modal();
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#btnAddProduct').on('click', function(){
                let producto = $('#sltProducts option:selected');
                let id_producto = producto.val();
                let price_unit = producto.attr('price');
                let product_name = producto.text();

                let tableProduct = $('#tableProducts').find('tbody');

                let iptQuantity = '<input type="numer" min="0"  class="form-control-plaintext form-control-sm iptQuantity" name="quantity[]" value="'+ 1 +'">'
                let iptProductId = '<input type="text" readonly class="form-control-plaintext form-control-sm" name="id_product[]" value="'+ id_producto +'">'
                let iptProduct = '<input type="text" readonly class="form-control-plaintext form-control-sm" name="name[]" value="'+ product_name +'">'
                let iptPrecUnit = '<input type="text" readonly class="form-control-plaintext form-control-sm" name="price[]" value="'+ price_unit +'">'
                let iptTotal = '<input type="text" readonly class="form-control-plaintext form-control-sm" name="total[]" value="'+ 0.00 +'">'
                let iptType = '<input type="text" readonly class="form-control-plaintext form-control-sm" name="type[]" value="'+ 1 +'">'


                //detectar si el producto ya se encuentra agregado
                if(checkProducto(id_producto) == false){
                    tableProduct.append(`<tr>
                                            <td class="tdCount">`+ iptQuantity +`</td>
                                            <td class="tdIdProduct">`+ iptProductId +`</td>
                                            <td class="tdProductName">`+ iptProduct +`</td>
                                            <td class="tdPriceUnit">`+ iptPrecUnit +`</td>
                                            <td class="tdTotal">`+ iptTotal +`</td>
                                            <td class="tdType">`+ iptType +`</td>
                                        </tr>`);
                }

                // Obtenemos el subtotal
                processData();

                $('.iptQuantity').on('keyup', function(){
                    processData();
                });
                calcularTotal();
            });


            function processData(){
                var total_order = 0.00;
                let row = $('#tableProducts tbody tr');
                row.each(function() {
                    let cantidad, product_id, producto, pre_unit, total, operacion_type;
                    $(this).children("td").each(function (index2) {
                        switch (index2) {
                            case 0:
                                cantidad = $(this).find('input').val();
                                break;
                            case 1:
                                product_id = $(this).find('input').val();
                                break;
                            case 2:
                                 producto = $(this).find('input').val();
                                break;
                            case 3:
                                 pre_unit = $(this).find('input').val();
                                break;
                            case 4:
                                total = round(parseFloat(cantidad) * parseFloat(pre_unit));
                                $(this).html(total)
                                break;
                            case 5:
                                $(this).find('input').val($('#sltTypeOperation option:selected').val());
                                break;
                        }
                    });
                    total_order += round(parseFloat(total));
                });
                $('#subtotal').val(round(total_order));
            }

            function checkProducto(id_producto){
                let result = false;
                let row = $('#tableProducts tbody tr');
                row.each(function() {
                    let quantity, product_id;
                    $(this).children("td").each(function (index2) {
                        switch (index2) {
                            case 0:
                                quantity = $(this).find('input');
                                break;
                            case 1:
                                product_id = $(this).find('input').val();
                                break;
                        }
                    });
                    console.log(product_id + ' = ' + id_producto);
                    if(product_id == id_producto){
                        quantity.val(parseInt(quantity.val()) + 1);
                        result = true;
                        return result;
                        exit();
                    }
                });
                return result;
            }

            $('#descuento').on('keyup', function(){
                calcularTotal();
            });

            function calcularTotal(){
                let subtotal = $('#subtotal').val();
                let discount = $('#descuento').val();
                let total  = $('#total');

                if(parseFloat(discount) > 0){
                    total.val(round((parseFloat(discount) / 100) * parseFloat(subtotal), 2));
                }else{
                    total.val(parseFloat(subtotal));
                }

            }

            function round(num, decimales = 2) {
                var signo = (num >= 0 ? 1 : -1);
                num = num * signo;
                if (decimales === 0) //con 0 decimales
                    return signo * Math.round(num);
                // round(x * 10 ^ decimales)
                num = num.toString().split('e');
                num = Math.round(+(num[0] + 'e' + (num[1] ? (+num[1] + decimales) : decimales)));
                // x * 10 ^ (-decimales)
                num = num.toString().split('e');
                return signo * (num[0] + 'e' + (num[1] ? (+num[1] - decimales) : -decimales));
            }

            $('#sltTypeOperation').on('change', function(){
                processData();
            });
        });
    </script>
@endpush
