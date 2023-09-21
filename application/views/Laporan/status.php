<style type="text/css" media="all">
    body {
        color: #000;
    }

    .container {
        display: flex;
        width: 100%;
    }

    .left {
        /* flex: 1; */
        /* background-color: #3498db; */
        padding: 20px;
        /* color: white; */
        width: 39%;
    }

    .center {
        /* flex: 1; */
        /* background-color: #000000; */
        padding: 20px;
        color: white;
        width: 1%;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    .right {
        /* flex: 2; */
        /* background-color: #e74c3c; */
        /* padding: 20px; */
        color: black;
        width: 60%;
        display: flex;
        /* flex-direction: column; */
        /* gap: 40px; */
        align-items: center;
        justify-content: center;
    }

    .container-step {
        margin: 0px 45px 0px 45px;
        display: flex;
        flex-direction: column;
        align-items: center;
        /* gap: 40px; */
        /* max-width: 400px; */
        width: 100%;
    }

    .container-step .steps {
        /* margin-top: 15px; */
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: space-between;
        position: relative;
    }


    .container-step .steps2 {
        margin-bottom: 15px;
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: space-between;
        position: relative;
    }

    .steps .circle {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 50px;
        width: 50px;
        color: #999;
        font-size: 22px;
        font-weight: 500;
        border-radius: 50%;
        background: #fff;
        border: 4px solid #e0e0e0;
        transition: all 200ms ease;
        transition-delay: 0s;
        z-index: 1;
    }

    .steps .circle.active {
        transition-delay: 100ms;
        border-color: #4070f4;
        color: #4070f4;
        z-index: 1;
    }

    .steps .progress-bar {
        position: absolute;
        height: 4px;
        width: 100%;
        background: #e0e0e0;
        z-index: 0;
    }

    .progress-bar .indicator {
        display: flex;
        position: absolute;
        height: 4px;
        background: #4070f4;
        transition: all 300ms ease;
    }

    .container-step .buttons {
        margin-top: 40px;
        display: flex;
        gap: 20px;
    }

    .buttons button {
        padding: 8px 25px;
        background: #4070f4;
        border: none;
        border-radius: 8px;
        color: #fff;
        font-size: 16px;
        font-weight: 400;
        cursor: pointer;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
        transition: all 200ms linear;
    }

    .buttons button:active {
        transform: scale(0.97);
    }

    .buttons button:disabled {
        background: #87a5f8;
        cursor: not-allowed;
    }

    .vertical-line {
        width: 2px;
        /* Lebar garis */
        height: 200px;
        /* Tinggi garis */
        background-color: #000;
        /* Warna garis */
    }

    #wrapper {
        /* max-width: 1300px; */
        margin: 0px 35px 15px 35px;
        border-radius: 7px;
        padding-top: 20px;
    }

    /* #back {
    position: absolute;
    bottom: 0;
    right: 0;
    margin-bottom: 30px;
    margin-right: 50px;
    background-color: #4070f4;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
} */

    /* #back {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #4070f4;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
} */

    .btnBack {
        padding: 8px 25px;
        background: #808080;
        border: none;
        border-radius: 8px;
        color: #fff;
        font-size: 16px;
        font-weight: 400;
        cursor: pointer;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
        transition: all 200ms linear;
    }

    .flip-horizontal {
        transform: scaleX(-1);
    }

    /* #myTextarea {
    font-size: 20px;
    /* Ganti dengan ukuran yang Anda inginkan */
    /* } */

    */
</style>
<?php if ($this->session->flashdata('message')) { ?>
    <div class="col-lg-12 alerts">
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4> <i class="icon fa fa-check"></i> Sukses</h4>
            <p><?php echo $this->session->flashdata('message'); ?></p>
        </div>
    </div>
<?php } else {
} ?>
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-primary'>
                <div class='box-header  with-border'>
                    <h3 class='box-title'>STATUS PEMBAYARAN</h3>
                </div>
                <div class="box-body">

                    <div id="wrapper" style="background-color: #f5f5f5; height: 685px">
                        <div class="container">
                            <div class="left">
                                <!-- Konten layar kiri -->
                                <h4>
                                    <?php echo $status['no_trf']; ?>&emsp;&emsp;&emsp;<span><?php echo $status['tgl_trf']; ?></span>&emsp;&emsp;&emsp;<span>
                                        <?php // Misalnya, nilai awal adalah 1
                                        if ($status['id_pembayaran'] == 1) {
                                            $status['id_pembayaran'] = "Cash"; // Jika nilai adalah 1, maka ganti dengan
                                        } elseif ($status['id_pembayaran'] == 2) {
                                            $status['id_pembayaran'] = "Transfer"; // Jika nilai adalah 2, maka ganti dengan
                                        } elseif ($status['id_pembayaran'] == 3) {
                                            $status['id_pembayaran'] = "DP"; // Jika nilai adalah 3, maka ganti dengan
                                        }
                                        // Kemudian, Anda dapat mencetak nilai yang sudah diubah
                                        echo $status['id_pembayaran'];
                                        ?></span>
                                </h4>
                                <h1 style="margin-top: 50px;"><?php echo $status['nama_pelanggan']; ?></h1>

                            </div>
                            <div class="center">
                                <!-- Konten layar kanan -->
                                <div class="vertical-line"></div>
                            </div>
                            <div class="right">
                                <!-- Konten layar kanan -->

                                <div class="container-step">
                                    <?php
                                    if ($status['status_transaksi'] == "1") {
                                    ?>
                                        <div class="steps2">
                                            <span class="circle2" style="padding-left: 9px;" id="1">Baru</span>
                                            <span class="circle2" style="padding-left: 35px;" id="2">Dijahit</span>
                                            <span class="circle2" style="padding-left: 10px;" id="3">Selesai Dijahit</span>
                                            <span class="circle2" style="padding-right: 27px;" id="4">Dikirim</span>
                                            <span class="circle2" style="padding-right: 5px;" id="5">Selesai</span>
                                        </div>
                                        <div class="steps">
                                            <span class="circle active" id="1"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                            <span class="circle" id="2"><i class="fa fa-scissors" aria-hidden="true"></i></span>
                                            <span class="circle" id="3"><i class="fa fa-archive" aria-hidden="true"></i></span>
                                            <span class="circle" id="4"><i class="fa fa-truck flip-horizontal" aria-hidden="true"></i></span>
                                            <span class="circle" id="5"><i class="fa fa-check" aria-hidden="true"></i></span>
                                            <div class="progress-bar">
                                                <span class="indicator"></span>
                                            </div>
                                        </div>
                                        <div class="buttons">
                                            <form action="<?php echo base_url('laporan/updatestatus'); ?>" method="POST">
                                                <input type="hidden" name="no_trf" value="<?php echo $status['no_trf']; ?>" />
                                                <input type="hidden" name="status_transaksi" value="2" />
                                                <button type="submit" id="submit">Step selanjutnya</button>
                                            </form>
                                        </div>
                                    <?php } else if ($status['status_transaksi'] == "2") { ?>
                                        <div class="steps2">
                                            <span class="circle2" style="padding-left: 9px;" id="1">Baru</span>
                                            <span class="circle2" style="padding-left: 35px;" id="2">Dijahit</span>
                                            <span class="circle2" style="padding-left: 10px;" id="3">Selesai Dijahit</span>
                                            <span class="circle2" style="padding-right: 27px;" id="4">Dikirim</span>
                                            <span class="circle2" style="padding-right: 5px;" id="5">Selesai</span>
                                        </div>
                                        <div class="steps">
                                            <span class="circle active" id="1"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                            <span class="circle active" id="2"><i class="fa fa-scissors" aria-hidden="true"></i></span>
                                            <span class="circle" id="3"><i class="fa fa-archive" aria-hidden="true"></i></span>
                                            <span class="circle" id="4"><i class="fa fa-truck flip-horizontal" aria-hidden="true"></i></span>
                                            <span class="circle" id="5"><i class="fa fa-check" aria-hidden="true"></i></span>
                                            <div class="progress-bar">
                                                <span class="indicator" style="width: 30%; "></span>
                                            </div>
                                        </div>
                                        <div class="buttons">
                                            <form action="<?php echo base_url('laporan/updatestatus'); ?>" method="POST">
                                                <input type="hidden" name="no_trf" value="<?php echo $status['no_trf']; ?>" />
                                                <input type="hidden" name="status_transaksi" value="3" />
                                                <button type="submit" id="submit">Step selanjutnya</button>
                                            </form>
                                        </div>
                                    <?php } else if ($status['status_transaksi'] == "3") { ?>
                                        <div class="steps2">
                                            <span class="circle2" style="padding-left: 9px;" id="1">Baru</span>
                                            <span class="circle2" style="padding-left: 35px;" id="2">Dijahit</span>
                                            <span class="circle2" style="padding-left: 10px;" id="3">Selesai Dijahit</span>
                                            <span class="circle2" style="padding-right: 27px;" id="4">Dikirim</span>
                                            <span class="circle2" style="padding-right: 5px;" id="5">Selesai</span>
                                        </div>
                                        <div class="steps">
                                            <span class="circle active" id="1"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                            <span class="circle active" id="2"><i class="fa fa-scissors" aria-hidden="true"></i></span>
                                            <span class="circle active" id="3"><i class="fa fa-archive" aria-hidden="true"></i></span>
                                            <span class="circle" id="4"><i class="fa fa-truck flip-horizontal" aria-hidden="true"></i></span>
                                            <span class="circle" id="5"><i class="fa fa-check" aria-hidden="true"></i></span>
                                            <div class="progress-bar">
                                                <span class="indicator" style="width: 50%; "></span>
                                            </div>
                                        </div>
                                        <div class="buttons">
                                            <form action="<?php echo base_url('laporan/updatestatus'); ?>" method="POST">
                                                <input type="hidden" name="no_trf" value="<?php echo $status['no_trf']; ?>" />
                                                <input type="hidden" name="status_transaksi" value="4" />
                                                <button type="submit" id="submit">Step selanjutnya</button>
                                            </form>
                                        </div>
                                    <?php } else if ($status['status_transaksi'] == "4") { ?>
                                        <div class="steps2">
                                            <span class="circle2" style="padding-left: 9px;" id="1">Baru</span>
                                            <span class="circle2" style="padding-left: 35px;" id="2">Dijahit</span>
                                            <span class="circle2" style="padding-left: 10px;" id="3">Selesai Dijahit</span>
                                            <span class="circle2" style="padding-right: 27px;" id="4">Dikirim</span>
                                            <span class="circle2" style="padding-right: 5px;" id="5">Selesai</span>
                                        </div>
                                        <div class="steps">
                                            <span class="circle active" id="1"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                            <span class="circle active" id="2"><i class="fa fa-scissors" aria-hidden="true"></i></span>
                                            <span class="circle active" id="3"><i class="fa fa-archive" aria-hidden="true"></i></span>
                                            <span class="circle active" id="4"><i class="fa fa-truck flip-horizontal" aria-hidden="true"></i></span>
                                            <span class="circle" id="5"><i class="fa fa-check" aria-hidden="true"></i></span>
                                            <div class="progress-bar">
                                                <span class="indicator" style="width: 70%; "></span>
                                            </div>
                                        </div>
                                        <div class="buttons">
                                            <form action="<?php echo base_url('laporan/updatestatus'); ?>" method="POST">
                                                <input type="hidden" name="no_trf" value="<?php echo $status['no_trf']; ?>" />
                                                <input type="hidden" name="status_transaksi" value="5" />
                                                <button type="submit" id="submit">Step selanjutnya</button>
                                            </form>
                                        </div>
                                    <?php } else { ?>
                                        <div class="steps2">
                                            <span class="circle2" style="padding-left: 9px;" id="1">Baru</span>
                                            <span class="circle2" style="padding-left: 35px;" id="2">Dijahit</span>
                                            <span class="circle2" style="padding-left: 10px;" id="3">Selesai Dijahit</span>
                                            <span class="circle2" style="padding-right: 27px;" id="4">Dikirim</span>
                                            <span class="circle2" style="padding-right: 5px;" id="5">Selesai</span>
                                        </div>
                                        <div class="steps">
                                            <span class="circle active" id="1"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                            <span class="circle active" id="2"><i class="fa fa-scissors" aria-hidden="true"></i></span>
                                            <span class="circle active" id="3"><i class="fa fa-archive" aria-hidden="true"></i></span>
                                            <span class="circle active" id="4"><i class="fa fa-truck flip-horizontal" aria-hidden="true"></i></span>
                                            <span class="circle active" id="5"><i class="fa fa-check" aria-hidden="true"></i></span>
                                            <div class="progress-bar">
                                                <span class="indicator" style="width: 100%; "></span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                        <div>
                            <form role="form" class="form-horizontal" action="<?php echo base_url('laporan/edit'); ?>" method="POST">
                                <input type="hidden" name="no_trf" value="<?php echo $status['no_trf'] ?>">
                                <div style="margin: 0px 40px 40px 40px;">
                                    <label for="note" style="font-size: 25px; font-weight: normal;">Catatan
                                        Transaksi</label>
                                    <textarea name="note" placeholder="Catatan untuk transaksi" id="note" class="pa form-control kb-text" rows="10" style="resize:none; font-size: 20px;"><?php echo $status['catatan']; ?></textarea>
                                </div>
                                <div style="text-align: right; margin: 40px 20px 20px 0px;">
                                    <button type="submitt" name="submitt" class="btn btn-primary ">Simpan</button>
                                    <a href="<?php echo base_url() ?>laporan" class="btn btn-default ">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal -->
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->


<script type="text/javascript">
    // //DOM Elements
    // const circles = document.querySelectorAll(".circle"),
    //     progressBar = document.querySelector(".indicator"),
    //     buttons = document.querySelectorAll("button");

    // let currentStep = 1;

    // // function that updates the current step and updates the DOM
    // const updateSteps = (e) => {
    //     // update current step based on the button clicked
    //     currentStep = e.target.id === "submit" ? ++currentStep : --currentStep;

    //     // loop through all circles and add/remove "active" class based on their index and current step
    //     circles.forEach((circle, index) => {
    //         circle.classList[`${index < currentStep ? "add" : "remove"}`]("active");
    //     });

    //     // update progress bar width based on current step
    //     progressBar.style.width = `${((currentStep - 1) / (circles.length - 1)) * 100}%`;

    //     // check if current step is last step or first step and disable corresponding buttons
    //     if (currentStep === circles.length) {
    //         buttons[1].disabled = true;
    //     } else if (currentStep === 1) {
    //         buttons[0].disabled = true;
    //     } else {
    //         buttons.forEach((button) => (button.disabled = false));
    //     }
    // };

    // // add click event listeners to all buttons
    // buttons.forEach((button) => {
    //     button.addEventListener("click", updateSteps);
    // });
</script>