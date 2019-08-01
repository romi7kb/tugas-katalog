$(function(){

    $('.tombolTambah').on('click',function()
    {
        $('#judulModal').html('Tambah data');
        $('.modal-footer button[type=submit]').html('tambah');
        $('.modal-body form').attr('action','http://localhost/phpmvc/public/mahasiswa/tambah');
        $('#nama').val('');
           $('#alamat').val('');
           $('#id').val('');
    });

    $('.tombolUbah').on('click',function()
    {
        $('#judulModal').html('Ubah data');
        $('.modal-footer button[type=submit]').html('ubah');
        $('.modal-body form').attr('action','http://localhost/phpmvc/public/mahasiswa/ubah');

        const id =$(this).data('id');
        
        $.ajax({
        url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
        data: {id : id},
        method: 'post',
        dataType: 'json',
        success: function(data){
           $('#nama').val(data.nama);
           $('#alamat').val(data.alamat);
           $('#id').val(data.id);

        }
        });
    });
});