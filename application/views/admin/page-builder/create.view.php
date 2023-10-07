<style>
    .tombolKustom {
        box-shadow: 3px 4px 0px 0px #00bfff;
        background: linear-gradient(to bottom, #000000 5%, #0066ff 100%);
        background-color: #000000;
        border-radius: 19px;
        border: 1px solid #000000;
        display: inline-block;
        cursor: pointer;
        color: #ffffff;
        font-family: Verdana;
        font-size: 17px;
        font-weight: bold;
        padding: 13px 76px;
        text-decoration: none;
        text-shadow: 0px 1px 0px #000000;
    }

    .tombolKustom:hover {
        background: linear-gradient(to bottom, #0066ff 5%, #000000 100%);
        background-color: #0066ff;
    }

    .tombolKustom:active {
        position: relative;
        top: 1px;
    }
</style>
<form action="<?= URL_WEBSITE; ?>/admin/builder/store" enctype="multipart/form-data" method="post">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-between mb-3">
            <a href="<?= URL_WEBSITE; ?>/admin/builder/batal" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Batal</a>
            <div>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                <a href="<?= URL_WEBSITE; ?>/admin/builder/preview" class="btn btn-info"><i class="fa fa-eye"></i> Preview</a>
            </div>
            <a href="<?= URL_WEBSITE; ?>/admin/builder" class="btn btn-primary">Selesai <i class="fa fa-check"></i></a>
        </div>
        <?php if (!empty($_GET['error'])) : ?>
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <div class=""> <?= $_GET['error']; ?></div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="text_header" class="form-label">Text Header</label>
                <input type="text" name="text_header" class="form-control" id="text_header" placeholder="Text Header">
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Sumber Gambar Header</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sumber_gambar_header" id="sumber_upload_header" value="upload" checked>
                            <label class="form-check-label" for="sumber_upload_header">Upload</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sumber_gambar_header" id="sumber_url_header" value="url">
                            <label class="form-check-label" for="sumber_url_header">Url</label>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3 sumber_header_type_upload">
                            <label for="gambar_header_upload" class="form-label">Gambar Header Upload</label>
                            <input class="form-control" type="file" name="gambar_header_upload" id="gambar_header_upload">
                        </div>
                        <div class="mb-3 sumber_header_type_url">
                            <label for="gambar_header_url" class="form-label">Gambar Header Url</label>
                            <input type="text" name="gambar_header_url" class="form-control" id="gambar_header_url" placeholder="https://imgur.com/xxxxxxxx.jpg">
                        </div>
                    </div>
                </div>

            </div>
            <div class="mb-3">
                <label for="text_body" class="form-label">Text Body</label>
                <textarea name="text_body" class="richText" id="text_body"></textarea>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-3">
                        <label for="btn_name" class="form-label">Button Name</label>
                        <input type="text" name="btn_name" class="form-control" id="btn_name" placeholder="Button Name!">
                    </div>
                    <div class="col-md-3">
                        <label for="btn_class" class="form-label">Button Class</label>
                        <input type="text" name="btn_class" class="form-control" id="btn_class" placeholder="btn btn-primary">
                    </div>
                    <div class="col-md-6">
                        <label for="btn_type" class="form-label">Button Type</label>
                        <select name="btn_type" id="btn_type" class="form-control" required>
                            <option value="">PILIH TYPE</option>
                            <option value="a">&lt;a href="" &gt;&lt;/a&gt;</option>
                            <option value="btn">&lt;button type="" &gt;&lt;/button&gt;</option>
                        </select>
                    </div>
                    <div class="col-md-3 btn_type_selected">
                        <label for="btn_onclick" class="form-label">Button Onclick</label>
                        <input type="text" name="btn_onclick" class="form-control" id="btn_onclick" placeholder="Button Onclick" value="">
                    </div>
                    <div class="col-md-9 btn_type_selected">
                        <p class="pt-4"><small>isi jika pilih button type nya &lt;button type="" &gt;&lt;/button&gt;</small></p>
                    </div>
                    <div class="col-md-3 a_href_type_selected">
                        <label for="btn_target" class="form-label">Button Target </label>
                        <input type="text" name="btn_target" class="form-control" id="btn_target" placeholder="Button Target" value="_blank">
                    </div>
                    <div class="col-md-9 a_href_type_selected">
                        <label for="btn_link" class="form-label">Button Link</label>
                        <input type="text" name="btn_link" class="form-control" id="btn_link" placeholder="Button Link" value="">
                        <small>isi jika pilih button type nya &lt;a href="" &gt;&lt;/a&gt;</small>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Pilih Sumber Gambar Footer</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sumber_gambar_footer" id="sumber_upload_footer" value="upload">
                            <label class="form-check-label" for="sumber_upload_footer">Upload</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sumber_gambar_footer" id="sumber_url_footer" value="url" checked>
                            <label class="form-check-label" for="sumber_url_footer">Url</label>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3 sumber_footer_type_upload">
                            <label for="gambar_footer_upload" class="form-label">Gambar Footer</label>
                            <input class="form-control" type="file" name="gambar_footer_upload" id="gambar_footer_upload">
                        </div>
                        <div class="mb-3 sumber_footer_type_url">
                            <label for="gambar_footer_url" class="form-label">Gambar Url Footer</label>
                            <input type="text" name="gambar_footer_url" class="form-control" id="gambar_footer_url" placeholder="https://imgur.com/xxxxxxxx.jpg">
                        </div>
                    </div>
                </div>

            </div>
            <div class="mb-3">
                <label for="text_footer" class="form-label">Text Footer</label>
                <input type="text" name="text_footer" class="form-control" id="text_footer" placeholder="Copyright © 2023 | Footer.">
            </div>
            <div class="mb-3">
                <label for="custom_css" class="form-label">Kustom CSS</label> <button type="button" class="btn btn-sm btn-primary float-end" id="btn_hide_kustom_css" data-hide="false">Hide</button>
                <div id="hide_kustom_css">
                    <textarea name="custom_css" class="richText" id="custom_css"></textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="script_locker" class="form-label">Script Locker</label> <button type="button" class="btn btn-sm btn-primary float-end" id="btn_hide_script_locker" data-hide="false">Hide</button>
                <div id="hide_script_locker">
                    <textarea name="script_locker" class="richText" id="script_locker"></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>PREVIEW:</h2>
            <div class="row text-center">
                <div class="col-md-12">
                    <h4>Text Header</h4>
                    <img class="img-thumbnail" src="<?= BASE_PATH; ?>/public/img/contoh_300_x_250.jpg" alt="">
                </div>
                <div class="col-md-12 mb-2">
                    <p>Text Body</p>
                    <button type="button" onclick="alert('You Just Click This MF Button')" class="btn btn-primary">BUTTON NAME!</button><br>
                </div>
                <div class="col-md-12 mb-2">
                    <img class="img-fluid mt-1" src="<?= BASE_PATH; ?>/public/img/contoh_320x50.jpg" alt="">
                </div>
                <div class="col-md-12">
                    <div class="fotter__offer">Copyright © 2023 | Footer.</div>
                </div>
            </div>
            <!-- //render style Preview -->

            <!-- //render script Preview -->
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        var selected = $('#btn_type').val();
        select_selected(selected);

        if ($('#sumber_upload_header').prop('checked')) {
            checked_sumber('upload', $('.sumber_header_type_url'), $('.sumber_header_type_upload'));
        } else if ($('#sumber_url_header').prop('checked')) {
            checked_sumber('url', $('.sumber_header_type_url'), $('.sumber_header_type_upload'));
        }

        if ($('#sumber_upload_footer').prop('checked')) {
            checked_sumber('upload', $('.sumber_footer_type_url'), $('.sumber_footer_type_upload'));
        } else if ($('#sumber_url_footer').prop('checked')) {
            checked_sumber('url', $('.sumber_footer_type_url'), $('.sumber_footer_type_upload'));
        }


    })

    $('input[type=radio][name=sumber_gambar_header]').on('change', function() {
        checked_sumber($(this).val(), $('.sumber_header_type_url'), $('.sumber_header_type_upload'));
    });

    $('#btn_type').on('change', function(e) {
        var selected = $(this).val();
        select_selected(selected);
    })

    $('input[type=radio][name=sumber_gambar_footer]').on('change', function() {
        checked_sumber($(this).val(), $('.sumber_footer_type_url'), $('.sumber_footer_type_upload'));
    });

    $('#btn_hide_kustom_css').on('click', function(e) {
        texarea_hidden($(this), $('#hide_kustom_css'))
    })

    $('#btn_hide_script_locker').on('click', function(e) {
        texarea_hidden($(this), $('#hide_script_locker'))
    })

    function texarea_hidden(id_btn, id_texarea) {
        if (id_btn.data('hide')) {
            id_texarea.show(2000);
            id_btn.text('Hide');
            id_btn.data('hide', false);
        } else {
            id_texarea.hide(200);
            id_btn.text('Show');
            id_btn.data('hide', true);
        }
    }

    function checked_sumber(checked, id_div_url, id_div_upload) {
        switch (checked) {
            case 'upload':
                id_div_url.hide(2000);
                id_div_upload.show(2000);
                break;
            case 'url':
                id_div_url.show(2000);
                id_div_upload.hide(2000);
                break;
        }
    }

    function select_selected(selected) {
        if (selected != '') {
            if (selected == 'a') {
                $('.btn_type_selected').hide(2000);
                $('.a_href_type_selected').show(2000);
            } else if (selected == 'btn') {
                $('.btn_type_selected').show(2000);
                $('.a_href_type_selected').hide(2000);
            }
        } else {
            $('.btn_type_selected').hide(2000);
            $('.a_href_type_selected').hide(2000);
        }
    }

    $('#text_body').richText({
        fontList: ["Arial",
            "Arial Black",
            "Comic Sans MS",
            "Courier New",
            "Geneva",
            "Georgia",
            "Helvetica",
            "Impact",
            "Lucida Console",
            "Tahoma",
            "Times New Roman",
            "Verdana"
        ],

        imageUpload: false,
        fileUpload: false,

        table: false,
        videoEmbed: false,

        height: 120,
    });

    $('#custom_css').richText({
        // text formatting
        bold: false,
        italic: false,
        underline: false,

        // text alignment
        leftAlign: false,
        centerAlign: false,
        rightAlign: false,
        justify: false,

        // lists
        ol: false,
        ul: false,

        // title
        heading: false,

        // fonts
        fonts: false,
        fontColor: false,
        backgroundColor: false,
        fontSize: false,

        imageUpload: false,
        fileUpload: false,
        urls: false,
        removeStyles: false,

        table: false,
        videoEmbed: false,

        height: 320,
    });

    $('#script_locker').richText({
        // text formatting
        bold: false,
        italic: false,
        underline: false,

        // text alignment
        leftAlign: false,
        centerAlign: false,
        rightAlign: false,
        justify: false,

        // lists
        ol: false,
        ul: false,

        // title
        heading: false,

        // fonts
        fonts: false,
        fontColor: false,
        backgroundColor: false,
        fontSize: false,

        imageUpload: false,
        fileUpload: false,
        urls: false,
        removeStyles: false,

        table: false,
        videoEmbed: false,

        height: 320,
    });
</script>