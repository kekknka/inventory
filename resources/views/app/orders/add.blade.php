<!-- Modal -->
<div class="modal fade" id="addOperation" tabindex="-1" aria-labelledby="addOperationLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOperationLabel">Operación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('order.save') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-inline">
                                <div class="form-group">
                                    <label for="inputPassword2" class="sr-only">Productos</label>
                                    <select class="form-control form-control-sm" name="" id="sltProducts"></select>
                                  </div>
                                <button type="button" id="btnAddProduct" class="btn btn-sm btn-primary mb-2">Agregar</button>
                                </div>
                            <table id="tableProducts" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Cantidad</th>
                                        <th>producto id</th>
                                        <th>Producto</th>
                                        <th>Precio unitario</th>
                                        <th>Total</th>
                                        <th>operation_type_id</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tipo operacion</label>
                                <select class="form-control form-control-sm" name="operation_type" id="sltTypeOperation">
                                    <option value="1" selected>Entrada</option>
                                    <option value="2">Salida</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Subtotal</label>
                                <input type="number" readonly class="form-control form-control-sm" name="subtotal" step="any" id="subtotal" min="0.00" value="0.00">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Descuento (%)</label>
                                <input type="number" class="form-control form-control-sm" min="0" name="discount" step="any" value="0" id="descuento">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Total</label>
                                <input type="number" class="form-control form-control-sm" min="0.00" name="total" step="any" value="0.00" id="total">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar Operación</button>
                    <input type="submit" value="prueba">
                </div>
            </form>
        </div>
    </div>
</div>
