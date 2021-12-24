<section class="final-order section-padding bg-light-theme">
    <div class="container">
        <div class="row">
            <!-- cart detail -->
            <div class="col-lg-8">
                <div class="sidebar">
                    <div class="cart-detail-box">
                        <div class="card" id="card-cart">
                            <div class="card-header padding-15 fw-700">
                                <h5>Cart</h5>
                            </div>
                            <div id="card-body" class="card-body no-padding" id="scrollstyle-4">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end cart detail -->

            <!-- summary -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="cart-detail-box">
                        <div class="card">
                            <div class="card-header padding-15 fw-700">
                                <h5>Shopping Summary</h5>
                            </div>
                            <div class="card-body no-padding" id="scrollstyle-4">
                                <div class="item-total">
                                    <div class="total-price border-0 pb-0">
                                        <span class="text-dark-white fw-600">Total Price (Items):</span>
                                        <span class="text-dark-white fw-600" id="total-price">0</span>
                                    </div>
                                    <div class="total-price border-0 pt-0 pb-0"> <span class="text-light-green fw-600">Delivery fee:</span>
                                        <span class="text-light-green fw-600">FREE</span>
                                    </div>

                                    <div class="total-price border-0 "> <span class="text-light-black fw-700">GrandTotal:</span>
                                        <span class="text-light-black fw-700" id="total-grand">0</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button id="pay-button" class="btn btn-outline-success btn-block btn-sm">Proccess Payment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end summary -->
        </div>
    </div>
</section>


<script>
    function format_number(x) {
        return new Intl.NumberFormat('de-DE').format(x)
    }

    function load_cart() {
        $.ajax({
            type: 'get',
            url: "<?= site_url('get-cart') ?>",
            dataType: 'json',
            success: function(res) {
                var html = '';
                if (res.status) {
                    var data = res.data;

                    for (let i = 0; i < data.length; i++) {
                        var line = data[i];
                        html += ` <div class="cat-product-box">
                                    <div class="cat-product">
                                        <div class="cat-name">
                                            <a href="#">
                                                <p class="text-light-green fw-700">
                                                    <span class="text-dark-white">
                                                     ${line.qty}
                                                    </span> ${line.nama_produk}
                                                </p>
                                                &nbsp
                                                <p class="text-dark-white fw-700">Rp ${format_number(line.harga_unit)}</p>
                                            </a>
                                        </div>
                                        <div class="delete-btn">
                                            <a href="#" data-id="${line.kode}"  class="text-dark-white btn-delete-cart">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>`;
                    }
                    $('#card-cart .card-body').html(html);
                    var grandTotal = parseInt(res.total);
                    $('#total-price').html('Rp ' + format_number(res.total));

                    $('#total-grand').html('Rp ' + format_number(grandTotal));
                    get_total_cart();
                } else {
                    $('#card-cart .card-body').html('<div class="text-center">Empty Cart!</div>');
                    $('#total-price').html('Rp ' + format_number(0));

                    $('#total-grand').html('Rp ' + format_number(0));
                    get_total_cart();
                    $('#pay-button').attr('disabled', 'true');
                }
            }
        });
    }
    load_cart();

    $('#pay-button').on('click', function(e) {
        e.preventDefault();
        console.log('proccess payment');
        payment_process();
    });

    function payment_process() {
        $.ajax({
            type: 'get',
            url: "<?= site_url('pay-gopay') ?>",
            dataType: 'json',
            success: function(res) {
                if (res.status) {
                    load_cart();
                    get_total_cart();
                    $('#main-container').load('<?= site_url('menu') ?>?page=checkout');
                    console.log('payment created!');
                }
            }
        });
    }
</script>